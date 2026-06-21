<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{
    // 1. Lista los productos en la tienda
    public function index()
    {
        $products = Product::all();
        return view('store.index', compact('products'));
    }

    // 2. Muestra la vista del formulario de checkout
    public function checkout(Product $product)
    {
        return view('store.checkout', compact('product'));
    }

    // 3. Procesa el pago simulado en Stripe según el botón seleccionado
    public function processCheckout(Request $request, Product $product)
    {
        $request->validate([
            // Valida el nombre y el tipo de simulación que inyectamos
            'customer_name' => 'required|string|max:255',
            'simulation_type' => 'required|in:exito,error,3ds'
        ]);

        $stripeSecret = config('services.stripe.secret') ?? env('STRIPE_SECRET');

        if (empty($stripeSecret) || $stripeSecret === 'sk_test_tu_clave_secreta_aqui') {
            return back()->withErrors('Error de configuración: No se ha configurado la clave secreta de Stripe (STRIPE_SECRET) en el archivo .env.');
        }

        // Modificamos el payload según el botón seleccionado para forzar respuestas de la API de Stripe
        $paymentMethod = 'pm_card_visa'; // Éxito predeterminado (Equivale a usar tarjeta 4242)

        if ($request->simulation_type === 'error') {
            // El token ficticio 'pm_card_cvcFail' o 'pm_card_chargeDeclined' fuerza a Stripe a rechazar el cobro inmediatamente
            $paymentMethod = 'pm_card_chargeDeclined'; 
        } elseif ($request->simulation_type === '3ds') {
            // Fuerza a requerir autenticación de doble factor externa
            $paymentMethod = 'pm_card_authenticationRequired';
        }

        // Realizamos la llamada HTTP POST a Stripe mapeando el comportamiento elegido
        $response = Http::asForm()
            ->withToken($stripeSecret)
            ->post('https://api.stripe.com/v1/payment_intents', [
                'amount' => intval($product->price * 100), 
                'currency' => 'usd',
                'payment_method_types[]' => 'card',
                // Enviamos el método de pago específico interceptado para forzar la respuesta
                'payment_method' => $paymentMethod,
                'confirm' => 'true', // Confirmamos de inmediato para forzar que la API evalúe la tarjeta elegida
                'return_url' => route('store.index'), // URL requerida por Stripe al confirmar de forma síncrona
            ]);

        $stripeData = $response->json();

        // Evaluamos si el pago pasó con éxito en los servidores de Stripe
        if ($response->successful() && isset($stripeData['status']) && $stripeData['status'] === 'succeeded') {
            
            $order = Order::create([
                'product_id' => $product->id,
                'customer_name' => $request->customer_name,
                'total' => $product->price,
                'status' => 'paid',
                'stripe_payment_id' => $stripeData['id'] ?? 'simulated_id',
            ]);

            // Dispara el bot de Telegram
            $this->notifyTelegram($order, $product);

            return redirect()->route('store.index')->with('success', 'Pedido procesado correctamente y notificado por Telegram.');
        }

        // MANEJO DE ERRORES EXPLICITO: Si Stripe rebotó la tarjeta por error/3DS, caemos aquí
        if (isset($stripeData['error'])) {
            $errorMessage = "⚠️ Stripe API [" . strtoupper($request->simulation_type) . " TEST]: " . ($stripeData['error']['message'] ?? 'Tarjeta inválida o rechazada.');
        } else {
            $errorMessage = 'Error desconocido al intentar procesar la transacción remota con Stripe.';
        }

        return back()->withErrors($errorMessage)->withInput();
    }

    // 4. Renderiza la galería de Pokémon
    public function pokemon()
    {
        return view('pokemon.index');
    }

    // 5. Envía la notificación de compra a Telegram
    private function notifyTelegram(Order $order, Product $product)
    {
        $token = config('services.telegram.token') ?? env('TELEGRAM_BOT_TOKEN');
        $chatId = config('services.telegram.chat_id') ?? env('TELEGRAM_CHAT_ID');

        if (empty($token) || empty($chatId)) {
            return; 
        }

        $mensaje = "🛒 *Nuevo pedido*\n\n" .
                   "👤 *Cliente:* {$order->customer_name}\n" .
                   "📦 *Producto:* {$product->name}\n" .
                   "💰 *Total:* S/ {$order->total}\n" .
                   "✅ *Estado:* {$order->status}";

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $mensaje,
            'parse_mode' => 'Markdown'
        ]);
    }
}
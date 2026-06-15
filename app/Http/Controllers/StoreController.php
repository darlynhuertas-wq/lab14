<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{
    // Lista los productos en la tienda (Catálogo)
    public function index()
    {
        $products = Product::all();
        return view('store.index', compact('products'));
    }

    // Muestra la vista del formulario de checkout
    public function checkout(Product $product)
    {
        return view('store.checkout', compact('product'));
    }

    // Procesa el pago simulado en Stripe y envía notificación
    public function processCheckout(Request $request, Product $product)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255'
        ]);

        $stripeSecret = config('services.stripe.secret') ?? env('STRIPE_SECRET');

        if (empty($stripeSecret) || $stripeSecret === 'sk_test_tu_clave_secreta_aqui') {
            return back()->withErrors('Error de configuración: No se ha configurado la clave secreta de Stripe (STRIPE_SECRET) en el archivo .env.');
        }

        $response = Http::asForm()
            ->withToken($stripeSecret)
            ->post('[https://api.stripe.com/v1/payment_intents](https://api.stripe.com/v1/payment_intents)', [
                'amount' => intval($product->price * 100), 
                'currency' => 'usd',
                'payment_method_types[]' => 'card',
                'confirm' => 'false', 
            ]);

        $stripeData = $response->json();

        if ($response->successful()) {
            $order = Order::create([
                'product_id' => $product->id,
                'customer_name' => $request->customer_name,
                'total' => $product->price,
                'status' => 'paid',
                'stripe_payment_id' => $stripeData['id'] ?? 'simulated_id',
            ]);

            $this->notifyTelegram($order, $product);

            return redirect()->route('store.index')->with('success', 'Pedido procesado correctamente y notificado por Telegram.');
        }

        $errorMessage = $stripeData['error']['message'] ?? 'Error desconocido al procesar el pago con Stripe.';
        return back()->withErrors($errorMessage);
    }

    // Nueva función para renderizar la galería de Pokémon integrada
    public function pokemon()
    {
        return view('pokemon.index');
    }

    // Método para notificar a Telegram
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

        Http::post("[https://api.telegram.org/bot](https://api.telegram.org/bot){$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $mensaje,
            'parse_mode' => 'Markdown'
        ]);
    }
}
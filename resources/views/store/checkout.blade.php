<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasarela de Pago Seguro - Tecsup Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-xl w-full">
        <div class="flex flex-wrap gap-2 justify-center mb-6">
            <button type="button" onclick="seleccionarTarjeta('exito', '4242 •••• •••• 4242')" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-md transition-all duration-200 hover:-translate-y-0.5">
                🟢 Tarjeta Éxito (4242)
            </button>
            <button type="button" onclick="seleccionarTarjeta('error', '4000 •••• •••• 0002')" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-xl shadow-md transition-all duration-200 hover:-translate-y-0.5">
                🔴 Tarjeta Rechazo (Error)
            </button>
            <button type="button" onclick="seleccionarTarjeta('3ds', '4000 •••• •••• 3155')" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold rounded-xl shadow-md transition-all duration-200 hover:-translate-y-0.5">
                🟡 Tarjeta 3D Secure
            </button>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-indigo-100/50">
            
            <div class="bg-slate-900 px-8 py-8 text-white relative">
                <div class="absolute top-4 right-4 bg-emerald-500/10 border border-emerald-500/20 px-3 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase text-emerald-400 backdrop-blur-md">
                    Modo Test Activo
                </div>
                <p class="text-xs text-indigo-400 font-bold uppercase tracking-widest mb-1">Resumen de tu pedido</p>
                <h2 class="text-2xl font-extrabold tracking-tight">{{ $product->name }}</h2>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-xs text-slate-400 font-medium">Importe total:</span>
                    <span class="text-3xl font-black text-white">S/ {{ number_format($product->price, 2) }}</span>
                </div>
            </div>

            <div class="p-8">
                @if ($errors->any())
                    <div class="mb-6 rounded-2xl bg-rose-50 p-4 border border-rose-100 flex items-start space-x-3">
                        <div class="flex-shrink-0 text-rose-500 mt-0.5">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-rose-900">Resultado de la Validación</h3>
                            <ul class="text-xs text-rose-600 list-disc list-inside mt-1 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="relative w-full h-44 bg-gradient-to-br from-indigo-600 via-indigo-700 to-slate-900 rounded-2xl p-6 text-white shadow-lg shadow-indigo-950/30 mb-8 overflow-hidden transform transition-all hover:scale-[1.02] duration-300">
                    <div class="absolute -right-12 -bottom-12 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute -left-10 -top-10 w-32 h-32 bg-indigo-500/20 rounded-full blur-xl"></div>
                    
                    <div class="flex justify-between items-start relative z-10">
                        <div class="w-11 h-8 bg-gradient-to-br from-yellow-300 to-amber-500 rounded-md flex items-center justify-center shadow-inner">
                            <div class="grid grid-cols-3 gap-0.5 w-7 h-5 border border-amber-600/20 rounded">
                                <div></div><div></div><div></div><div></div><div></div><div></div>
                            </div>
                        </div>
                        <span class="text-md font-extrabold italic tracking-wider text-white/90">VISA</span>
                    </div>
                    
                    <div class="mt-8 relative z-10">
                        <p id="card-number-display" class="text-xl tracking-widest font-mono font-semibold text-slate-100 transition-all duration-150">4242 •••• •••• 4242</p>
                    </div>
                    
                    <div class="mt-4 flex justify-between items-end relative z-10">
                        <div class="max-w-[70%]">
                            <span class="text-[8px] uppercase tracking-widest text-indigo-200 block mb-0.5">Titular</span>
                            <span id="card-holder-display" class="text-sm font-bold tracking-wide uppercase truncate block">Cliente Tecsup</span>
                        </div>
                        <div class="text-right">
                            <span class="text-[8px] uppercase tracking-widest text-indigo-200 block mb-0.5">Expira</span>
                            <span class="text-sm font-mono font-bold text-slate-100">12/30</span>
                        </div>
                    </div>
                </div>

                <form action="{{ route('store.processCheckout', $product->id) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <input type="hidden" id="simulation_type" name="simulation_type" value="exito">

                    <div>
                        <label for="customer_name" class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Nombre completo del titular</label>
                        <div class="relative rounded-xl shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="customer_name" 
                                name="customer_name" 
                                required 
                                oninput="document.getElementById('card-holder-display').innerText = this.value || 'Cliente Tecsup'"
                                class="block w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm transition-all duration-200 placeholder-slate-400 bg-slate-50 hover:bg-white focus:bg-white" 
                                placeholder="Ej. Juan Pérez"
                            >
                        </div>
                    </div>

                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100/80">
                        <div class="flex items-center space-x-2 text-slate-700 font-bold text-xs uppercase tracking-wider mb-2">
                            <svg class="w-4.5 h-4.5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Modo de Prueba Seleccionado</span>
                        </div>
                        <p id="info-box-text" class="text-slate-500 text-xs leading-relaxed transition-all duration-150">
                            Estás simulando un <strong class="text-emerald-600">pago exitoso</strong>. Se enviará una orden de cargo limpia usando la tarjeta de prueba general y el bot de Telegram reportará el éxito.
                        </p>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                        <a href="{{ route('store.index') }}" class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-slate-900 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Regresar
                        </a>

                        <button id="submit-btn" type="submit" class="inline-flex items-center px-6 py-3.5 border border-transparent text-sm font-bold rounded-xl text-white bg-slate-900 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 shadow-md shadow-slate-950/10">
                            Confirmar Pago
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-6 flex justify-center items-center space-x-6 text-slate-400">
            <div class="flex items-center space-x-1">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span class="text-xs font-semibold">Conexión Segura SSL</span>
            </div>
            <span class="text-slate-300">•</span>
            <div class="flex items-center space-x-1">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-xs font-semibold">Stripe Verificado</span>
            </div>
        </div>
    </div>

    <script>
        function seleccionarTarjeta(tipo, mascaraNumero) {
            // Setea el valor en el input oculto que va al servidor
            document.getElementById('simulation_type').value = tipo;
            
            // Actualiza visualmente el diseño de la tarjeta azul
            document.getElementById('card-number-display').innerText = mascaraNumero;
            
            // Modifica los textos dinámicos informativos y los estilos del botón
            const infoText = document.getElementById('info-box-text');
            const submitBtn = document.getElementById('submit-btn');
            
            if (tipo === 'exito') {
                infoText.innerHTML = 'Estás simulando un <strong class="text-emerald-600">pago exitoso</strong>. Se enviará una orden de cargo limpia usando la tarjeta de prueba general y el bot de Telegram reportará el éxito.';
                submitBtn.className = "inline-flex items-center px-6 py-3.5 border border-transparent text-sm font-bold rounded-xl text-white bg-slate-900 hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 shadow-md shadow-slate-950/10";
            } else if (tipo === 'error') {
                infoText.innerHTML = 'Estás forzando una simulación de <strong class="text-rose-600">tarjeta declinada (Error)</strong>. Stripe responderá intencionalmente rechazando los fondos para probar la captura de excepciones.';
                submitBtn.className = "inline-flex items-center px-6 py-3.5 border border-transparent text-sm font-bold rounded-xl text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-all duration-200 shadow-md";
            } else if (tipo === '3ds') {
                infoText.innerHTML = 'Estás forzando una simulación que <strong class="text-amber-500">requiere autenticación 3D Secure</strong>. Stripe responderá informando que se necesita validación adicional.';
                submitBtn.className = "inline-flex items-center px-6 py-3.5 border border-transparent text-sm font-bold rounded-xl text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200 shadow-md";
            }
        }
    </script>
</body>
</html>
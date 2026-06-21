<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tecsup Store - Catálogo de Componentes</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center min-h-screen flex-col">

    <header class="w-full lg:max-w-5xl max-w-[335px] text-sm mb-10">
        <nav class="flex items-center justify-between border-b border-[#e3e3e0] pb-4">
            
            <div class="flex items-center space-x-2.5">
                <div class="p-2 bg-indigo-600 text-white rounded-xl shadow-md shadow-indigo-100 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <span class="text-lg font-bold tracking-tight text-[#1b1b18]">Tecsup<span class="text-indigo-600">Store</span></span>
            </div>

            <div class="flex items-center space-x-3">
                
                <a 
                    href="{{ route('store.pokemon') }}" 
                    class="inline-flex items-center justify-center px-4 py-1.5 text-xs font-semibold rounded-full text-slate-700 bg-slate-100 hover:bg-rose-50 hover:text-rose-600 border border-[#e3e3e0] hover:border-rose-200 transition-all duration-200 shadow-sm"
                >
                    <span class="w-1.5 h-1.5 mr-2 bg-rose-500 rounded-full animate-pulse"></span>
                    Galería Pokédex API
                </a>

                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                    <span class="w-1.5 h-1.5 mr-1.5 bg-emerald-500 rounded-full animate-ping"></span>
                    Pasarela Activa
                </span>
            </div>
        </nav>
    </header>

    <main class="w-full lg:max-w-5xl max-w-[335px] flex flex-col items-center">
        
        <div class="text-center max-w-2xl mb-12">
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#1b1b18] mb-4 leading-tight">
                Lleva tus proyectos de <span class="text-indigo-600">IoT y Electrónica</span> al siguiente nivel
            </h1>
            <p class="text-sm text-[#706f6c]">
                Selecciona un componente de nuestro inventario certified y realiza tu pago simulado de forma segura e inmediata.
            </p>
        </div>

        @if(session('success'))
            <div class="w-full max-w-md mb-8">
                <div class="rounded-2xl bg-emerald-50 p-4 border border-emerald-100 shadow-sm flex items-start space-x-3">
                    <div class="flex-shrink-0 text-emerald-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-emerald-900">¡Pedido Exitoso!</h3>
                        <p class="text-[11px] text-emerald-600 mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl justify-center">
            @foreach($products as $product)
                <div class="group bg-white rounded-3xl border border-[#e3e3e0] p-6 shadow-sm hover:shadow-xl hover:border-indigo-200 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    
                    <div class="p-8 bg-slate-50/50 rounded-2xl flex items-center justify-center border border-[#e3e3e0]/50 group-hover:bg-indigo-50/20 transition-colors duration-300 mb-5">
                        @if(str_contains(strtolower($product->name), 'esp32'))
                            <svg class="w-16 h-16 text-indigo-500 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                        @else
                            <svg class="w-16 h-16 text-indigo-500 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        @endif
                    </div>

                    <div class="flex-grow flex flex-col justify-between">
                        <div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-600 mb-3">
                                Hardware OEM
                            </span>
                            <h3 class="text-xl font-bold text-[#1b1b18] group-hover:text-indigo-600 transition-colors duration-200">
                                {{ $product->name }}
                            </h3>
                            <p class="text-[#706f6c] text-xs mt-2 leading-relaxed">
                                Componente de alta precisión ideal para laboratorios de telemática y desarrollo inteligente en IoT.
                            </p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-[#e3e3e0]/50 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-[#706f6c] block font-medium uppercase tracking-wider">Precio Unitario</span>
                                <span class="text-xl font-black text-[#1b1b18]">S/ {{ number_format($product->price, 2) }}</span>
                            </div>
                            
                            <a 
                                href="{{ route('store.checkout', $product->id) }}" 
                                class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-bold rounded-xl text-white bg-[#1b1b18] hover:bg-indigo-600 transition-all duration-200 shadow-sm"
                            >
                                Comprar
                                <svg class="ml-1.5 w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <footer class="w-full lg:max-w-5xl max-w-[335px] border-t border-[#e3e3e0] py-6 text-center text-xs text-[#706f6c] mt-12">
        <p>&copy; {{ date('Y') }} Tecsup Store. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
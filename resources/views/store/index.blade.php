<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecsup Store - Catálogo de Componentes</title>
    <!-- Tailwind CSS CDN para diseño moderno -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-slate-50 text-slate-800 antialiased">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-3">
                    <!-- Icono SVG de Tienda de Tecnología -->
                    <div class="p-2 bg-indigo-600 text-white rounded-xl shadow-md shadow-indigo-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-900">Tecsup<span class="text-indigo-600">Store</span></span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                        <span class="w-1.5 h-1.5 mr-1.5 bg-emerald-500 rounded-full animate-ping"></span>
                        Pasarela Activa
                    </span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Hero Section Simplificado -->
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight sm:text-5xl mb-4">
                Lleva tus proyectos de <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">IoT y Electrónica</span> al siguiente nivel
            </h1>
            <p class="text-lg text-slate-500">
                Selecciona un componente de nuestro inventario certificado y realiza tu pago simulado de forma segura e inmediata.
            </p>
        </div>

        <!-- Alertas de Éxito Modernas -->
        @if(session('success'))
            <div class="max-w-md mx-auto mb-10 transform translate-y-0 transition-all duration-500">
                <div class="rounded-2xl bg-emerald-50 p-4 border border-emerald-100 shadow-sm flex items-start space-x-3">
                    <div class="flex-shrink-0 text-emerald-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-emerald-900">¡Pedido Exitoso!</h3>
                        <p class="text-xs text-emerald-600 mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Grid de Productos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center max-w-5xl mx-auto">
            @foreach($products as $product)
                <div class="group bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-slate-200 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                    
                    <!-- Imagen de marcador / Icono Tech -->
                    <div class="p-8 bg-slate-50/50 flex items-center justify-center border-b border-slate-50 group-hover:bg-indigo-50/30 transition-colors duration-300">
                        @if(str_contains(strtolower($product->name), 'esp32'))
                            <!-- Icono Microcontrolador -->
                            <svg class="w-20 h-20 text-indigo-500 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                        @else
                            <!-- Icono Sensor / Chip -->
                            <svg class="w-20 h-20 text-indigo-500 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        @endif
                    </div>

                    <!-- Datos del Producto -->
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 mb-3">
                                Hardware OEM
                            </span>
                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors duration-200">
                                {{ $product->name }}
                            </h3>
                            <p class="text-slate-500 text-sm mt-2 line-clamp-2">
                                Componente de alta precisión ideal para laboratorios de telemática y desarrollos inteligentes.
                            </p>
                        </div>

                        <!-- Precio y Botón de Acción -->
                        <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-slate-400 block font-medium uppercase tracking-wider">Precio Unitario</span>
                                <span class="text-2xl font-black text-slate-900">S/ {{ number_format($product->price, 2) }}</span>
                            </div>
                            
                            <a href="{{ route('store.checkout', $product->id) }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-bold rounded-xl text-white bg-slate-900 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 shadow-md">
                                Comprar
                                <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm text-slate-400">&copy; {{ date('Y') }} Tecsup Store. Proyecto de Laboratorio Integrado.</p>
        </div>
    </footer>
</body>
</html>
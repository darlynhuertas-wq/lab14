<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex Ultra - Galería Gótica Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #090d16; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 9999px; }
        .glass-panel { background: rgba(15, 23, 42, 0.45); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 antialiased min-h-screen flex flex-col justify-between">

    <header class="sticky top-0 z-40 bg-slate-900/60 backdrop-blur-md border-b border-slate-800/50 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center space-x-3.5 group">
                    <div class="p-2.5 bg-gradient-to-br from-rose-600 to-red-700 text-white rounded-2xl shadow-lg shadow-rose-900/40 transform group-hover:rotate-12 transition-all duration-300">
                        <svg class="w-6 h-6 animate-pulse" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="3" fill="currentColor"></circle>
                            <path d="M2 12h20"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-black tracking-wider uppercase bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent">Poke<span class="text-rose-500 font-black">Gallery</span></span>
                </div>
                
                <div>
                    <a href="{{ route('store.index') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-xl text-slate-300 bg-slate-900/90 hover:bg-slate-800 border border-slate-800/80 hover:border-slate-700 transition-all duration-200 shadow-lg">
                        <svg class="w-3.5 h-3.5 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Regresar a la Tienda
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase bg-rose-500/10 text-rose-400 border border-rose-500/20 mb-4 tracking-widest">
                Módulo Core API REST Conectado
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight text-white mb-4">
                Explora el Universo <span class="text-transparent bg-clip-text bg-gradient-to-r from-rose-500 via-purple-500 to-indigo-500 animate-gradient">Pokémon</span>
            </h1>
            <p class="text-slate-400 text-sm sm:text-base max-w-xl mx-auto leading-relaxed">
                Pasarela asíncrona optimizada sobre PokéAPI v2. Filtrado estructural de elementos naturales en tiempo real.
            </p>
        </div>

        <div class="glass-panel border border-slate-800/80 p-5 rounded-3xl shadow-2xl max-w-4xl mx-auto mb-14">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <div class="md:col-span-2 relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input 
                        type="text" 
                        id="search-input"
                        class="block w-full pl-11 pr-4 py-3.5 bg-slate-950/80 border border-slate-800 rounded-2xl focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 text-sm text-slate-100 placeholder-slate-500 transition-all duration-300"
                        placeholder="Buscar por nombre o número (Ej: Pikachu, 25)..."
                    >
                </div>

                <div>
                    <select 
                        id="type-filter"
                        class="block w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 rounded-2xl focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-500 text-sm text-slate-300 transition-all duration-300"
                    >
                        <option value="all">⚡ Todos los tipos</option>
                        <option value="fire">🔥 Fuego</option>
                        <option value="water">💧 Agua</option>
                        <option value="grass">🍃 Planta</option>
                        <option value="electric">⚡ Eléctrico</option>
                        <option value="poison">☠️ Veneno</option>
                        <option value="flying">💨 Volador</option>
                        <option value="bug">🐛 Bicho</option>
                        <option value="normal">🔘 Normal</option>
                        <option value="ground">🏜️ Tierra</option>
                        <option value="fairy">✨ Hada</option>
                        <option value="fighting">🥊 Lucha</option>
                        <option value="psychic">🔮 Psíquico</option>
                        <option value="rock">🪨 Roca</option>
                        <option value="ghost">👻 Fantasma</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="loader" class="flex flex-col items-center justify-center py-24">
            <div class="relative w-16 h-16 border-4 border-slate-800 border-t-rose-500 rounded-full animate-spin"></div>
            <p class="text-slate-400 text-xs mt-5 font-bold uppercase tracking-widest animate-pulse">Cargando base de datos indexada...</p>
        </div>

        <div id="pokemon-grid" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl mx-auto hidden"></div>

        <div id="no-results" class="text-center py-20 hidden">
            <div class="inline-flex p-4 bg-slate-900 rounded-full border border-slate-800 text-slate-600 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-sm font-bold tracking-wider uppercase text-slate-400">Sin coincidencias en el registro</h3>
        </div>

    </main>

    <div id="pokemon-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-slate-950/85 backdrop-blur-md transition-opacity" onclick="closeModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div id="modal-card" class="inline-block align-bottom bg-slate-900/95 rounded-[32px] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-800/80 backdrop-blur-xl"></div>
        </div>
    </div>

    <footer class="bg-slate-950 border-t border-slate-900/50 py-8 text-center text-slate-600 text-xs tracking-wider uppercase font-medium">
        <p>&copy; {{ date('Y') }} PokeGallery Lab. Terminal de Datos Protegido.</p>
    </footer>

    <script>
        const typeColors = {
            fire: 'from-orange-600/15 via-slate-900/40 to-slate-950 border-orange-500/20 text-orange-400 hover:border-orange-500/40 shadow-orange-950/20',
            water: 'from-blue-600/15 via-slate-900/40 to-slate-950 border-blue-500/20 text-blue-400 hover:border-blue-500/40 shadow-blue-950/20',
            grass: 'from-emerald-600/15 via-slate-900/40 to-slate-950 border-emerald-500/20 text-emerald-400 hover:border-emerald-500/40 shadow-emerald-950/20',
            electric: 'from-yellow-500/10 via-slate-900/40 to-slate-950 border-yellow-500/20 text-yellow-400 hover:border-yellow-500/40 shadow-yellow-950/25',
            poison: 'from-purple-600/15 via-slate-900/40 to-slate-950 border-purple-500/20 text-purple-400 hover:border-purple-500/40 shadow-purple-950/20',
            bug: 'from-lime-600/15 via-slate-900/40 to-slate-950 border-lime-500/20 text-lime-400 hover:border-lime-500/40 shadow-lime-950/20',
            normal: 'from-slate-600/15 via-slate-900/40 to-slate-950 border-slate-500/20 text-slate-400 hover:border-slate-500/40 shadow-slate-950/20',
            ground: 'from-amber-800/15 via-slate-900/40 to-slate-950 border-amber-700/20 text-amber-500 hover:border-amber-700/40 shadow-amber-950/20',
            fairy: 'from-pink-500/15 via-slate-900/40 to-slate-950 border-pink-400/20 text-pink-400 hover:border-pink-400/40 shadow-pink-950/20',
            fighting: 'from-red-600/15 via-slate-900/40 to-slate-950 border-red-600/20 text-red-400 hover:border-red-600/40 shadow-red-950/20',
            psychic: 'from-fuchsia-600/15 via-slate-900/40 to-slate-950 border-fuchsia-500/20 text-fuchsia-400 hover:border-fuchsia-500/40 shadow-fuchsia-950/20',
            rock: 'from-stone-600/15 via-slate-900/40 to-slate-950 border-stone-600/20 text-stone-400 hover:border-stone-600/40 shadow-stone-950/20',
            flying: 'from-cyan-600/15 via-slate-900/40 to-slate-950 border-cyan-500/20 text-cyan-400 hover:border-cyan-500/40 shadow-cyan-950/20',
            ghost: 'from-indigo-600/15 via-slate-900/40 to-slate-950 border-indigo-500/20 text-indigo-400 hover:border-indigo-500/40 shadow-indigo-950/20'
        };

        const typeBadges = {
            fire: 'bg-orange-500/10 text-orange-400 border border-orange-500/30',
            water: 'bg-blue-500/10 text-blue-400 border border-blue-500/30',
            grass: 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30',
            electric: 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20',
            poison: 'bg-purple-500/10 text-purple-400 border border-purple-500/30',
            bug: 'bg-lime-500/10 text-lime-400 border border-lime-500/30',
            normal: 'bg-slate-500/10 text-slate-400 border border-slate-500/30',
            ground: 'bg-amber-700/10 text-amber-400 border border-amber-700/30',
            fairy: 'bg-pink-400/10 text-pink-400 border border-pink-400/30',
            fighting: 'bg-red-600/10 text-red-400 border border-red-600/30',
            psychic: 'bg-fuchsia-500/10 text-fuchsia-400 border border-fuchsia-500/30',
            rock: 'bg-stone-600/10 text-stone-400 border border-stone-600/30',
            flying: 'bg-cyan-400/10 text-cyan-400 border border-cyan-400/30',
            ghost: 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/30'
        };

        let pokemonList = [];

        async function fetchPokemons() {
            try {
                const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=151');
                const data = await response.json();
                
                const detailPromises = data.results.map(async (pokemon) => {
                    const res = await fetch(pokemon.url);
                    return res.json();
                });

                pokemonList = await Promise.all(detailPromises);
                
                document.getElementById('loader').classList.add('hidden');
                document.getElementById('pokemon-grid').classList.remove('hidden');

                renderPokemons(pokemonList);
            } catch (error) {
                console.error(error);
                document.getElementById('loader').innerHTML = `<p class="text-rose-500 text-sm font-bold uppercase tracking-wider">Error de conexión con la infraestructura remota.</p>`;
            }
        }

        function renderPokemons(list) {
            const grid = document.getElementById('pokemon-grid');
            const noResults = document.getElementById('no-results');
            grid.innerHTML = '';

            if (list.length === 0) {
                grid.classList.add('hidden');
                noResults.classList.remove('hidden');
                return;
            }

            grid.classList.remove('hidden');
            noResults.classList.add('hidden');

            list.forEach(pokemon => {
                const primaryType = pokemon.types[0].type.name;
                const styleClass = typeColors[primaryType] || typeColors.normal;
                const artworkUrl = pokemon.sprites.other['official-artwork'].front_default || pokemon.sprites.front_default;

                const cardHtml = `
                    <div onclick="showDetails(${pokemon.id})" class="group relative bg-gradient-to-b ${styleClass} border rounded-[28px] p-5 hover:scale-[1.02] hover:shadow-2xl transition-all duration-300 cursor-pointer flex flex-col justify-between overflow-hidden">
                        
                        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-current opacity-[0.02] rounded-full blur-xl group-hover:opacity-[0.07] transition-opacity duration-300"></div>

                        <div class="flex justify-between items-center z-10">
                            <span class="text-[10px] font-mono font-bold text-slate-500 bg-slate-950/40 px-2 py-0.5 rounded-md border border-slate-800/40">#${String(pokemon.id).padStart(3, '0')}</span>
                            <div class="flex space-x-1">
                                ${pokemon.types.map(t => `<span class="text-[8px] font-black uppercase tracking-wider px-2 py-0.5 rounded-md ${typeBadges[t.type.name] || 'bg-slate-800 text-slate-300'}">${t.type.name}</span>`).join('')}
                            </div>
                        </div>
                        <div class="my-6 flex justify-center h-28 items-center z-10">
                            <img src="${artworkUrl}" alt="${pokemon.name}" class="max-w-[105px] max-h-[105px] w-24 h-24 object-contain filter drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] group-hover:scale-110 group-hover:rotate-2 transition-all duration-300">
                        </div>
                        <h3 class="text-sm font-extrabold uppercase tracking-wide text-slate-200 text-center group-hover:text-white transition-colors duration-200">${pokemon.name}</h3>
                    </div>
                `;
                grid.insertAdjacentHTML('beforeend', cardHtml);
            });
        }

        const searchInput = document.getElementById('search-input');
        const typeFilter = document.getElementById('type-filter');

        function filterPokemon() {
            const query = searchInput.value.toLowerCase().trim();
            const selectedType = typeFilter.value;

            const filtered = pokemonList.filter(pokemon => {
                const matchesSearch = pokemon.name.includes(query) || String(pokemon.id) === query;
                const matchesType = selectedType === 'all' || pokemon.types.some(t => t.type.name === selectedType);
                return matchesSearch && matchesType;
            });

            renderPokemons(filtered);
        }

        searchInput.addEventListener('input', filterPokemon);
        typeFilter.addEventListener('change', filterPokemon);

        function showDetails(id) {
            const pokemon = pokemonList.find(p => p.id === id);
            if (!pokemon) return;

            const primaryType = pokemon.types[0].type.name;
            const styleClass = typeColors[primaryType] || typeColors.normal;
            const artworkUrl = pokemon.sprites.other['official-artwork'].front_default || pokemon.sprites.front_default;

            const stats = {};
            pokemon.stats.forEach(s => { stats[s.stat.name] = s.base_stat; });

            const modalContent = `
                <div class="bg-gradient-to-b ${styleClass} p-8 text-center relative border-b border-slate-800/60">
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-slate-500 hover:text-white bg-slate-950/60 p-2 rounded-full border border-slate-800/60 focus:outline-none transition-colors">✕</button>
                    <span class="text-xs font-mono font-bold text-slate-500 bg-slate-950/50 px-2.5 py-0.5 rounded-md border border-slate-800/40">N.° ${String(pokemon.id).padStart(3, '0')}</span>
                    <h2 class="text-3xl font-black uppercase tracking-wide text-white mt-2">${pokemon.name}</h2>
                    <div class="flex justify-center space-x-1.5 mt-3">
                        ${pokemon.types.map(t => `<span class="text-[9px] font-black uppercase tracking-wider px-2.5 py-1 rounded-md ${typeBadges[t.type.name]}">${t.type.name}</span>`).join('')}
                    </div>
                    <div class="mt-6 flex justify-center h-40 items-center">
                        <img src="${artworkUrl}" alt="${pokemon.name}" class="max-w-[150px] max-h-[150px] w-36 h-36 object-contain filter drop-shadow-[0_8px_16px_rgba(0,0,0,0.6)]">
                    </div>
                </div>
                <div class="p-6 space-y-6 bg-slate-950/40">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="bg-slate-900/80 border border-slate-800/80 p-3.5 rounded-2xl">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-0.5">Masa</span>
                            <span class="text-base font-black text-slate-200">${pokemon.weight / 10} kg</span>
                        </div>
                        <div class="bg-slate-900/80 border border-slate-800/80 p-3.5 rounded-2xl">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-0.5">Envergadura</span>
                            <span class="text-base font-black text-slate-200">${pokemon.height / 10} m</span>
                        </div>
                    </div>
                    <div class="space-y-3.5">
                        ${renderStatBar('Puntos de Vida (HP)', stats.hp || 50, 'bg-emerald-500 shadow-emerald-500/20')}
                        ${renderStatBar('Poder de Ataque', stats.attack || 50, 'bg-rose-500 shadow-rose-500/20')}
                        ${renderStatBar('Eficacia de Defensa', stats.defense || 50, 'bg-blue-500 shadow-blue-500/20')}
                        ${renderStatBar('Velocidad Dinámica', stats.speed || 50, 'bg-amber-500 shadow-amber-500/20')}
                    </div>
                </div>
            `;
            document.getElementById('modal-card').innerHTML = modalContent;
            document.getElementById('pokemon-modal').classList.remove('hidden');
        }

        function renderStatBar(name, value, colorClass) {
            const percentage = Math.min((value / 150) * 100, 100);
            return `
                <div>
                    <div class="flex justify-between text-[11px] font-bold uppercase tracking-wide mb-1">
                        <span class="text-slate-500">${name}</span>
                        <span class="text-slate-300">${value} <span class="text-slate-600 text-[9px]">/ 150</span></span>
                    </div>
                    <div class="w-full bg-slate-900 border border-slate-800 rounded-lg h-2 overflow-hidden p-[1px]">
                        <div class="${colorClass} h-full rounded-md shadow-sm transition-all duration-500" style="width: ${percentage}%"></div>
                    </div>
                </div>
            `;
        }

        function closeModal() { document.getElementById('pokemon-modal').classList.add('hidden'); }
        window.onload = fetchPokemons;
    </script>
</body>
</html>
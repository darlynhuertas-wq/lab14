<!DOCTYPE html>
<html lang="es" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex Ultra - Galería Integrada</title>
    <script src="[https://cdn.tailwindcss.com](https://cdn.tailwindcss.com)"></script>
    <link rel="preconnect" href="[https://fonts.googleapis.com](https://fonts.googleapis.com)">
    <link rel="preconnect" href="[https://fonts.gstatic.com](https://fonts.gstatic.com)" crossorigin>
    <link href="[https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap](https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap)" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #090d16; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 9999px; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 antialiased min-h-screen flex flex-col justify-between">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-40 bg-slate-900/80 backdrop-blur-md border-b border-slate-800/60 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center space-x-3">
                    <div class="p-2.5 bg-rose-600 text-white rounded-2xl shadow-lg shadow-rose-900/30">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="3" fill="currentColor"></circle>
                            <path d="M2 12h20"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-black tracking-tight">Poke<span class="text-rose-500">Gallery</span></span>
                </div>
                
                <div>
                    <a href="{{ route('store.index') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold rounded-xl text-slate-300 bg-slate-900 hover:bg-slate-800 hover:text-white border border-slate-800 transition-all duration-200">
                        Regresar a la Tienda
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
                Explora el Universo <span class="text-transparent bg-clip-text bg-gradient-to-r from-rose-500 to-amber-500">Pokémon</span>
            </h1>
            <p class="text-slate-400 text-base sm:text-lg">
                Consumiendo la API oficial de PokéAPI v2. Filtra tus Pokémon por nombre o por tipo de elemento natural en tiempo real.
            </p>
        </div>

        <!-- Buscador y Filtros -->
        <div class="bg-slate-900/50 border border-slate-800 p-6 rounded-3xl shadow-2xl max-w-4xl mx-auto mb-12 backdrop-blur-sm">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <div class="md:col-span-2 relative">
                    <input 
                        type="text" 
                        id="search-input"
                        class="block w-full pl-6 pr-4 py-3.5 bg-slate-950 border border-slate-800 rounded-2xl focus:ring-2 focus:ring-rose-500 focus:border-rose-500 text-sm text-slate-100 placeholder-slate-500"
                        placeholder="Buscar por nombre o número (Ej: Pikachu, 25)..."
                    >
                </div>

                <div>
                    <select 
                        id="type-filter"
                        class="block w-full px-4 py-3.5 bg-slate-950 border border-slate-800 rounded-2xl focus:ring-2 focus:ring-rose-500 focus:border-rose-500 text-sm text-slate-300"
                    >
                        <option value="all">Todos los tipos</option>
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

        <!-- Cargador -->
        <div id="loader" class="flex flex-col items-center justify-center py-20">
            <div class="w-16 h-16 border-4 border-slate-800 border-t-rose-500 rounded-full animate-spin"></div>
            <p class="text-slate-400 text-sm mt-4 font-semibold">Cargando la Pokédex desde PokeAPI...</p>
        </div>

        <!-- Grid de Pokémon -->
        <div id="pokemon-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl mx-auto hidden"></div>

        <!-- Sin resultados -->
        <div id="no-results" class="text-center py-20 hidden">
            <h3 class="text-lg font-bold text-slate-300">No encontramos ningún Pokémon</h3>
        </div>

    </main>

    <!-- Modal de Detalles -->
    <div id="pokemon-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm" onclick="closeModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div id="modal-card" class="inline-block align-bottom bg-slate-900 rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-800"></div>
        </div>
    </div>

    <footer class="bg-slate-950 border-t border-slate-900 py-8 text-center text-slate-500 text-sm">
        <p>&copy; {{ date('Y') }} PokeGallery. Conectado a PokeAPI.</p>
    </footer>

    <script>
        const typeColors = {
            fire: 'from-orange-500/20 to-rose-600/10 border-orange-500/30 text-orange-400',
            water: 'from-blue-500/20 to-indigo-600/10 border-blue-500/30 text-blue-400',
            grass: 'from-emerald-500/20 to-teal-600/10 border-emerald-500/30 text-emerald-400',
            electric: 'from-yellow-500/20 to-amber-600/10 border-yellow-500/30 text-yellow-400',
            poison: 'from-purple-500/20 to-pink-600/10 border-purple-500/30 text-purple-400',
            bug: 'from-lime-500/20 to-emerald-600/10 border-lime-500/30 text-lime-400',
            normal: 'from-slate-500/20 to-zinc-600/10 border-slate-500/30 text-slate-400',
            ground: 'from-amber-700/20 to-yellow-800/10 border-amber-700/30 text-amber-600',
            fairy: 'from-pink-400/20 to-rose-500/10 border-pink-400/30 text-pink-400',
            fighting: 'from-red-600/20 to-orange-700/10 border-red-600/30 text-red-400',
            psychic: 'from-fuchsia-500/20 to-purple-600/10 border-fuchsia-500/30 text-fuchsia-400',
            rock: 'from-stone-600/20 to-neutral-700/10 border-stone-600/30 text-stone-400',
            flying: 'from-cyan-400/20 to-blue-500/10 border-cyan-400/30 text-cyan-400',
            ghost: 'from-indigo-850/20 to-purple-950/10 border-indigo-750/30 text-indigo-400'
        };

        const typeBadges = {
            fire: 'bg-orange-500/20 text-orange-400 border border-orange-500/30',
            water: 'bg-blue-500/20 text-blue-400 border border-blue-500/30',
            grass: 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30',
            electric: 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30',
            poison: 'bg-purple-500/20 text-purple-400 border border-purple-500/30',
            bug: 'bg-lime-500/20 text-lime-400 border border-lime-500/30',
            normal: 'bg-slate-500/20 text-slate-400 border border-slate-500/30',
            ground: 'bg-amber-700/20 text-amber-500 border border-amber-700/30',
            fairy: 'bg-pink-400/20 text-pink-400 border border-pink-400/30',
            fighting: 'bg-red-600/20 text-red-400 border border-red-600/30',
            psychic: 'bg-fuchsia-500/20 text-fuchsia-400 border border-fuchsia-500/30',
            rock: 'bg-stone-600/20 text-stone-400 border border-stone-600/30',
            flying: 'bg-cyan-400/20 text-cyan-400 border border-cyan-400/30',
            ghost: 'bg-indigo-900/30 text-indigo-300 border border-indigo-800/30'
        };

        let pokemonList = [];

        async function fetchPokemons() {
            try {
                const response = await fetch('[https://pokeapi.co/api/v2/pokemon?limit=151](https://pokeapi.co/api/v2/pokemon?limit=151)');
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
                document.getElementById('loader').innerHTML = `<p class="text-rose-500">Error cargando datos.</p>`;
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
                    <div onclick="showDetails(${pokemon.id})" class="group relative bg-gradient-to-br ${styleClass} border rounded-3xl p-5 hover:scale-[1.03] transition-all duration-300 cursor-pointer flex flex-col justify-between overflow-hidden">
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-mono font-bold text-slate-400">#${String(pokemon.id).padStart(3, '0')}</span>
                            <div class="flex space-x-1">
                                ${pokemon.types.map(t => `<span class="text-[9px] font-extrabold px-2 py-0.5 rounded-full capitalize ${typeBadges[t.type.name]}">${t.type.name}</span>`).join('')}
                            </div>
                        </div>
                        <div class="my-6 flex justify-center">
                            <img src="${artworkUrl}" alt="${pokemon.name}" class="w-28 h-28 object-contain filter drop-shadow-md group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-lg font-black capitalize text-white text-center">${pokemon.name}</h3>
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
                <div class="bg-gradient-to-br ${styleClass} p-8 text-center relative">
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-slate-400 hover:text-white bg-slate-950/50 p-2 rounded-full">✕</button>
                    <span class="text-sm font-mono text-slate-400">N.° ${String(pokemon.id).padStart(3, '0')}</span>
                    <h2 class="text-3xl font-extrabold capitalize text-white mt-1">${pokemon.name}</h2>
                    <div class="flex justify-center space-x-2 mt-3">
                        ${pokemon.types.map(t => `<span class="text-xs font-extrabold px-3 py-1 rounded-full capitalize ${typeBadges[t.type.name]}">${t.type.name}</span>`).join('')}
                    </div>
                    <div class="mt-6 flex justify-center">
                        <img src="${artworkUrl}" alt="${pokemon.name}" class="w-40 h-40 object-contain">
                    </div>
                </div>
                <div class="p-6 space-y-6 bg-slate-950">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl">
                            <span class="text-xs text-slate-500 block">Peso</span>
                            <span class="text-lg font-black">${pokemon.weight / 10} kg</span>
                        </div>
                        <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl">
                            <span class="text-xs text-slate-500 block">Altura</span>
                            <span class="text-lg font-black">${pokemon.height / 10} m</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        ${renderStatBar('HP', stats.hp || 50, 'bg-emerald-500')}
                        ${renderStatBar('Ataque', stats.attack || 50, 'bg-rose-500')}
                        ${renderStatBar('Defensa', stats.defense || 50, 'bg-blue-500')}
                        ${renderStatBar('Velocidad', stats.speed || 50, 'bg-amber-500')}
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
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-slate-400">${name}</span>
                        <span class="text-slate-200 font-bold">${value}</span>
                    </div>
                    <div class="w-full bg-slate-900 rounded-full h-2 overflow-hidden border border-slate-800/60">
                        <div class="${colorClass} h-full" style="width: ${percentage}%"></div>
                    </div>
                </div>
            `;
        }

        function closeModal() { document.getElementById('pokemon-modal').classList.add('hidden'); }
        window.onload = fetchPokemons;
    </script>
</body>
</html>
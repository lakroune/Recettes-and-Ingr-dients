<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodieShare | Minimal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }

        .recipe-card {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .recipe-card:hover {
            transform: translateY(-8px);
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }

        .btn-animate {
            transition: all 0.2s;
        }

        .btn-animate:active {
            scale: 0.95;
        }

        /* Custom Select Style */
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 1em;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeIn 0.6s ease forwards;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-[#fafafa] text-[#1a1a1a]">

    <x-header />
    <main class="max-w-6xl mx-auto px-6">

        <section class="py-12 animate-in">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <div class="md:col-span-5 space-y-4">
                    <span
                        class="text-[10px] font-bold tracking-[0.2em] text-orange-600 uppercase italic underline decoration-2 underline-offset-4">L'Incontournable</span>
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter leading-none">Pasta Al
                        Limone<br>Premium Edition.</h1>
                    <p class="text-gray-500 text-xs leading-relaxed max-w-xs">Une simplicité audacieuse. Citrons de
                        Sicile, beurre frais et parmesan affiné.</p>
                    <div class="flex gap-4 pt-2">


                        <button onclick="window.location.href='/recette'"
                            class="bg-black text-white text-[10px] font-bold uppercase tracking-wider px-6 py-3  btn-animate hover:bg-orange-600 ">Découvrir</button>
                    </div>
                </div>
                <div class="md:col-span-7">
                    <div class="relative group">
                        <div
                            class="absolute -inset-2 bg-orange-100 rounded-[2rem] -z-10 group-hover:bg-orange-200 transition duration-500">
                        </div>
                        <img src="https://images.unsplash.com/photo-1473093226795-af9932fe5856?auto=format&fit=crop&q=80&w=1200"
                            class="w-full h-[450px] object-cover rounded-[1.5rem] shadow-2xl transition duration-500 group-hover:scale-[1.01]"
                            alt="Hero">
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-16 animate-in" style="animation-delay: 0.2s;">
            <div class="flex flex-col md:flex-row items-end justify-between gap-8 border-b border-gray-200 pb-4">
                <div class="w-full md:w-1/2">
                    <label class="text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400 block mb-2">Rechercher
                        une saveur</label>
                    <input type="text" placeholder="EX: RISOTTO AUX TRUFFES..."
                        class="w-full bg-transparent text-xl md:text-2xl font-light tracking-tight focus:outline-none placeholder:text-gray-200">
                </div>

                <div class="flex items-center gap-4 w-full md:w-auto">
                    <div class="relative w-full md:w-48">
                        <label
                            class="text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400 block mb-2 text-right">Catégorie</label>
                        <select
                            class="custom-select w-full bg-transparent text-[11px] font-bold uppercase tracking-widest text-right pr-6 focus:outline-none cursor-pointer">
                            <option>Toutes les recettes</option>
                            <option>Entrées</option>
                            <option>Plats Principaux</option>
                            <option>Desserts</option>
                            <option>Boissons</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16 pb-20 animate-in"
            style="animation-delay: 0.3s;">

            <div class="recipe-card group">
                <div class="relative overflow-hidden rounded-sm bg-gray-200 aspect-[4/5] mb-4">
                    <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&q=80&w=800"
                        class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 transition duration-700">

                    <button
                        class="absolute top-4 right-4 h-9 w-9 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-sm hover:text-red-500 transition btn-animate">
                        <i class="fa-regular fa-heart"></i>
                    </button>

                    <div
                        class="absolute bottom-4 right-4 translate-y-12 group-hover:translate-y-0 transition duration-500">
                        <button
                            class="h-10 w-10 bg-black text-white rounded-full flex items-center justify-center shadow-xl hover:bg-orange-600 transition">
                            <i class="fa-solid fa-arrow-right -rotate-45"></i>
                        </button>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-start">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-orange-600">Plat Principal</p>
                        <div class="flex items-center gap-2 text-[10px] text-gray-400 font-bold">
                            <span><i class="fa-solid fa-star text-orange-500 text-[8px]"></i> 4.8</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>20 MIN</span>
                        </div>
                    </div>

                    <h3 class="text-lg font-bold tracking-tight group-hover:underline decoration-1 underline-offset-4">
                        Bowl de Saison aux Légumes</h3>

                    <div class="flex items-center justify-between pt-2 border-t border-gray-50">
                        <div class="flex items-center gap-2">
                            <div
                                class="w-5 h-5 rounded-full bg-zinc-800 flex items-center justify-center text-[8px] text-white font-bold">
                                A</div>
                            <span class="text-[9px] font-bold uppercase tracking-tighter">Chef Amine</span>
                        </div>

                        <div class="flex items-center gap-3 text-gray-400">
                            <span class="text-[9px] font-bold"><i class="fa-regular fa-heart mr-1"></i> 124</span>
                            <span class="text-[9px] font-bold"><i class="fa-regular fa-comment mr-1"></i> 8</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('py-1');
            } else {
                nav.classList.remove('py-1');
            }
        });
    </script>
</body>

</html>

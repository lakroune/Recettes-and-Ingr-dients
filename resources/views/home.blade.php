<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodieShare | Recettes Populaires</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .recipe-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .recipe-card:hover {
            transform: translateY(-5px);
        }

        .animate-in {
            animation: fadeIn 0.8s ease forwards;
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
    </style>
</head>

<body class="bg-[#fafafa] text-[#1a1a1a]">

    <x-header />

    <main class="max-w-7xl mx-auto px-6">

        <section
            class="mt-12 py-8 border-y border-gray-100 flex flex-wrap justify-around items-center gap-8 animate-in">
            <div class="text-center">
                <p class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-400 mb-1">Total Recettes</p>
                <h4 class="text-4xl font-black text-black">{{ count($recettes) }} </h4>
            </div>
            <div class="w-px h-10 bg-gray-100 hidden md:block"></div>
            <div class="text-center">
                <p class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-400 mb-1">Chefs Actifs</p>
                <h4 class="text-4xl font-black text-black">450</h4>
            </div>
            <div class="w-px h-10 bg-gray-100 hidden md:block"></div>
            <div class="text-center">
                <p class="text-[10px] font-bold uppercase tracking-[0.3em] text-gray-400 mb-1">Communauté</p>
                <h4 class="text-4xl font-black text-black">{{ count($visiteurs) }}</h4>
            </div>
        </section>

        <div class="mt-20 mb-10 flex justify-between items-end animate-in">
            <div>
                <span class="text-orange-600 font-bold text-[10px] uppercase tracking-widest">Les plus aimées</span>
                <h2 class="text-3xl font-black tracking-tighter">Recettes Populaires.</h2>
            </div>
            <a href="/recettes"
                class="text-[10px] font-black uppercase tracking-widest border-b-2 border-black pb-1 hover:text-orange-600 hover:border-orange-600 transition">Voir
                tout</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-14 pb-20 animate-in">

            @foreach ($recettes_populaires as $recette)
                <div class="recipe-card group">
                    <div class="relative overflow-hidden rounded-xl bg-gray-200 aspect-video mb-4">
                        <img src="{{ asset('storage/' . $recette->images[0]->url_image) }}"
                            class="w-full h-full object-cover grayscale-[20%] group-hover:grayscale-0 group-hover:scale-105 transition duration-700">
                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full shadow-sm">
                            <span class="text-[9px] font-bold uppercase tracking-tight text-orange-600"><i
                                    class="fa-solid fa-fire mr-1"></i>Tendance</span>
                        </div>
                    </div>
                    <div class="space-y-2 px-1">
                        <div
                            class="flex justify-between items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                            <span>Pâtes • {{ $recette->temps_preparations }}</span>
                            <span class="text-black"><i class="fa-solid fa-star text-orange-500 mr-1"></i>4.9</span>
                        </div>
                        <h3
                            class="text-xl font-extrabold tracking-tight hover:text-orange-600 transition cursor-pointer">
                            Pasta Al Limone Premium</h3>
                        <div class="flex justify-between items-center pt-3 border-t border-gray-50">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-6 h-6 rounded-full bg-black flex items-center justify-center text-[10px] text-white font-bold">
                                    A</div>
                                <span class="text-[10px] font-bold uppercase text-gray-500">{{ $recette->user->nom . " " . $recette->user->prenom }}</span>
                            </div>
                            <div class="flex gap-3 text-gray-300">
                                <span class="text-[10px] font-bold text-gray-400"><i
                                        class="fa-regular fa-heart mr-1"></i>
                                    1.2k</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach







        </div>
    </main>

</body>

</html>

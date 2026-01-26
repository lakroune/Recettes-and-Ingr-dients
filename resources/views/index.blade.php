<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodieShare - Découvrez les meilleures recettes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }
        .hero-pattern {
            background-color: #ffffff;
            background-image:  radial-gradient(#ea580c 0.5px, transparent 0.5px), radial-gradient(#ea580c 0.5px, #ffffff 0.5px);
            background-size: 20px 20px;
            background-position: 0 0,10px 10px;
            opacity: 0.05;
        }
    </style>
</head>
<body class="bg-white text-gray-900">

    <nav class="glass-nav shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 h-16 flex justify-between items-center">
            <div class="flex items-center gap-8">
                <span class="text-2xl font-black text-orange-600 tracking-tighter">FOODIE<span class="text-gray-900">SHARE</span></span>
                <div class="hidden md:flex gap-6 text-sm font-semibold text-gray-600">
                    <a href="#" class="hover:text-orange-600 transition">Découvrir</a>
                    <a href="#" class="hover:text-orange-600 transition">Populaires</a>
                    <a href="#" class="hover:text-orange-600 transition">À propos</a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <a href="#" class="text-sm font-bold text-gray-700 hover:text-orange-600">Connexion</a>
                <a href="#" class="bg-gray-900 text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-orange-600 transition shadow-lg shadow-gray-200">
                    S'inscrire
                </a>
            </div>
        </div>
    </nav>

    <header class="relative py-16 lg:py-24 overflow-hidden">
        <div class="hero-pattern absolute inset-0"></div>
        <div class="max-w-7xl mx-auto px-4 relative flex flex-col lg:flex-row items-center gap-12">
            <div class="flex-1 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 bg-orange-50 border border-orange-100 px-3 py-1 rounded-full text-orange-600 text-xs font-bold mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-600"></span>
                    </span>
                    +1,200 Nouvelles recettes cette semaine
                </div>
                <h1 class="text-5xl lg:text-7xl font-black text-gray-900 leading-[1.1] mb-6">
                    Cuisinez comme un <span class="text-orange-600">Chef</span> chez vous.
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-xl mx-auto lg:mx-0">
                    Rejoignez la plus grande communauté culinaire pour découvrir, partager et sauvegarder vos recettes préférées.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto lg:mx-0 bg-white p-2 rounded-2xl shadow-2xl border border-gray-100">
                    <div class="flex-1 relative">
                        <i class="fa-solid fa-utensils absolute left-4 top-3.5 text-gray-300"></i>
                        <input type="text" placeholder="Poulet basquaise, Tacos..." 
                            class="w-full pl-12 pr-4 py-3 outline-none text-gray-700">
                    </div>
                    <button class="bg-orange-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-orange-700 transition">
                        Rechercher
                    </button>
                </div>
            </div>

            <div class="flex-1 relative">
                <div class="relative z-10 rounded-[2rem] overflow-hidden shadow-2xl border-8 border-white transform rotate-2">
                    <img src="https://images.unsplash.com/photo-1516714435131-44d6b64dc6a2?auto=format&fit=crop&q=80&w=800" alt="Cooking">
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl z-20 flex items-center gap-4 animate-bounce-slow">
                    <div class="bg-green-100 h-10 w-10 rounded-full flex items-center justify-center text-green-600">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase">Recette vérifiée</p>
                        <p class="font-bold">Tajine de Kefta</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-16">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div>
                <h2 class="text-3xl font-black mb-2">Explorez nos trésors</h2>
                <p class="text-gray-500 italic">"La cuisine est le langage de l'amour."</p>
            </div>
            
            <div class="flex gap-2 bg-gray-100 p-1.5 rounded-xl">
                <button class="px-5 py-2 rounded-lg bg-white shadow-sm font-bold text-sm">Tout</button>
                <button class="px-5 py-2 rounded-lg hover:bg-white transition font-bold text-sm text-gray-500">Plats</button>
                <button class="px-5 py-2 rounded-lg hover:bg-white transition font-bold text-sm text-gray-500">Desserts</button>
                <button class="px-5 py-2 rounded-lg hover:bg-white transition font-bold text-sm text-gray-500">Boissons</button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group">
                <div class="relative rounded-3xl overflow-hidden mb-4 aspect-square shadow-lg">
                    <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&q=80&w=600" 
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <button class="w-full bg-white text-gray-900 py-2 rounded-xl font-bold text-sm">Voir la recette</button>
                    </div>
                </div>
                <h3 class="font-bold text-lg mb-1 group-hover:text-orange-600 transition">Salade Méditerranéenne</h3>
                <div class="flex items-center gap-2 text-sm text-gray-400 font-medium">
                    <span><i class="fa-solid fa-clock mr-1 text-orange-400"></i> 20 min</span>
                    <span>•</span>
                    <span><i class="fa-solid fa-fire mr-1 text-orange-400"></i> Facile</span>
                </div>
            </div>
            </div>

        <section class="mt-24 bg-gray-900 rounded-[3rem] p-12 text-center text-white relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-4xl font-black mb-4">Prêt à partager vos délices ?</h2>
                <p class="text-gray-400 mb-8 max-w-lg mx-auto">Rejoignez nos <span class="text-white font-bold text-xl">12,403</span> membres actifs et commencez à publier vos propres créations.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="bg-orange-600 hover:bg-orange-700 text-white px-10 py-4 rounded-2xl font-black transition transform hover:-translate-y-1">
                        Créer mon compte gratuitement
                    </button>
                </div>
            </div>
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-64 h-64 bg-orange-600 rounded-full blur-[120px] opacity-20"></div>
        </section>
    </main>

</body>
</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasta Al Limone | FoodieShare Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }

        .step-number {
            -webkit-text-stroke: 1px #e5e7eb;
            color: transparent;
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1;
        }

        .btn-animate {
            transition: all 0.2s;
        }

        .btn-animate:active {
            scale: 0.95;
        }

        .star-rating i {
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating i.active {
            color: #ea580c;
        }

        .comment-item {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-[#fafafa] text-[#1a1a1a]">

    <nav class="sticky top-0 z-50 glass border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="index.html" class="text-sm font-black tracking-tighter uppercase">Foodie<span
                    class="text-orange-600">.</span>Share</a>
            <div class="flex items-center gap-6">
                <button
                    class="hidden sm:block text-[10px] font-bold uppercase tracking-[0.2em] hover:text-orange-600 transition">
                    <i class="fa-regular fa-bookmark mr-2"></i>Sauvegarder
                </button>
                <div
                    class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12">
        <header class="mb-16">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-10">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <span
                            class="text-[10px] font-bold tracking-[0.3em] text-orange-600 uppercase italic underline decoration-2 underline-offset-4">Recette
                            Premium</span>
                        <div class="flex text-[8px] text-orange-500">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter leading-[0.9]">
                        {{ $recette->title_recette }}
                    </h1>
                </div>
                <div class="flex gap-10 border-l border-gray-200 pl-10">
                    <div>
                        <p class="text-xl font-bold italic tracking-tighter text-orange-600">
                            {{ $recette->temp_preparation }}</p>
                        <p class="text-[9px] uppercase tracking-widest text-gray-400 font-bold">Minutes</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold italic tracking-tighter">{{ $recette->difficulte }}</p>
                        <p class="text-[9px] uppercase tracking-widest text-gray-400 font-bold">Difficulté</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold italic tracking-tighter">{{ $recette->calories }}</p>
                        <p class="text-[9px] uppercase tracking-widest text-gray-400 font-bold">Calories</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 h-[600px]">
                <div class="md:col-span-8 h-full"><img src="{{ asset('storage/' . $recette->images[0]->url_image) }} "
                        class="w-full h-full object-cover rounded-sm"></div>
                <div class="md:col-span-4 grid grid-rows-2 gap-4 h-full">
                    <img src="{{ asset('storage/' . $recette->images[1]->url_image) }} "
                        class="w-full h-full object-cover rounded-sm">
                    <img src="{{ asset('storage/' . $recette->images[2]->url_image) }} "
                        class="w-full h-full object-cover rounded-sm">
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20">
            <aside class="lg:col-span-4">
                <div class="sticky top-28 space-y-10">
                    <div>
                        <h2 class="text-2xl font-black uppercase tracking-tighter mb-6 border-b-2 border-black pb-2">
                            Ingrédients</h2>
                        <ul class="space-y-5">
                            @foreach ($recette->ingredients as $ingredient)
                                <li class="flex justify-between items-center text-sm border-b border-gray-50 pb-3"><span
                                        class="text-gray-500 font-medium"> {{ $ingredient->nom_ingredient }}</span><span
                                        class="font-bold tracking-tighter text-lg">{{ $ingredient->quantite }}
                                        {{ $ingredient->unite }}</span>
                                    </span>
                                </li>
                            @endforeach



                        </ul>
                    </div>
                    <div class="bg-zinc-900 text-white p-8 rounded-sm">
                        <i class="fa-solid fa-quote-left text-orange-600 mb-4 text-2xl"></i>
                        <p class="text-xs leading-relaxed italic text-gray-300">"La clé est l'émulsion : l'eau amidonnée
                            des pâtes crée cette sauce crémeuse."</p>
                        <p class="mt-4 text-[9px] font-bold uppercase tracking-[0.2em]">— Chef Amine</p>
                    </div>
                </div>
            </aside>

            <div class="lg:col-span-8">
                <h2 class="text-2xl font-black uppercase tracking-tighter mb-10 border-b-2 border-black pb-2">
                    Préparation</h2>
                <div class="space-y-16">
                    @foreach ($recette->etapes as $index => $etape)
                        <div class="flex gap-8 group"><span
                                class="step-number group-hover:text-orange-100 transition">{{ $etape->order_etape }}</span>
                            <div class="pt-2">
                                <h3 class="font-bold uppercase text-[11px] tracking-widest mb-3 text-orange-600">Base
                                    Aromatique</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $etape->description_etape }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <section class="mt-32 pt-16 border-t border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-12">
                        <h2 class="text-3xl font-black uppercase tracking-tighter">Avis & Questions</h2>
                        <div
                            class="flex items-center gap-4 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-50">
                            <span class="text-[10px] font-bold text-gray-400 uppercase">Score communautaire</span>
                            <span id="avg-rating" class="text-sm font-black italic underline text-orange-600">4.9 /
                                5.0</span>
                        </div>
                    </div>

                    <div class="mb-20">
                        <div class="flex gap-6 mb-6">
                            <button id="type-avis" onclick="setType('avis')"
                                class="text-[10px] font-bold uppercase tracking-widest border-b-2 border-black pb-1 transition-all">Donner
                                un avis</button>
                            <button id="type-question" onclick="setType('question')"
                                class="text-[10px] font-bold uppercase tracking-widest text-gray-400 hover:text-black transition pb-1">Poser
                                une question</button>
                        </div>

                        <div id="stars-row" class="flex items-center gap-2 mb-4 star-rating text-gray-200">
                            <span class="text-[9px] font-bold uppercase mr-2 text-gray-400">Votre note :</span>
                            <i class="fa-solid fa-star" data-v="1"></i>
                            <i class="fa-solid fa-star" data-v="2"></i>
                            <i class="fa-solid fa-star" data-v="3"></i>
                            <i class="fa-solid fa-star" data-v="4"></i>
                            <i class="fa-solid fa-star" data-v="5"></i>
                        </div>

                        <div class="relative">
                            <textarea id="main-input" placeholder="Votre message..."
                                class="w-full bg-transparent border-b border-gray-200 py-4 text-sm focus:outline-none focus:border-black transition resize-none min-h-[100px]"></textarea>
                            <button id="main-submit" onclick="handleAction()"
                                class="mt-4 bg-black text-white text-[10px] font-bold uppercase tracking-[0.2em] px-8 py-4  hover:bg-orange-600 transition btn-animate">
                                Publier maintenant
                            </button>
                        </div>
                    </div>

                    <div id="comments-container" class="space-y-14">
                        <div class="comment-item group">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-[10px]">
                                        MOI</div>
                                    <div>
                                        <p class="text-xs font-black uppercase">Sarah Bel <span
                                                class="badge ml-2 text-[8px] px-2 py-0.5 bg-black text-white rounded-full">★
                                                5.0</span></p>
                                    </div>
                                </div>
                                <div class="flex gap-4 opacity-0 group-hover:opacity-100 transition">
                                    <button onclick="startEdit(this)"
                                        class="text-[9px] font-bold uppercase tracking-widest text-zinc-400 hover:text-black transition">Modifier</button>
                                    <button onclick="this.closest('.comment-item').remove()"
                                        class="text-[9px] font-bold uppercase tracking-widest text-red-400 hover:text-red-600 transition">Supprimer</button>
                                </div>
                            </div>
                            <p class="content-p text-sm text-gray-600 leading-relaxed pl-13">Recette testée ce soir. La
                                fraîcheur du citron avec le Pecorino est un équilibre parfait.</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <footer class="mt-32 py-20 border-t border-gray-100 text-center">
        <div class="text-sm font-black tracking-tighter uppercase mb-6">Foodie<span
                class="text-orange-600">.</span>Share</div>
        <p class="text-[9px] text-gray-300 font-bold uppercase tracking-widest">© 2026 Crafted for the modern chef</p>
    </footer>

    <script>
        let mode = 'avis';
        let rating = 0;
        let editTarget = null;

        // Logique Étoiles (Interactive)
        const starIcons = document.querySelectorAll('#stars-row i[data-v]');
        starIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                rating = icon.dataset.v;
                starIcons.forEach((s, i) => {
                    s.classList.toggle('active', i < rating);
                });
            });
        });

        // Toggle Avis / Question
        function setType(t) {
            mode = t;
            const btnAvis = document.getElementById('type-avis');
            const btnQuest = document.getElementById('type-question');
            const starRow = document.getElementById('stars-row');

            if (t === 'avis') {
                btnAvis.className = 'text-[10px] font-bold uppercase tracking-widest border-b-2 border-black pb-1';
                btnQuest.className = 'text-[10px] font-bold uppercase tracking-widest text-gray-400 pb-1';
                starRow.style.opacity = '1';
                starRow.style.pointerEvents = 'auto';
            } else {
                btnQuest.className = 'text-[10px] font-bold uppercase tracking-widest border-b-2 border-black pb-1';
                btnAvis.className = 'text-[10px] font-bold uppercase tracking-widest text-gray-400 pb-1';
                starRow.style.opacity = '0.2';
                starRow.style.pointerEvents = 'none';
            }
        }

        // Action Publier / Modifier
        function handleAction() {
            const input = document.getElementById('main-input');
            const content = input.value.trim();
            if (!content) return;

            if (editTarget) {
                // Modification
                editTarget.querySelector('.content-p').innerText = content;
                if (mode === 'avis' && rating > 0) {
                    editTarget.querySelector('.badge').innerText = '★ ' + rating + '.0';
                }
                cancelEdit();
            } else {
                // Création
                const container = document.getElementById('comments-container');
                const div = document.createElement('div');
                div.className = "comment-item group";

                const badgeClass = mode === 'avis' ? 'bg-black text-white' : 'bg-orange-600 text-white';
                const badgeLabel = mode === 'avis' ? `★ ${rating || 5}.0` : 'QUESTION';

                div.innerHTML = `
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-zinc-200 flex items-center justify-center font-bold text-[10px]">VIS</div>
                            <div>
                                <p class="text-xs font-black uppercase">Visiteur <span class="badge ml-2 text-[8px] px-2 py-0.5 ${badgeClass} rounded-full">${badgeLabel}</span></p>
                            </div>
                        </div>
                        <div class="flex gap-4 opacity-0 group-hover:opacity-100 transition">
                            <button onclick="startEdit(this)" class="text-[9px] font-bold uppercase tracking-widest text-zinc-400 hover:text-black">Modifier</button>
                            <button onclick="this.closest('.comment-item').remove()" class="text-[9px] font-bold uppercase tracking-widest text-red-400 hover:text-red-600">Supprimer</button>
                        </div>
                    </div>
                    <p class="content-p text-sm text-gray-600 leading-relaxed pl-13">${content}</p>
                `;
                container.prepend(div);
            }
            input.value = '';
            rating = 0;
            starIcons.forEach(s => s.classList.remove('active'));
        }

        function startEdit(btn) {
            editTarget = btn.closest('.comment-item');
            document.getElementById('main-input').value = editTarget.querySelector('.content-p').innerText;
            document.getElementById('main-submit').innerText = "Mettre à jour le message";
            document.getElementById('main-input').focus();
        }

        function cancelEdit() {
            editTarget = null;
            document.getElementById('main-submit').innerText = "Publier maintenant";
            document.getElementById('main-input').value = '';
        }
    </script>
</body>

</html>

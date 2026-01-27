<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recette->title_recette }} | FoodieShare</title>
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
            <a href="/" class="text-sm font-black tracking-tighter uppercase">Foodie<span
                    class="text-orange-600">.</span>Share</a>
            <div class="flex items-center gap-6">
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
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter leading-[0.9]">
                        {{ $recette->title_recette }}</h1>
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
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 h-[600px]">
                <div class="md:col-span-8 h-full">
                    <img src="{{ asset('storage/' . $recette->images[0]->url_image) }}"
                        class="w-full h-full object-cover rounded-sm">
                </div>
                <div class="md:col-span-4 grid grid-rows-2 gap-4 h-full">
                    @foreach ($recette->images->slice(1, 2) as $img)
                        <img src="{{ asset('storage/' . $img->url_image) }}"
                            class="w-full h-full object-cover rounded-sm">
                    @endforeach
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
                                <li class="flex justify-between items-center text-sm border-b border-gray-50 pb-3">
                                    <span class="text-gray-500 font-medium">{{ $ingredient->nom_ingredient }}</span>
                                    <span class="font-bold tracking-tighter text-lg">{{ $ingredient->quantite }}
                                        {{ $ingredient->unite }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="lg:col-span-8">
                <h2 class="text-2xl font-black uppercase tracking-tighter mb-10 border-b-2 border-black pb-2">
                    Préparation</h2>
                <div class="space-y-16 mb-32">
                    @foreach ($recette->etapes as $etape)
                        <div class="flex gap-8 group">
                            <span
                                class="step-number group-hover:text-orange-100 transition">{{ $etape->order_etape }}</span>
                            <div class="pt-2">
                                <h3 class="font-bold uppercase text-[11px] tracking-widest mb-3 text-orange-600">Étape
                                    {{ $etape->order_etape }}</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $etape->description_etape }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <section id="reviews-section" class="pt-16 border-t border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-12">
                        <h2 class="text-3xl font-black uppercase tracking-tighter">Avis & Questions</h2>
                    </div>

                    @auth
                        <form id="comment-form" action="{{ route('comment.store') }}" method="POST" class="mb-20">
                            @csrf
                            <div id="method-container">
                            </div> <input type="hidden" name="recette_id" value="{{ $recette->id }}">

                            <div class="flex gap-6 mb-6">
                                <button type="button" onclick="setType('avis')" id="btn-avis"
                                    class="text-[10px] font-bold uppercase tracking-widest border-b-2 border-black pb-1">Donner
                                    un avis</button>
                                <button type="button" onclick="setType('question')" id="btn-question"
                                    class="text-[10px] font-bold uppercase tracking-widest text-gray-400 pb-1">Poser une
                                    question</button>
                            </div>

                            <div id="stars-row" class="flex items-center gap-2 mb-4 star-rating text-gray-200">
                                <span class="text-[9px] font-bold uppercase mr-2 text-gray-400">Note :</span>
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star" data-v="{{ $i }}"></i>
                                @endfor
                                <input type="hidden" name="rating" id="rating-input" value="0">
                            </div>

                            <div class="relative">
                                <input type="hidden" name="comment_id" id="comment-id" value="0">
                                <textarea name="commentaire" id="main-input" placeholder="Votre message..." required
                                    class="w-full bg-transparent border-b border-gray-200 py-4 text-sm focus:outline-none focus:border-black transition resize-none min-h-[100px]"></textarea>

                                <div class="flex items-center gap-4 mt-4">
                                    <button type="submit" id="main-submit"
                                        class="bg-black text-white text-[10px] font-bold uppercase tracking-[0.2em] px-8 py-4 hover:bg-orange-600 transition btn-animate">
                                        Publier maintenant
                                    </button>
                                    <button type="button" id="cancel-edit" onclick="cancelEdit()"
                                        class="hidden text-[10px] font-bold uppercase tracking-widest text-red-500 hover:underline">
                                        Annuler la modification
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <p class="mb-10 text-sm text-gray-500 italic">Veuillez vous <a href="/login"
                                class="text-orange-600 underline">connecter</a> pour laisser un avis.</p>
                    @endauth

                    <div id="comments-container" class="space-y-14">
                        @foreach ($recette->commentaires as $commentaire)
                            <div class="comment-item group" id="comment-{{ $commentaire->id }}">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-[10px]">
                                            {{ strtoupper(substr($commentaire->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="text-xs font-black uppercase">{{ $commentaire->user->name }}</p>
                                        </div>
                                    </div>

                                    @if (auth()->check() && $commentaire->user_id == auth()->id())
                                        <div class="flex gap-4 opacity-0 group-hover:opacity-100 transition">
                                            <button
                                                onclick="startEdit({{ $commentaire->id }}, '{{ addslashes($commentaire->commentaire) }}')"
                                                class="text-[9px] font-bold uppercase tracking-widest text-zinc-400 hover:text-black transition">Modifier</button>

                                            <form action="{{ route('comment.destroy', $commentaire->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Supprimer ce commentaire ?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="text-[9px] font-bold uppercase tracking-widest text-red-400 hover:text-red-600 transition">Supprimer</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <p class="content-p text-sm text-gray-600 leading-relaxed pl-13">
                                    {{ $commentaire->commentaire }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script>
        let rating = 0;

        // 1. Gestion des Étoiles
        const starIcons = document.querySelectorAll('#stars-row i[data-v]');
        starIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                rating = icon.dataset.v;
                document.getElementById('rating-input').value = rating;
                starIcons.forEach((s, i) => s.classList.toggle('active', i < rating));
            });
        });

        // 2. Switch Avis / Question
        function setType(t) {
            const btnAvis = document.getElementById('btn-avis');
            const btnQuest = document.getElementById('btn-question');
            const starRow = document.getElementById('stars-row');

            if (t === 'avis') {
                btnAvis.className = 'text-[10px] font-bold uppercase tracking-widest border-b-2 border-black pb-1';
                btnQuest.className = 'text-[10px] font-bold uppercase tracking-widest text-gray-400 pb-1';
                starRow.style.display = 'flex';
            } else {
                btnQuest.className = 'text-[10px] font-bold uppercase tracking-widest border-b-2 border-black pb-1';
                btnAvis.className = 'text-[10px] font-bold uppercase tracking-widest text-gray-400 pb-1';
                starRow.style.display = 'none';
                document.getElementById('rating-input').value = 0;
            }
        }

        // 3. Passer en mode MODIFICATION
        function startEdit(id, content) {
            const form = document.getElementById('comment-form');
            const input = document.getElementById('main-input');
            const submitBtn = document.getElementById('main-submit');
            const cancelBtn = document.getElementById('cancel-edit');
            const comment_id = document.getElementById('comment-id');
            const methodContainer = document.getElementById('method-container');

            form.action = "{{ route('comment.update', ':id') }}".replace(':id', id);
            comment_id.value = id;
            methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';

            input.value = content;
            submitBtn.innerText = "Mettre à jour le message";
            cancelBtn.classList.remove('hidden');

            form.scrollIntoView({
                behavior: 'smooth'
            });
            input.focus();
        }

        function cancelEdit() {
            const form = document.getElementById('comment-form');
            const input = document.getElementById('main-input');
            const submitBtn = document.getElementById('main-submit');
            const cancelBtn = document.getElementById('cancel-edit');
            const methodContainer = document.getElementById('method-container');

            form.action = "{{ route('comment.store') }}";
            methodContainer.innerHTML = '';
            input.value = '';
            submitBtn.innerText = "Publier maintenant";
            cancelBtn.classList.add('hidden');
        }
    </script>
</body>

</html>

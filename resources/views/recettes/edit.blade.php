<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier {{ $recette->title_recette }} | FoodieShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fafafa;
            scroll-behavior: smooth;
        }

        .input-flat {
            background: transparent;
            border-bottom: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .input-flat:focus {
            outline: none;
            border-color: #ea580c;
            background: rgba(234, 88, 12, 0.02);
        }

        .btn-black {
            background: #000;
            color: #fff;
            padding: 1rem 2rem;
            text-transform: uppercase;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.2em;
            transition: all 0.3s;
        }

        .btn-black:hover {
            background: #ea580c;
            transform: translateY(-2px);
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animate-in-right {
            animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="text-[#1a1a1a]">

    <x-header />

    <main class="max-w-6xl mx-auto px-6 py-20">
        <header class="mb-16">
            <span
                class="text-[10px] font-bold tracking-[0.3em] text-orange-600 uppercase italic underline decoration-2 underline-offset-4">
                Mode Édition Premium
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter leading-none mt-4">
                Modifier votre<br>Chef-d'œuvre.
            </h1>
        </header>

        <form action="{{ route('recettes.update', $recette->id) }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-1 lg:grid-cols-12 gap-20">
            @csrf
            @method('PUT')

            <div class="lg:col-span-7 space-y-16">

                <section class="space-y-8">
                    <input name="title_recette" type="text"
                        value="{{ old('title_recette', $recette->title_recette) }}" placeholder="Titre de la recette..."
                        class="input-flat w-full py-4 text-4xl font-black tracking-tighter">

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
                        <div class="flex flex-col">
                            <label class="text-[9px] font-bold uppercase text-gray-400 mb-2">Temps (min)</label>
                            <input name="temp_preparation" type="number"
                                value="{{ old('temp_preparation', $recette->temp_preparation) }}"
                                class="input-flat py-2 font-bold italic">
                        </div>
                        <div class="flex flex-col">
                            <label class="text-[9px] font-bold uppercase text-gray-400 mb-2">Difficulté</label>
                            <select name="difficulte" class="input-flat py-2 font-bold italic bg-transparent">
                                <option value="Facile" {{ $recette->difficulte == 'Facile' ? 'selected' : '' }}>Facile
                                </option>
                                <option value="Moyen" {{ $recette->difficulte == 'Moyen' ? 'selected' : '' }}>Moyen
                                </option>
                                <option value="Expert" {{ $recette->difficulte == 'Expert' ? 'selected' : '' }}>Expert
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-[9px] font-bold uppercase text-gray-400 mb-2">Catégorie</label>
                            <select name="categorie_id" class="input-flat py-2 font-bold italic bg-transparent">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"
                                        {{ $recette->categorie_id == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom_categorie }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-[9px] font-bold uppercase text-gray-400 mb-2">Calories</label>
                            <input name="calories" type="number" value="{{ old('calories', $recette->calories) }}"
                                class="input-flat py-2 font-bold italic">
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="text-xl font-black uppercase tracking-tighter mb-8 border-b-2 border-black pb-2">
                        Ingrédients</h2>
                    <div id="ingredientsList" class="space-y-6 mb-6">
                        @foreach ($recette->ingredients as $index => $ingredient)
                            <div class="flex items-end gap-4 ingredient-row">
                                <div class="flex-1">
                                    <input name="ingredients[{{ $index }}][nom_ingredient]" type="text"
                                        value="{{ $ingredient->nom_ingredient }}" placeholder="Ingrédient"
                                        class="input-flat w-full py-2 text-sm">
                                </div>
                                <div class="w-20">
                                    <input name="ingredients[{{ $index }}][quantite]" type="number"
                                        value="{{ $ingredient->quantite }}" placeholder="Qté"
                                        class="input-flat w-full py-2 text-sm font-bold">
                                </div>
                                <div class="w-24">
                                    <select name="ingredients[{{ $index }}][unite]"
                                        class="input-flat w-full py-2 text-[10px] font-bold uppercase tracking-widest bg-transparent">
                                        <option value="g" {{ $ingredient->unite == 'g' ? 'selected' : '' }}>g
                                        </option>
                                        <option value="kg" {{ $ingredient->unite == 'kg' ? 'selected' : '' }}>kg
                                        </option>
                                        <option value="ml" {{ $ingredient->unite == 'ml' ? 'selected' : '' }}>ml
                                        </option>
                                        <option value="l" {{ $ingredient->unite == 'l' ? 'selected' : '' }}>l
                                        </option>
                                        <option value="pcs" {{ $ingredient->unite == 'pcs' ? 'selected' : '' }}>Pcs
                                        </option>
                                    </select>
                                </div>
                                <button type="button" onclick="this.parentElement.remove()"
                                    class="pb-2 text-gray-300 hover:text-red-500 transition">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" onclick="addIngredient()"
                        class="text-[10px] font-bold uppercase tracking-[0.2em] text-orange-600">
                        + Ajouter un ingrédient
                    </button>
                </section>

                <section>
                    <h2 class="text-xl font-black uppercase tracking-tighter mb-8 border-b-2 border-black pb-2">
                        Préparation</h2>
                    <div id="stepsList" class="space-y-10">
                        @foreach ($recette->etapes as $index => $etape)
                            <div class="flex gap-6 items-start step-row">
                                <span class="step-number text-3xl font-black text-gray-200 tracking-tighter">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <textarea name="etapes[]" class="input-flat flex-1 py-1 text-sm resize-none" rows="2">{{ $etape->description_etape }}</textarea>
                                <button type="button" onclick="this.parentElement.remove(); updateStepNumbers();"
                                    class="mt-2 text-gray-300 hover:text-red-500">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" onclick="addStep()"
                        class="text-[10px] font-bold uppercase tracking-[0.2em] text-orange-600 mt-8">
                        + Ajouter une étape
                    </button>
                </section>

                <div class="pt-10">
                    <button type="submit" class="btn-black w-full shadow-lg">Mettre à jour la recette</button>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="sticky top-28 space-y-12">

                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-widest text-black mb-4 block">Image de
                            Couverture</label>
                        <div
                            class="relative group aspect-[3/4] bg-gray-100 border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden">
                            <input name="image_principale" type="file"
                                class="absolute inset-0 opacity-0 cursor-pointer z-20"
                                onchange="previewImage(this, 'mainPreview')">

                            @php $mainImg = $recette->images->first(); @endphp
                            <img id="mainPreview" src="{{ $mainImg ? asset('storage/' . $mainImg->url_image) : '' }}"
                                class="absolute inset-0 w-full h-full object-cover {{ $mainImg ? '' : 'hidden' }}">

                            <div class="text-center z-10 group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-camera text-3xl text-gray-300 mb-2"></i>
                                <p class="text-[9px] font-bold text-gray-400 uppercase">Modifier l'image</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-widest text-black mb-4 block">Galerie
                            Photo</label>
                        <div class="grid grid-cols-2 gap-4">
                            @for ($i = 1; $i <= 4; $i++)
                                @php $currentGalleryImg = $recette->images->get($i); @endphp
                                <div
                                    class="relative aspect-square bg-gray-50 border border-dashed border-gray-200 flex items-center justify-center overflow-hidden">
                                    <input name="images[]" type="file"
                                        class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                        onchange="previewImage(this, 'galPreview-{{ $i }}')">
                                    <img id="galPreview-{{ $i }}"
                                        src="{{ $currentGalleryImg ? asset('storage/' . $currentGalleryImg->url_image) : '' }}"
                                        class="absolute inset-0 w-full h-full object-cover {{ $currentGalleryImg ? '' : 'hidden' }}">
                                    <i class="fa-solid fa-plus text-gray-200"></i>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="bg-black p-8 text-white">
                        <h3 class="text-xs font-bold uppercase tracking-[0.2em] mb-4">Conseil Chef</h3>
                        <p class="text-[11px] text-gray-400 leading-relaxed italic">
                            "La cohérence visuelle entre vos photos et vos étapes permet une meilleure expérience pour
                            les utilisateurs."
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <!-- Système de Toasts -->
    <div id="toast-container" class="fixed top-5 right-5 z-[100] flex flex-col gap-3 w-full max-w-[320px]">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div
                    class="toast-item flex items-center p-4 bg-white border-l-4 border-red-500 shadow-2xl rounded-r-xl animate-in-right">
                    <div
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-100 rounded-full text-red-500">
                        <i class="fa-solid fa-circle-exclamation text-xs"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-[10px] font-black uppercase tracking-widest text-red-600">Erreur</p>
                        <p class="text-[9px] text-gray-500">{{ $error }}</p>
                    </div>
                    <button onclick="this.parentElement.remove()" class="ml-auto text-gray-300 hover:text-gray-600">
                        <i class="fa-solid fa-xmark text-xs"></i>
                    </button>
                </div>
            @endforeach
        @endif
    </div>

    <script>
        let ingredientIndex = {{ $recette->ingredients->count() }};

        function addIngredient() {
            const list = document.getElementById('ingredientsList');
            const row = `
                <div class="flex items-end gap-4 ingredient-row animate-in-right">
                    <div class="flex-1">
                        <input name="ingredients[${ingredientIndex}][nom_ingredient]" type="text" placeholder="Nouvel ingrédient" class="input-flat w-full py-2 text-sm">
                    </div>
                    <div class="w-20">
                        <input name="ingredients[${ingredientIndex}][quantite]" type="number" placeholder="Qté" class="input-flat w-full py-2 text-sm font-bold">
                    </div>
                    <div class="w-24">
                        <select name="ingredients[${ingredientIndex}][unite]" class="input-flat w-full py-2 text-[10px] font-bold uppercase tracking-widest bg-transparent">
                            <option value="g">g</option><option value="kg">kg</option><option value="ml">ml</option><option value="l">l</option><option value="pcs">Pcs</option>
                        </select>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="pb-2 text-gray-300 hover:text-red-500 transition"><i class="fa-solid fa-xmark"></i></button>
                </div>`;
            list.insertAdjacentHTML('beforeend', row);
            ingredientIndex++;
        }

        function addStep() {
            const list = document.getElementById('stepsList');
            const stepNum = list.querySelectorAll('.step-row').length + 1;
            const row = `
                <div class="flex gap-6 items-start step-row animate-in-right">
                    <span class="step-number text-3xl font-black text-gray-200 tracking-tighter">${stepNum.toString().padStart(2, '0')}</span>
                    <textarea name="etapes[]" placeholder="Décrivez cette étape..." class="input-flat flex-1 py-1 text-sm resize-none" rows="2"></textarea>
                    <button type="button" onclick="this.parentElement.remove(); updateStepNumbers();" class="mt-2 text-gray-300 hover:text-red-500"><i class="fa-solid fa-trash-can text-xs"></i></button>
                </div>`;
            list.insertAdjacentHTML('beforeend', row);
        }

        function updateStepNumbers() {
            document.querySelectorAll('.step-row').forEach((row, idx) => {
                row.querySelector('.step-number').innerText = (idx + 1).toString().padStart(2, '0');
            });
        }

        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(previewId);
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        setTimeout(() => {
            document.querySelectorAll('.toast-item').forEach(el => el.remove());
        }, 5000);
    </script>
</body>

</html>

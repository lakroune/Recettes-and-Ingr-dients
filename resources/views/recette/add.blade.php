<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Recette Premium | FoodieShare</title>
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
            transition: border-color 0.3s ease;
        }

        .input-flat:focus {
            outline: none;
            border-color: #ea580c;
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
            scale: 1.02;
        }

        .img-grid-preview {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body class="text-[#1a1a1a]">

    <nav class="h-16 flex items-center px-8 border-b border-gray-100 bg-white/80 backdrop-blur-md sticky top-0 z-50">
        <a href="#" class="text-sm font-black tracking-tighter uppercase">Foodie<span
                class="text-orange-600">.</span>Share</a>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-20">
        <header class="mb-16">
            <span
                class="text-[10px] font-bold tracking-[0.4em] text-orange-600 uppercase italic underline decoration-2 underline-offset-4">Studio
                de Création</span>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter leading-none mt-4">Nouveau<br>Chef-d'œuvre.
            </h1>
        </header>

        <form action="{{ route('recette.add') }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-1 lg:grid-cols-12 gap-20">
            @csrf
            <div class="lg:col-span-7 space-y-16">

                <section class="space-y-8">
                    <input name="title_recette" type="text" placeholder="Titre de la recette..."
                        class="input-flat w-full py-4 text-4xl font-black tracking-tighter">
                    <div class="grid grid-cols-4 gap-10">
                        <div class="flex flex-col"><label
                                class="text-[9px] font-bold uppercase text-gray-400 mb-2">Temps (min)
                            </label>
                            <input name="temp_preparation" type="number" class="input-flat py-2 font-bold italic">
                        </div>
                        <div class="flex flex-col"><label
                                class="text-[9px] font-bold uppercase text-gray-400 mb-2">Difficulté</label>
                            <select name="difficulte" class="input-flat py-2 font-bold italic bg-transparent">
                                <option value="Facile">Facile</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>


                        <div class="flex flex-col">
                            <label class="text-[9px] font-bold uppercase text-gray-400 mb-2">Catégorie</label>
                            <select name="categorie_id" class="input-flat py-2 font-bold italic bg-transparent">
                                <option value=""> categorie</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom_categorie }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="flex flex-col"><label
                                class="text-[9px] font-bold uppercase text-gray-400 mb-2">Calories
                            </label>
                            <input name="calories" type="number" class="input-flat py-2 font-bold italic">
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="text-xl font-black uppercase tracking-tighter mb-8 border-b-2 border-black pb-2">
                        Ingrédients</h2>
                    <div id="ingredientsList" class="space-y-6 mb-6">
                        <div class="flex items-end gap-4">
                            <div class="flex-1">
                                <input name="ingredients[0][nom_ingredient]" id="nom_ingredient" type="text"
                                    placeholder="Ingrédient" class="input-flat w-full py-2 text-sm">
                            </div>
                            <div class="w-20">
                                <input name="ingredients[0][quantite]" type="number" placeholder="Qté"
                                    class="input-flat w-full py-2 text-sm font-bold">
                            </div>
                            <div class="w-24">
                                <select name="ingredients[0][unite]"
                                    class="input-flat w-full py-2 text-[10px] font-bold uppercase tracking-widest bg-transparent">
                                    <option value="g">g</option>
                                    <option value="kg">kg</option>
                                    <option value="ml">ml</option>
                                    <option value="l">l</option>
                                    <option value="pcs">Pcs</option>
                                </select>
                            </div>
                            <button type="button" class="pb-2 text-gray-300 hover:text-red-500 transition"><i
                                    class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                    <button type="button" onclick="addIngredient()"
                        class="text-[10px] font-bold uppercase tracking-[0.2em] text-orange-600">+ Ajouter un
                        ingrédient</button>
                </section>

                <section>
                    <h2 class="text-xl font-black uppercase tracking-tighter mb-8 border-b-2 border-black pb-2">
                        Préparation</h2>
                    <div id="stepsList" class="space-y-10">
                        <div class="flex gap-6 items-start">
                            <span class="text-3xl font-black text-gray-200 tracking-tighter">01</span>
                            <textarea name="etapes[]" placeholder="Décrivez cette étape..." class="input-flat flex-1 py-1 text-sm resize-none"
                                rows="2"></textarea>
                        </div>
                    </div>
                    <button type="button" onclick="addStep()"
                        class="text-[10px] font-bold uppercase tracking-[0.2em] text-orange-600 mt-8">+ Ajouter une
                        étape</button>
                </section>

                <div class="pt-10">
                    <button type="submit" class="btn-black w-full shadow">Publier la recette premium</button>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="sticky top-28 space-y-12">

                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-widest text-black mb-4 block">Image
                            Principale (Portrait)</label>
                        <div
                            class="relative group aspect-[3/4] bg-gray-50 border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden">
                            <input name="image_principale" type="file"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10" onchange="previewMain(this)">
                            <div id="mainPlaceholder" class="text-center">
                                <i class="fa-solid fa-image text-3xl text-gray-200 mb-2"></i>
                                <p class="text-[9px] font-bold text-gray-400 uppercase">Image de couverture</p>
                            </div>
                            <img id="mainPreview" class="absolute inset-0 w-full h-full object-cover hidden">
                        </div>
                    </div>

                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-widest text-black mb-4 block">Galerie
                            Secondaire (Max 4)</label>
                        <div class="grid grid-cols-2 gap-4">
                            <template id="secondaryTemplate">
                                <div
                                    class="relative aspect-square bg-gray-50 border border-dashed border-gray-200 flex items-center justify-center overflow-hidden">
                                    <input name="images[]" type="file"
                                        class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                        onchange="previewSecondary(this)">
                                    <i class="fa-solid fa-plus text-gray-200"></i>
                                    <img class="absolute inset-0 w-full h-full object-cover hidden">
                                </div>
                            </template>

                            <div
                                class="secondary-slot aspect-square bg-gray-50 border border-dashed border-gray-200 flex items-center justify-center overflow-hidden relative">
                                <input name="images[]" type="file"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                    onchange="previewSecondary(this)">
                                <i class="fa-solid fa-plus text-gray-200"></i>
                                <img class="absolute inset-0 w-full h-full object-cover hidden">
                            </div>
                            <div
                                class="secondary-slot aspect-square bg-gray-50 border border-dashed border-gray-200 flex items-center justify-center overflow-hidden relative">
                                <input name="images[]" type="file"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                    onchange="previewSecondary(this)">
                                <i class="fa-solid fa-plus text-gray-200"></i>
                                <img class="absolute inset-0 w-full h-full object-cover hidden">
                            </div>
                            <div
                                class="secondary-slot aspect-square bg-gray-50 border border-dashed border-gray-200 flex items-center justify-center overflow-hidden relative">
                                <input name="images[]" type="file"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                    onchange="previewSecondary(this)">
                                <i class="fa-solid fa-plus text-gray-200"></i>
                                <img class="absolute inset-0 w-full h-full object-cover hidden">
                            </div>
                            <div
                                class="secondary-slot aspect-square bg-gray-50 border border-dashed border-gray-200 flex items-center justify-center overflow-hidden relative">
                                <input name="images[]" type="file"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                    onchange="previewSecondary(this)">
                                <i class="fa-solid fa-plus text-gray-200"></i>
                                <img class="absolute inset-0 w-full h-full object-cover hidden">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </main>
    <div id="toast-container" class="fixed top-5 right-5 z-[100] flex flex-col gap-3 w-full max-w-[320px]">

        @if (session('success'))
            <div class="toast-item flex items-center p-4 bg-black text-white rounded-xl shadow-2xl animate-in-right">
                <div
                    class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-500 rounded-full text-[10px]">
                    <i class="fa-solid fa-check text-white"></i>
                </div>
                <div class="ml-3">
                    <p class="text-[11px] font-bold uppercase tracking-widest">{{ session('success') }}</p>
                    <p class="text-[9px] text-gray-400">Votre contenu est en ligne.</p>
                </div>
                <button onclick="this.parentElement.remove()" class="ml-auto text-gray-500 hover:text-white">
                    <i class="fa-solid fa-xmark text-xs"></i>
                </button>
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div
                    class="toast-item flex items-center p-4 bg-white border border-red-100 shadow-xl rounded-xl animate-in-right">
                    <div
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-500 rounded-full text-[10px]">
                        <i class="fa-solid fa-exclamation text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-[11px] font-bold uppercase tracking-widest text-red-600">Erreur de saisie</p>
                        <p class="text-[9px] text-gray-500">{{ $error }}</p>
                    </div>
                    <button onclick="this.parentElement.remove()" class="ml-auto text-gray-300 hover:text-gray-600">
                        <i class="fa-solid fa-xmark text-xs"></i>
                    </button>
                </div>
            @endforeach
        @endif
    </div>

    <style>
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

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }

            to {
                opacity: 0;
                transform: scale(0.9);
            }
        }

        .animate-in-right {
            animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        .toast-exit {
            animation: fadeOut 0.3s ease forwards;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toasts = document.querySelectorAll('.toast-item');

            toasts.forEach((toast) => {
                setTimeout(() => {
                    toast.classList.add('toast-exit');
                    setTimeout(() => {
                        toast.remove();
                    }, 300);
                }, 5000);
            });
        });
    </script>

    <script>
        function addIngredient() {
            const container = document.getElementById('ingredientsList');
            const div = document.createElement('div');
            div.className = "flex items-end gap-4";
            div.innerHTML = `
                <div class="flex-1"><input name="ingredients[${container.children.length}][nom_ingredient]" type="text" placeholder="Ingrédient" class="input-flat w-full py-2 text-sm"></div>
                <div class="w-20"><input name="ingredients[${container.children.length}][quantite]" type="number" placeholder="Qté" class="input-flat w-full py-2 text-sm font-bold"></div>
                <div class="w-24">
                    <select name="ingredients[${container.children.length}][unite]" class="input-flat w-full py-2 text-[10px] font-bold uppercase tracking-widest bg-transparent">
                        <option value="g">g</option><option value="kg">kg</option><option value="ml">ml</option><option value="l">l</option><option value="pcs">Pcs</option>
                    </select>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="pb-2 text-gray-300 hover:text-red-500 transition"><i class="fa-solid fa-xmark"></i></button>
            `;
            container.appendChild(div);
        }

        function addStep() {
            const container = document.getElementById('stepsList');
            const count = container.children.length + 1;
            const div = document.createElement('div');
            div.className = "flex gap-6 items-start";
            div.innerHTML = `
                <span class="text-3xl font-black text-gray-200 tracking-tighter">${count < 10 ? '0'+count : count}</span>
                <textarea name="etapes[]" placeholder="Décrivez cette étape..." class="input-flat flex-1 py-1 text-sm resize-none" rows="2"></textarea>
                <button type="button" onclick="this.parentElement.remove()" class="text-gray-200 hover:text-red-500 pt-2"><i class="fa-solid fa-trash text-[10px]"></i></button>
            `;
            container.appendChild(div);
        }

        function previewMain(input) {
            const preview = document.getElementById('mainPreview');
            const placeholder = document.getElementById('mainPlaceholder');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewSecondary(input) {
            const container = input.parentElement;
            const img = container.querySelector('img');
            const icon = container.querySelector('i');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                    icon.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>

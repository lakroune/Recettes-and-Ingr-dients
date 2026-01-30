<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Chef | FoodieShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
        }

        .row-item {
            border-bottom: 1px solid #f9fafb;
            transition: all 0.3s ease;
        }

        .row-item:hover {
            background-color: #fafafa;
            border-bottom-color: #000;
        }

        .btn-action {
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .stat-label {
            font-size: 9px;
            font-weight: 800;
            color: #9ca3af;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .stat-count {
            font-weight: 700;
            font-size: 13px;
            color: #000;
        }
    </style>
</head>

<body class="text-[#1a1a1a]">

    <x-header />

    <main class="max-w-6xl mx-auto px-8 py-20">

        <header class="flex flex-col md:flex-row justify-between items-end gap-8 mb-24">
            <div class="space-y-1">
                <h1 class="text-6xl font-extrabold tracking-tighter leading-none">Votre <br>Répertoire.</h1>
                <p class="text-gray-400 text-xs italic mt-4">Gérez vos publications et les retours de la communauté.</p>
            </div>
            <a href="{{ route('recettes.create') }}"
                class="bg-black text-white px-10 py-5 text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-orange-600 transition">
                + Ajouter une recette
            </a>
        </header>

        <div class="space-y-2">
            <div class="flex px-4 mb-6 text-[9px] font-bold uppercase tracking-[0.3em] text-gray-300">
                <div class="flex-1">Détails de l'œuvre</div>
                <div class="hidden md:flex w-64 justify-between px-4">
                    <span>Avis</span>
                    <span>Commentaires</span>
                    <span>Likes</span>
                </div>
                <div class="w-40 text-right">Actions</div>
            </div>
            @foreach ($recettes as $recette)
                <div class="row-item flex items-center p-6 gap-6">
                    <div class="flex flex-1 items-center gap-8">
                        <div class="relative w-16 h-20 overflow-hidden">
                            <a href="{{ route('recettes.show', $recette->id) }}">
                                <img src="{{ asset('storage/' . $recette->images[0]->url_image) }}"
                                    class="w-full h-full object-cover">
                            </a>
                        </div>
                        <div>
                            <h3 class="font-black text-xl tracking-tight">
                                <a href="{{ route('recettes.show', $recette->id) }}">
                                    {{ $recette->title_recette }}
                                </a>
                            </h3>
                            <p class="text-[9px] text-gray-400 uppercase tracking-widest mt-1 italic">Posté le
                                {{ $recette->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="hidden md:flex w-64 justify-between px-4">
                        <div class="text-center">
                            <p class="stat-count">{{ count($recette->favoris) }} </p>
                            <p class="stat-label">★</p>
                        </div>
                        <div class="text-center">
                            <p class="stat-count">{{ count($recette->commentaires) }}</p>
                            <p class="stat-label">Coms</p>
                        </div>
                        <div class="text-center">
                            <p class="stat-count text-orange-600">156</p>
                            <p class="stat-label">Likes</p>
                        </div>
                    </div>

                    <div class="w-40 flex justify-end gap-6">

                        <form action="{{ route('recettes.edit', $recette->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button
                                class="btn-action text-black border-b border-transparent hover:border-black">Modifier</button>
                        </form>
                        <button type="button" onclick="openDeleteModal('{{ route('recettes.destroy', $recette->id) }}')"
                            class="btn-action
                            text-gray-300 hover:text-red-500"><i
                                class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            @endforeach




        </div>
    </main>
    <div id="delete-modal"
        class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 overflow-x-hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity"></div>

        <div class="relative bg-white w-full max-w-md p-8 rounded-sm shadow-2xl border border-gray-100">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-50 mb-6">
                    <i class="fa-solid fa-trash-can text-red-500 text-xl"></i>
                </div>
                <h3 class="text-xl font-black uppercase tracking-tighter mb-2">Supprimer la recette ?</h3>
                <p class="text-sm text-gray-500 mb-8">Cette action est irréversible. Voulez-vous vraiment continuer ?
                </p>

                <div class="flex gap-4">
                    <button onclick="closeDeleteModal()"
                        class="flex-1 px-6 py-3 text-[10px] font-bold uppercase tracking-widest border border-gray-200 hover:bg-gray-50 transition">
                        Annuler
                    </button>
                    <form id="confirm-delete-form" method="POST" class="flex-1">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="w-full px-6 py-3 text-[10px] font-bold uppercase tracking-widest bg-black text-white hover:bg-red-600 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        function openDeleteModal(url) {
            const modal = document.getElementById('delete-modal');
            const form = document.getElementById('confirm-delete-form');
            form.action = url;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Blocker le scroll
        }

        function closeDeleteModal() {
            const modal = document.getElementById('delete-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Revenir au scroll normal
        }

        document.getElementById('delete-modal').addEventListener('click', function(e) {
            if (e.target === this.firstElementChild) closeDeleteModal();
        });
    </script>
</body>

</html>

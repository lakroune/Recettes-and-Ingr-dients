<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoindre le Studio | FoodieShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            overflow-x: hidden;
        }

        .input-flat {
            background: transparent;
            border-bottom: 2px solid #f3f4f6;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        .input-flat:focus {
            outline: none;
            border-bottom-color: #ea580c;
        }

        .btn-black {
            background: #000;
            color: #fff;
            padding: 1.25rem;
            text-transform: uppercase;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.3em;
            transition: all 0.3s;
        }

        .btn-black:hover {
            background: #ea580c;
        }
    </style>
</head>

<body class="text-[#1a1a1a]">

    <div class="flex h-screen flex-row-reverse">

        <div class="w-full lg:w-[45%] flex flex-col justify-center px-12 md:px-20 bg-white relative">

            <div class="absolute top-10 right-12 lg:right-auto lg:left-12">
                {{-- <a href="#" class="text-sm font-black tracking-tighter uppercase italic">Foodie<span class="text-orange-600">.</span>Share</a> --}}
            </div>

            <div class="max-w-md w-full mx-auto">
                <header class="mb-12">
                    <span
                        class="text-[10px] font-bold tracking-[0.4em] text-gray-300 uppercase italic underline decoration-orange-600 underline-offset-8 block mb-6">
                        Nouveau Créateur
                    </span>
                    <h1 class="text-5xl md:text-6xl font-extrabold tracking-tighter leading-[0.9] mt-4">
                        {{-- <span class="block">Rejoindre</span>
                         <span class="block">le Studio.</span> --}}
                    </h1>
                </header>

                <form method="POST" action="/register" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label
                                class="text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-2">Prénom</label>
                            <input name="prenom" type="text" placeholder="mouad"
                                class="input-flat py-3 text-sm italic">
                        </div>
                        <div class="flex flex-col">
                            <label
                                class="text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-2">Nom</label>
                            <input name="nom" type="text" placeholder="hassan"
                                class="input-flat py-3 text-sm italic">
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-2">Email
                            Professionnel</label>
                        <input name="email" type="email" placeholder="chef@foodieshare.com"
                            class="input-flat py-3 text-sm">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-2">Mot de
                            passe</label>
                        <input name="password" type="password" placeholder="••••••••" class="input-flat py-3 text-sm">
                    </div>

                    <div class="flex items-center gap-3 py-2">
                        <input type="checkbox" name="terms" class="accent-black">
                        <label class="text-[9px] font-bold uppercase tracking-widest text-gray-400">J'accepte les
                            conditions</label>
                    </div>
                    @if ($errors->any())
                        <p class="text-[9px] font-bold uppercase text-orange-600 hover:underline">{{ $errors->first() }}
                        </p>
                    @endif
                    <div class="pt-4">
                        <button type="submit" class="btn-black w-full">
                            Créer mon profil chef
                        </button>
                    </div>
                </form>

                <footer class="mt-12">
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                        Déjà membre ?
                        <a href="/login"
                            class="text-black hover:text-orange-600 border-b border-black ml-2 transition-colors">Se
                            connecter</a>
                    </p>
                </footer>
            </div>
        </div>

        <div class="hidden lg:block lg:w-[55%] relative overflow-hidden bg-black">
            <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1200&auto=format&fit=crop"
                alt="Kitchen Art"
                class="w-full h-full object-cover opacity-70 grayscale hover:opacity-100 transition-opacity duration-1000">

            <div class="absolute inset-0 flex flex-col justify-end p-20">
                <div class="max-w-md border-l-2 border-orange-600 pl-8">
                    <p class="text-white text-3xl font-light italic leading-snug">
                        "L'ingrédient secret est toujours la passion."
                    </p>
                    <p class="text-orange-600 text-[10px] font-black uppercase tracking-[0.4em] mt-6">
                        Inscrivez-vous gratuitement.
                    </p>
                </div>
            </div>
        </div>

    </div>

</body>

</html>

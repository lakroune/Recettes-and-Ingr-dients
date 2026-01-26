<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | FoodieShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            overflow: hidden;
        }

        .input-flat {
            background: transparent;
            border-bottom: 2px solid #f3f4f6;
            transition: all 0.3s ease;
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

    <div class="flex h-screen">

        <div class="w-full lg:w-[40%] flex flex-col justify-center px-12 md:px-24 bg-white relative">

            <div class="absolute top-10 left-12">
                <a href="#" class="text-sm font-black tracking-tighter uppercase italic">Foodie<span
                        class="text-orange-600">.</span>Share</a>
            </div>

            <div class="max-w-sm w-full mx-auto">
                <header class="mb-12">
                    <span class="text-[10px] font-bold tracking-[0.4em] text-gray-300 uppercase italic">Bienvenue au
                        Studio</span>
                    <h1 class="text-5xl font-extrabold tracking-tighter mt-2 leading-none">Connexion.</h1>
                </header>

                <form action="/login" method="POST" class="space-y-10">
                    @csrf
                    <div class="flex flex-col">
                        <label for="email"
                            class="text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-2">Identifiant /
                            Email</label>
                        <input name="email" type="email" placeholder="chef@foodieshare.com"
                            class="input-flat py-3 text-sm font-medium italic">
                    </div>

                    <div class="flex flex-col">
                        <div class="flex justify-between items-center mb-2">
                            <label for="password"
                                class="text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400">Mot de
                                passe</label>
                            <a href="#"
                                class="text-[9px] font-bold uppercase text-orange-600 hover:underline">Oublié ?</a>
                        </div>
                        <input name="password" type="password" placeholder="••••••••"
                            class="input-flat py-3 text-sm font-medium">
                    </div>
                    @if ($errors->any())
                        <p class="text-[9px] font-bold uppercase text-orange-600 hover:underline">{{ $errors->first() }}
                        </p>
                    @endif
                    <div class="pt-4">
                        <button type="submit" class="btn-black w-full">
                            Se connecter au Studio
                        </button>
                    </div>
                </form>

                <footer class="mt-16 text-center lg:text-left">
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                        Nouveau chef ici ?
                        <a href="/register" class="text-black hover:text-orange-600 border-b border-black ml-2">Créer un
                            compte</a>
                    </p>
                </footer>
            </div>
        </div>

        <div class="hidden lg:block lg:w-[60%] relative overflow-hidden bg-gray-100">
            <img src="https://images.unsplash.com/photo-1550989460-0adf9ea622e2?q=80&w=1200&auto=format&fit=crop"
                alt="Chef Cooking"
                class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000 ease-in-out">

            <div class="absolute bottom-16 left-16 right-16 text-white bg-black/40 backdrop-blur-sm p-8 max-w-md">
                <p class="text-2xl font-black tracking-tight leading-tight italic">"La cuisine est une forme d'art.
                    Partagez votre talent avec le monde."</p>
                <div class="h-1 w-12 bg-orange-600 mt-4"></div>
            </div>
        </div>

    </div>

</body>

</html>

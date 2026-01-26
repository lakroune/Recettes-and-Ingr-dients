<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - FoodieShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bg-register {
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&q=80&w=1470');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen py-10">

    <div class="flex flex-col md:flex-row-reverse shadow-2xl rounded-2xl overflow-hidden max-w-5xl w-full m-4 bg-white">
        
        <div class="hidden md:flex md:w-1/2 bg-register p-12 flex-col justify-between text-white text-right">
            <div>
                <h1 class="text-4xl font-bold italic">Rejoignez-nous</h1>
                <p class="mt-4 text-gray-200">Commencez votre voyage culinaire, partagez vos secrets et inspirez des milliers de gourmands.</p>
            </div>
            <div class="text-sm font-light">
                Rejoignez +5000 Chefs amateurs déjà inscrits.
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:px-16">
            <div class="mb-8 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-800">Créer un Profil</h2>
                <p class="text-gray-500">C'est gratuit et ça le restera toujours.</p>
            </div>

            <form id="registerForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom Complet</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" id="fullname" required
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 text-sm outline-none transition-all"
                            placeholder="Ex: Mohamed Chef">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse Email</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" id="email" required
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 text-sm outline-none transition-all"
                            placeholder="chef@exemple.com">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <div class="mt-1 relative">
                            <input type="password" id="password" required
                                class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 text-sm outline-none transition-all"
                                placeholder="••••••••">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Confirmer</label>
                        <div class="mt-1 relative">
                            <input type="password" id="confirmPassword" required
                                class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 text-sm outline-none transition-all"
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Votre spécialité préférée</label>
                    <select class="mt-1 block w-full pl-3 pr-10 py-2.5 text-sm border border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 rounded-lg">
                        <option>Entrées</option>
                        <option>Plats de résistance</option>
                        <option>Desserts</option>
                        <option>Boissons</option>
                    </select>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" required class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                    <label class="ml-2 block text-sm text-gray-600">
                        J'accepte les <a href="#" class="text-orange-600 hover:underline">Conditions d'Utilisation</a>
                    </label>
                </div>

                <button type="submit" 
                    class="w-full bg-orange-600 text-white py-3 rounded-lg font-semibold hover:bg-orange-700 shadow-md transition-all active:scale-95">
                    Créer mon compte
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Déjà membre ? 
                <a href="#" class="text-orange-600 font-bold hover:underline">Se connecter</a>
            </p>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const pass = document.getElementById('password').value;
            const confirm = document.getElementById('confirmPassword').value;

            if(pass !== confirm) {
                alert("Oups ! Les mots de passe ne sont pas identiques.");
                return;
            }

            alert("Compte créé avec succès ! Bienvenue au club.");
        });
    </script>
</body>
</html>
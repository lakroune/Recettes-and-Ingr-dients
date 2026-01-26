<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FoodieShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bg-food {
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=1470');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="flex flex-col md:flex-row shadow-2xl rounded-2xl overflow-hidden max-w-4xl w-full m-4 bg-white">
        
        <div class="hidden md:flex md:w-1/2 bg-food p-12 flex-col justify-between text-white">
            <div>
                <h1 class="text-4xl font-bold italic">FoodieShare</h1>
                <p class="mt-4 text-gray-200">Rejoignez notre communauté de passionnés et partagez vos meilleures saveurs.</p>
            </div>
            <div class="text-sm font-light">
                &copy; 2024 Plateforme Culinaire Interactive.
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12">
            <div class="text-center md:text-left mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Bienvenue !</h2>
                <p class="text-gray-500">Connectez-vous pour cuisiner avec nous.</p>
            </div>

            <form id="loginForm" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse Email</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" id="email" required
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 text-sm outline-none transition-all"
                            placeholder="chef@exemple.com">
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center">
                        <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <a href="#" class="text-xs text-orange-600 hover:underline">Oublié ?</a>
                    </div>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password" required
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 text-sm outline-none transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" 
                    class="w-full bg-orange-600 text-white py-3 rounded-lg font-semibold hover:bg-orange-700 transform hover:scale-[1.02] transition-all shadow-lg">
                    Se Connecter
                </button>

                <div class="relative flex items-center justify-center my-4">
                    <span class="absolute inset-x-0 h-px bg-gray-200"></span>
                    <span class="relative px-3 bg-white text-sm text-gray-500">Ou continuer avec</span>
                </div>

                <div class="flex gap-4">
                    <button type="button" class="flex-1 flex justify-center items-center py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5 mr-2" alt="Google">
                        <span class="text-sm font-medium">Google</span>
                    </button>
                </div>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600">
                Pas encore de compte ? 
                <a href="#" class="text-orange-600 font-bold hover:underline">S'inscrire gratuitement</a>
            </p>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Simulating authentication
            if(email && password) {
                console.log("Tentative de connexion pour:", email);
                alert("Connexion réussie ! (C'est juste une démo)");
            } else {
                alert("Veuillez remplir tous les champs.");
            }
        });
    </script>
</body>
</html>
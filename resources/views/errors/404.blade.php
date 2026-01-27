<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Brûlée | FoodieShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Animation dyal l-boukh/fumé */
        @keyframes steam {
            0% { transform: translateY(0) scale(1); opacity: 0.2; }
            50% { transform: translateY(-20px) scale(1.2); opacity: 0.5; }
            100% { transform: translateY(-40px) scale(1.5); opacity: 0; }
        }
        .steam-icon { animation: steam 2s infinite ease-out; }
        
        .error-code {
            font-size: clamp(8rem, 20vw, 12rem);
            line-height: 1;
            letter-spacing: -0.05em;
        }
    </style>
</head>
<body class="bg-[#fafafa] flex items-center justify-center min-h-screen p-6">

    <div class="max-w-md w-full text-center space-y-8 mt-8">
        
        <div class="relative inline-block">
            <div class="text-orange-600 opacity-20 absolute -top-12 left-1/2 -translate-x-1/2 flex gap-4">
                <i class="fa-solid fa-cloud steam-icon" style="animation-delay: 0s"></i>
                <i class="fa-solid fa-cloud steam-icon" style="animation-delay: 0.5s"></i>
                <i class="fa-solid fa-cloud steam-icon" style="animation-delay: 1s"></i>
            </div>
            <h1 class="error-code font-black text-black">404</h1>
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <span class="bg-white/80 backdrop-blur px-4 py-1 border border-black text-[10px] font-bold tracking-[0.3em] uppercase">Recette Brûlée</span>
            </div>
        </div>

        <div class="space-y-3">
            <h2 class="text-xl font-bold tracking-tight">Oups ! Le plat est tombé par terre.</h2>
            <p class="text-gray-400 text-[11px] leading-relaxed uppercase tracking-widest max-w-xs mx-auto">
                La page que vous cherchez n'existe pas ou a été retirée du menu. 
                Peut-être une erreur dans les ingrédients ?
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-4">
            <a href="/" class="bg-black text-white text-[10px] font-bold uppercase tracking-widest px-8 py-4  hover:bg-orange-600 transition duration-300 w-full sm:w-auto">
                Retour au Menu
            </a>
            <button onclick="history.back()" class="text-[10px] font-bold uppercase tracking-widest border-b border-black pb-1 hover:text-orange-600 hover:border-orange-600 transition duration-300">
                Page précédente
            </button>
        </div>

        <div class="pt-12 text-[9px] text-gray-300 font-medium uppercase tracking-[0.2em]">
            &copy; FoodieShare Platform
        </div>
    </div>

</body>
</html>
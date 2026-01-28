 <nav class="sticky top-0 z-50 glass border-b border-gray-100">
     <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
         <a href="/">
             <div class="text-sm font-black tracking-tighter uppercase">Foodie<span class="text-orange-600">.</span>Share
             </div>
         </a>



         <div class="flex items-center gap-5">
             {{-- accueil    --}}
             <a href="/" class="flex items-center gap-2 group">
                 <span
                     class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                 <div
                     class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                     <i class="fa-solid fa-house"></i>
                 </div>
             </a>
             {{-- recettes plus populaires --}}
             <a href="/recettes" class="flex items-center gap-2 group">
                 <span
                     class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                 <div
                     class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                   {{--  chart icon --}}
                     <i class="fa-solid fa-chart-line"></i>
                 </div>
             </a>
             @if (Auth::check())
                 <a href="/mes-favoris" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="fa-solid fa-heart"></i>
                     </div>
                 </a>


                 {{-- cree une recette  --}}

                 <a href="/recette/add" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="fa-solid fa-plus"></i>
                     </div>
                 </a>

                 {{-- profile --}}
                 <a href="/recettes" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="fa-solid fa-user"></i>
                     </div>
                 </a>

                 {{-- logout --}}
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button href="/logout" class="flex items-center gap-2 group">
                         <span
                             class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                         <div
                             class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                             <i class="fa-solid fa-right-from-bracket"></i>
                         </div>
                     </button>
                 </form>
             @else
                 <a href="{{ route('login') }}" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="fa-solid fa-right-to-bracket"></i>
                     </div>
                 </a>
             @endif

         </div>
     </div>
 </nav>

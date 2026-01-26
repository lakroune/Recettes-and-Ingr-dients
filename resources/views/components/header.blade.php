 <nav class="sticky top-0 z-50 glass border-b border-gray-100">
     <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
         <a href="/">
             <div class="text-sm font-black tracking-tighter uppercase">Foodie<span class="text-orange-600">.</span>Share
             </div>
         </a>
         <div class="hidden md:flex items-center gap-8 text-[11px] font-bold uppercase tracking-widest text-gray-500">
             {{-- <a href="#" class="text-black border-b-2 border-black pb-1">Accueil</a>
                <a href="#" class="hover:text-black transition">Découvrir</a>
                <a href="#" class="hover:text-black transition">Communauté</a> --}}
         </div>

         <div class="flex items-center gap-5">
             @if (Auth::check())
                 <a href="/mes-favoris" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="fa-solid fa-heart"></i>
                     </div>
                 </a>
                 {{-- cree publication pincil --}}

                 <a href="/publier" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="pa fa-solid fa-pencil"></i>
                     </div>
                 </a>

                 {{-- profile --}}
                 <a href="/profile" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="fa-solid fa-user"></i>
                     </div>
                 </a>
                 {{-- gerer --}}
                 <a href="/gerer" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="fa-solid fa-gear"></i>
                     </div>
                 </a>
                 {{-- logout --}}
                 <a href="/logout" class="flex items-center gap-2 group">
                     <span
                         class="text-[10px] font-bold uppercase tracking-widest hidden sm:block group-hover:text-orange-600 transition"></span>
                     <div
                         class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center text-xs cursor-pointer btn-animate hover:bg-orange-600">
                         <i class="fa-solid fa-right-from-bracket"></i>
                     </div>
                 </a>
             @else
                 <a href="/login" class="flex items-center gap-2 group">
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

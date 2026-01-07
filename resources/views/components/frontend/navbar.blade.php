 <!-- Navigation (updated colors) -->
 <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-lg border-b border-gray-200">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="flex justify-between items-center h-16">
             <div class="flex items-center">
                 <h1 class="text-2xl font-bold text-emerald-600">TrendyShop</h1>
             </div>
             <div class="hidden md:flex space-x-10">
                 <a href="/" class="text-gray-700 hover:text-emerald-600 font-medium transition">Home</a>
                 <a href="{{ route('product') }}"
                     class="text-gray-700 hover:text-emerald-600 font-medium transition">Shop</a>

                 <a href="#" class="text-gray-700 hover:text-emerald-600 font-medium transition">Categories</a>
                 <a href="#" class="text-gray-700 hover:text-emerald-600 font-medium transition">Sale</a>
                 <a href="{{route('about')}}" class="text-gray-700 hover:text-emerald-600 font-medium transition">About</a>
             </div>

             <div class="relative group">
                 <!-- Button -->
                 <button
                     class="rounded-xl bg-white/10 backdrop-blur-md px-6 py-3 text-grey font-semibold shadow-lg
             ring-1 ring-white/20 hover:bg-white/20 transition-all duration-300">
                     Categories
                 </button>

                 <!-- Dropdown -->
                 <div
                     class="absolute left-1/2 z-10 mt-4 w-56 -translate-x-1/2
             invisible opacity-0 scale-95
             rounded-2xl bg-white/10 backdrop-blur-xl shadow-2xl
             ring-1 ring-white/20
             transition-all duration-300
             group-hover:visible group-hover:opacity-100 group-hover:scale-100">
                     <div class="p-2">
                         @foreach ($categories as $category)
                             <a href="{{ route('category.products', $category->slug) }}"
                                 class="block rounded-xl px-4 py-3 text-white font-medium
                  hover:bg-white/20 transition">
                                 {{ $category->name }}
                             </a>
                         @endforeach

                     </div>
                 </div>
             </div>


             <div class="flex items-center space-x-4">
                 <button class="p-2 hover:bg-gray-100 rounded-full transition">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                     </svg>
                 </button>

                 <a href="{{ route('cart') }}" class="p-2 hover:bg-gray-100 rounded-full transition relative">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 11-4 0 2 2 0 014 0z" />
                     </svg>
                     <span
                         class="absolute -top-1 -right-1 bg-emerald-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $cart->where('user_id', Auth::user()->id)->count() }}</span>
                 </a>
                 @guest
                     <div>
                         <a href="{{ route('register') }}"
                             class="text-gray-700 hover:text-emerald-600 font-medium transition">Sign Up</a>
                         <a href="{{ route('login') }}"
                             class="text-gray-700 hover:text-emerald-600 font-medium transition">Login</a>
                     </div>
                 @endguest

                 @auth
                 <div>
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <button class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">
                             Logout
                         </button>
                     </form>
                 </div>
                 @endauth


             </div>
         </div>
     </div>
 </nav>

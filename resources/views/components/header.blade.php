<header class="py-2 px-8 border-b-2 bg-bg-header border-main-1 shadow-lg shadow-main-4/35 flex items-center justify-between">
    <a href="">
        <img class="w-58" src="{{ asset('images/logo.svg') }}">
    </a>

    <div class="text-white">
        <div class="flex items-center space-x-4" hidden>
            <img class="w-9 h-9 rounded-full mr-2" src="{{ asset('images/default-profile.jpg') }}">
            <span class="text-base font-semibold">Leoncio Martinez</span>

            <button type="button" class="hover:text-main-2 cursor-pointer">
                <i class="fa-regular fa-bell text-2xl"></i>
            </button>
        </div>

        <label class="inline-flex items-center cursor-pointer">
            <input id="theme-toggle" type="checkbox" class="sr-only peer" checked>
            <i id="icon-moon" class="fa-solid fa-moon text-main-2 text-2xl mr-3"></i>
            <i id="icon-sun" class="fa-solid fa-sun text-main-2 text-2xl mr-3 hide-element"></i>
            <div class="relative w-11 h-6 bg-gray-500 rounded-full peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main-4"></div>
        </label>

        <!-- Mobile -->
        <button type="button" class="hover:text-main-2 cursor-pointer" hidden>
            <i class="fa-solid fa-bars text-2xl"></i>
        </button>
        
        @auth
        <a href="" class="hover:text-main-2">
            <i class="fa-solid fa-arrow-right-from-bracket text-2xl"></i>
        </a>
        @endauth

    </div>
    
</header>
<header class="py-2 px-8 border-b-2 bg-bg-header border-main-1 shadow-lg shadow-main-4/35 flex items-center justify-between">
    <a href="">
        <img class="logo-light w-52 sm:w-58" src="{{ asset('images/logo_light.svg') }}">
        <img class="logo-dark w-52 sm:w-58" src="{{ asset('images/logo_dark.svg') }}">
    </a>

        @auth
            <div class="flex items-center gap-4 ml-10 text-white">
                @php $user = Auth::user(); @endphp
                <img class="w-9 h-9 rounded-full hidden lg:block" src="{{ asset('images/default-profile.jpg') }}">
                <span class="text-base font-semibold hidden lg:block truncate">{{ $user->apellidos . ' ' .  $user->nombres}}</span>

                <button type="button" class="hover:text-main-2 cursor-pointer hidden lg:block">
                    <i class="fa-regular fa-bell text-2xl"></i>
                </button>

                <button onclick="openModal('logoutModal')" class="hover:text-main-2 hidden lg:block cursor-pointer">
                    <i class="fa-solid fa-arrow-right-from-bracket text-2xl"></i>
                </button>

                <button id="mobile-sidebar-toggle" type="button" class="cursor-pointer block lg:hidden">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        @endauth

        @if (request()->routeIs('login')||request()->routeIs('comun.usuarios.crear'))
            <label class="inline-flex items-center cursor-pointer">
                <input id="theme-toggle-header" type="checkbox" class="sr-only peer" checked>
                <i id="icon-moon-header" class="fa-solid fa-moon text-main-2 text-2xl mr-3"></i>
                <i id="icon-sun-header" class="fa-solid fa-sun text-main-2 text-2xl mr-3 hide-element"></i>
                <div class="relative w-11 h-6 bg-gray-500 rounded-full peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main-4"></div>
            </label>
        @endif
    
</header>
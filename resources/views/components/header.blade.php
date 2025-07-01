<header class="py-2 px-8 border-b-2 bg-bg-header border-main-1 shadow-lg shadow-main-4/35 flex items-center justify-between">
    <a href="">
        <img class="logo-light w-52 sm:w-58" src="{{ asset('images/logo_light.svg') }}">
        <img class="logo-dark w-52 sm:w-58" src="{{ asset('images/logo_dark.svg') }}">
    </a>

    @auth
        <div class="flex items-center gap-4 ml-10 text-white">

            <!-- Dropdown -->
            <div class="relative lg:inline-block hidden">
                <!-- Botón  -->
                <button id="dropdownHeaderDefaultButton" data-dropdown-toggle="dropdown-header" type="button" class="hover:text-main-2 cursor-pointer">
                    <i class="fa-solid fa-chevron-down show-element" id="chevronDownIconHeader"></i>
                    <i class="fa-solid fa-chevron-up hide-element" id="chevronUpIconHeader"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdown-header" class="z-10 hidden light:bg-slate-50 dark:bg-slate-600 light:shadow divide-y rounded-b-lg w-38 absolute top-full left-0 mt-3 py-2">
                    <ul class="text-sm font-semibold text-text-1" aria-labelledby="dropdownHeaderDefaultButton">
                        <li class="flex items-center rounded hover:text-main-2 dark:hover:bg-slate-700 light:hover:bg-slate-200 m-1">
                            <a href="#" class="block px-3 py-2">
                                <i class="fa-solid fa-circle-user mr-2"></i>
                                <span>Perfil</span>
                            </a>
                        </li>
                        <li class="flex items-center rounded hover:text-main-2 dark:hover:bg-slate-700 light:hover:bg-slate-200 m-1">
                            <a href="#" class="block px-3 py-2">
                                <i class="fa-solid fa-bell mr-2"></i>
                                <span>Notificaciones</span>
                            </a>
                        </li>
                        <li class="flex items-center rounded hover:text-main-2 dark:hover:bg-slate-700 light:hover:bg-slate-200 m-1">
                            <button onclick="openModal('logoutModal')" class="block px-3 py-2 cursor-pointer">
                                <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                <span>Cerrar sesión</span>
                            </button>
                        </li>
                    </ul>
                </div>

            </div>

            @php $user = Auth::user(); @endphp
            <img class="w-9 h-9 rounded-full hidden lg:block" src="{{ asset('images/default-profile.jpg') }}">
            <span class="text-base font-semibold hidden lg:block truncate">{{ $user->apellidos . ' ' .  $user->nombres}}</span>

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
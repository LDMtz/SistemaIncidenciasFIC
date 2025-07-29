<header class="py-2 px-8 border-b-2 bg-bg-header border-main-1 shadow-lg shadow-main-4/35 flex items-center justify-between">
    <a href="{{route('home')}}">
        <img class="logo-light w-52 sm:w-58" draggable="false" src="{{ asset('images/logo_light.svg') }}">
        <img class="logo-dark w-52 sm:w-58" draggable="false" src="{{ asset('images/logo_dark.svg') }}">
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
                        <li class="m-1">
                            <a href="{{route('usuarios.perfil')}}" class="flex items-center w-full rounded px-3 py-2 hover:text-main-2 dark:hover:bg-slate-700 light:hover:bg-slate-200">
                                <i class="fa-solid fa-circle-user mr-2"></i>
                                <span>Perfil</span>
                            </a>
                        </li>
                        </li>
                        <li class="m-1">
                            <a href="{{ route('notificaciones.index') }}" class="relative flex items-center w-full rounded px-3 py-2 hover:text-main-2 dark:hover:bg-slate-700 light:hover:bg-slate-200">
                                <i class="fa-solid fa-bell mr-2 relative">
                                    @if(count(auth()->user()->unreadNotifications))
                                       <span class="absolute -top-0.5 -right-[0.07rem] bg-red-600 rounded-full h-1.5 w-1.5"></span>
                                    @endif
                                </i>
                                <span>Notificaciones</span>
                            </a>
                        </li>
                        <li class="m-1">
                            <button onclick="openModal('logoutModal')" class="flex items-center w-full rounded px-3 py-2 hover:text-main-2 dark:hover:bg-slate-700 light:hover:bg-slate-200 cursor-pointer">
                                <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                <span>Cerrar sesión</span>
                            </button>
                        </li>
                    </ul>
                </div>

            </div>

            @php $usuario = Auth::user(); @endphp
            <div class="w-9 h-9 rounded-full overflow-hidden hidden lg:block">
                <img draggable="false"
                    class="w-full h-full object-cover"
                    src="{{ $usuario->foto ? asset('storage/' . $usuario->foto) : asset('images/default-profile.jpg') }}">
            </div>
            <span class="text-base font-semibold hidden lg:block truncate">{{ $usuario->apellidos . ' ' .  $usuario->nombres}}</span>

            @unless(Route::is('notificaciones.index', 'usuarios.perfil'))
                <button id="mobile-sidebar-toggle" type="button" class="cursor-pointer block lg:hidden">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            @endunless

        </div>
    @endauth
</header>
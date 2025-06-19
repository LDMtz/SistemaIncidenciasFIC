<!-- Sidebar -->
<aside id="sidebar" class="sidebar hidden sm:flex flex-col p-3 w-[13rem] bg-main-6 border border-main-2 border-l-0 rounded-r-lg transition-[width] duration-300 ease-in-out overflow-hidden">
    <!-- Header -->
    <header class="border-b dark:border-bg-logo light:border-bg-header pb-3 mb-3">
        <!-- Usamos un contenedor inline-block para logo y título -->
        <div class="whitespace-nowrap">
            <button id="toggle-expand" class="inline-block w-10 h-10 bg-bg-logo rounded-sm text-center align-middle cursor-pointer">
                <img src="favicon.ico" class="w-8 h-8 object-contain inline-block align-middle" />
            </button>
            <!-- Título: inline-block para poder hacer transition en ancho/opacidad -->
            <span class="sidebar-title inline-block align-middle ml-2 font-black leading-5 transition-[width,opacity,margin] duration-300 whitespace-nowrap">
                <span class="dark:text-white light:text-blue-fic block">SECRETARÍA</span>
                <span class="text-yellow-fic block">ACADÉMICA</span>
            </span>
            <!-- Botón colapsar -->
            <button id="toggle-collapse" class="sidebar-collapse-btn inline-block align-middle ml-2 text-text-1 text-2xl hover:text-main-2 hover:cursor-pointer transition-[width,opacity,margin] duration-300 whitespace-nowrap">
                <i class="fa-solid fa-circle-left"></i>
            </button>
        </div>
    </header>
    
    <!-- Menu -->
    <nav class="font-montserrat font-semibold text-lg text-main-3 flex flex-col gap-2 flex-1">
        <!-- Cada item es display block para ocupar fila -->
        <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
            <i class="fa-solid fa-house align-middle inline-block w-6 text-center"></i>
            <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Inicio</span>
        </a>
        <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
            <i class="fa-solid fa-user align-middle inline-block w-6 text-center"></i>
            <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Usuarios</span>
        </a>
        <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
            <i class="fa-solid fa-folder-open align-middle inline-block w-6 text-center"></i>
            <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Reportes</span>
        </a>
        <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
            <i class="fa-solid fa-file-lines align-middle inline-block w-6 text-center"></i>
            <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Informes</span>
        </a>
        <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
            <i class="fa-solid fa-layer-group align-middle inline-block w-6 text-center"></i>
            <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Áreas</span>
        </a>
            <!-- toggle theme -->
        <div class="p-2 relative border-t dark:border-bg-logo light:border-bg-header pt-3 mt-auto">
            <i class="icon-moon-sidebar fa-solid fa-moon align-middle inline-block w-6 text-center"></i>
            <i class="icon-sun-sidebar fa-solid fa-sun align-middle inline-block w-6 text-center"></i>
            <span id="theme-text" class="ml-4 sidebar-text">Tema</span>
            <label class="theme-toggle-item cursor-pointer absolute right-2 top-1/2 -translate-y-1/2 transition duration-300">
                <input type="checkbox" class="theme-toggle-sidebar sr-only peer" checked>
                <div class="relative w-11 h-6 bg-gray-500 rounded-full peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main-4"></div>
            </label>
        </div>
    </nav>
</aside>



<!-- Sidebar Mobile -->
<div  id="mobile-sidebar" class="fixed top-0 left-0 bottom-0 w-[16rem] bg-main-6 border border-main-2 border-l-0 rounded-r-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-40">
    <aside class="sidebar h-full flex flex-col w-[16rem] bg-main-6 border border-main-2 border-l-0 rounded-r-lg">
        <!-- Header -->
        <header class="font-montserrat flex items-center gap-2 bg-main-2/20 border-b border-main-2 p-2">
                <div class="w-8 h-8 bg-bg-logo rounded-md flex items-center justify-center">
                    <img src="favicon.ico" class="w-6 h-6" />
                </div>

                <label class="font-black text-sm">
                    <span class="dark:text-white light:text-blue-fic mr-0.5">SECRETARÍA</span>
                    <span class="text-yellow-fic">ACADÉMICA</span>
                </label>

                <!-- Botón cerrar -->
                <button class="ml-2 text-text-1 text-2xl" hidden>
                    <i class="fa-solid fa-circle-left"></i>
                </button>
        </header>

        <!-- Menu -->
        <nav class="font-montserrat font-semibold p-3 text-lg text-main-3 flex flex-col gap-2 flex-1">
            <!-- Datos del usuario -->
            <div class="flex items-center gap-3 px-1 pb-3 border-b dark:border-bg-logo light:border-bg-header">
                <img  class="w-9 h-9 rounded-full" src="{{ asset('images/default-profile.jpg') }}">
                <div class="leading-tight flex-1 min-w-0">
                    <p class="font-roboto font-bold text-base text-text-1 truncate">Leoncio Martinez Gonzalez</p>
                    <p class="font-montserrat font-normal text-xs text-text-1/80">Administrador</p>
                </div>
            </div>
            <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
                <i class="fa-solid fa-house align-middle inline-block w-6 text-center"></i>
                <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Inicio</span>
            </a>
            <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
                <i class="fa-solid fa-user align-middle inline-block w-6 text-center"></i>
                <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Usuarios</span>
            </a>
            <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
                <i class="fa-solid fa-folder-open align-middle inline-block w-6 text-center"></i>
                <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Reportes</span>
            </a>
            <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
                <i class="fa-solid fa-file-lines align-middle inline-block w-6 text-center"></i>
                <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Informes</span>
            </a>
            <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
                <i class="fa-solid fa-layer-group align-middle inline-block w-6 text-center"></i>
                <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Áreas</span>
            </a>
            <div class="border-t dark:border-bg-logo light:border-bg-header pt-3 mt-2">
                <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
                    <i class="fa-solid fa-bell align-middle inline-block w-6 text-center"></i>
                    <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Notificaciones</span>
                </a>
                <!-- toggle theme -->
                <div class="p-3 relative">
                    <i class="icon-moon-sidebar fa-solid fa-moon align-middle inline-block w-6 text-center"></i>
                    <i class="icon-sun-sidebar fa-solid fa-sun align-middle inline-block w-6 text-center"></i>
                    <span id="theme-text" class="ml-4 sidebar-text">Tema</span>
                    <label class="theme-toggle-item cursor-pointer absolute right-2 top-1/2 -translate-y-1/2 transition duration-300">
                        <input type="checkbox" class="theme-toggle-sidebar sr-only peer" checked>
                        <div class="relative w-11 h-6 bg-gray-500 rounded-full peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main-4"></div>
                    </label>
                </div>
                
            </div>

            <div class="border-t dark:border-bg-logo light:border-bg-header pt-3 mt-1">
                <a href="#" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap   ">
                    <i class="fa-solid fa-right-from-bracket align-middle inline-block w-6 text-center"></i>
                    <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Cerrar sesión</span>
                </a>
            </div>
            

        </nav>
    </aside>
</div>


@push('scripts')
    @vite('resources/js/sidebar-admin.js')
@endpush
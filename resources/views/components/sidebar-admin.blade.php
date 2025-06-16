<!-- Sidebar -->
<aside id="sidebar" class="p-3 w-[13rem] bg-main-6 border border-main-2 border-l-0 rounded-r-lg transition-[width] duration-300 ease-in-out overflow-hidden flex flex-col">
    <!-- Header -->
    <header class="border-b border-bg-logo pb-3 mb-3">
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
        <div class="p-2 relative border-t border-bg-logo pt-3 mt-auto">
            <i id="icon-moon-sidebar" class="fa-solid fa-moon align-middle inline-block w-6 text-center"></i>
            <i id="icon-sun-sidebar" class="fa-solid fa-sun align-middle inline-block w-6 text-center"></i>
            <span id="theme-text" class="ml-4 sidebar-text">Tema</span>
            <label class="theme-toggle-item cursor-pointer absolute right-2 top-1/2 -translate-y-1/2 transition duration-300">
                <input id="theme-toggle-sidebar" type="checkbox" class="sr-only peer" checked>
                <div class="relative w-11 h-6 bg-gray-500 rounded-full peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-main-4"></div>
            </label>
        </div>
    </nav>
</aside>

@push('scripts')
    @vite('resources/js/sidebar-admin.js')
@endpush
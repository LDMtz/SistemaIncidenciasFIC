@props(['screen'])

@if($screen == 'desktop')
    <header class="border-b dark:border-bg-logo light:border-bg-header pb-3 mb-3">
        <!-- Usamos un contenedor inline-block para logo y título -->
        <div class="whitespace-nowrap">
            <button id="toggle-expand" class="inline-block w-10 h-10 bg-bg-logo rounded-sm text-center align-middle cursor-pointer">
                <img src="{{ asset('favicon.ico') }}" class="w-8 h-8 object-contain inline-block align-middle" />
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
@elseif ($screen == 'mobile')
    <header class="font-montserrat flex items-center gap-2 bg-main-2/20 border-b border-main-2 p-2">
        <div class="w-8 h-8 bg-bg-logo rounded-md flex items-center justify-center">
            <img src="{{ asset('favicon.ico') }}" class="w-6 h-6" />
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
@endif
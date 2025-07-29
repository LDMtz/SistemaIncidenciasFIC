@props(['screen'])

@if ($screen == 'desktop')
    <a onclick="openModal('logoutModal')" class="cursor-pointer menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
        <i class="fa-solid fa-right-from-bracket align-middle inline-block w-6 text-center"></i>
        <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">Cerrar sesión</span>
    </a>
@else
    <button onclick="openModal('logoutModal')" class="block p-2 cursor pointer">
        <i class="fa-solid fa-right-from-bracket align-middle inline-block w-6 text-center"></i>
        <span class="inline-block align-middle ml-4 ">Cerrar sesión</span>
    </button>
@endif



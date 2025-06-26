@props(['icon','route','screen'])

@if($screen == 'desktop')
    <a href="{{ route($route)}}" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
        <i class="{{ $icon}} align-middle inline-block w-6 text-center"></i>
        <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">
            {{ $slot }}
        </span>
    </a>
@else
    <a href="{{ route($route)}}" class="menu-item block p-2">
        <i class="{{ $icon}} align-middle inline-block w-6 text-center"></i>
        <span class="sidebar-text inline-block align-middle ml-4">
            {{ $slot }}
        </span>
    </a>
@endif

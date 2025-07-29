@props(['icon','route','screen'])

@php
    $isNotifications = $route === 'notificaciones.index';
@endphp

@switch($screen)
    @case('desktop')
        @if($isNotifications)
            <a href="{{ route($route) }}" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
                <i class="{{ $icon }} align-middle inline-block w-6 text-center relative">
                    @if(count(auth()->user()->unreadNotifications))
                        <span class="absolute -top-0.5 -right-[-0.20rem] bg-red-600 rounded-full h-[0.44rem] w-[0.44rem]"></span>
                    @endif
                </i>
                <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">
                    {{ $slot }}
                </span>
            </a>
            @break
        @endif

        <a href="{{ route($route)}}" class="menu-item block p-2 rounded-md border-r-6 border-transparent hover:border-main-2 hover:text-main-2 hover:bg-main-7 transition-colors whitespace-nowrap">
            <i class="{{ $icon}} align-middle inline-block w-6 text-center"></i>
            <span class="sidebar-text inline-block align-middle ml-4 transition-[width,opacity,margin] duration-300 whitespace-nowrap">
                {{ $slot }}
            </span>
        </a>
        @break
    @case('mobile')
        @if($isNotifications)
            <a href="{{ route($route) }}" class="block p-2 relative">
                <i class="fa-solid fa-bell align-middle inline-block w-6 text-center relative">
                    @if(count(auth()->user()->unreadNotifications))
                        <span class="absolute -top-0.5 -right-[-0.28rem] bg-red-600 rounded-full h-[0.44rem] w-[0.44rem]"></span>
                    @endif
                </i>
                <span class="inline-block align-middle ml-4">{{ $slot }}</span>
            </a>
            @break
        @endif
        
        <a href="{{ route($route)}}" class="block p-2">
            <i class="{{ $icon}} align-middle inline-block w-6 text-center"></i>
            <span class="inline-block align-middle ml-4">
                {{ $slot }}
            </span>
        </a>
        @break
    @default
        
@endswitch
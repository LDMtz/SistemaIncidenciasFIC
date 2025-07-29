@props(['rol'])

@switch($rol)
    @case("Administrador")
        <x-sidebar.sidebar-admin/>
        @break
    @case("Encargado")
        <x-sidebar.sidebar-encargado/>
        @break
    @case("Comun")
        <x-sidebar.sidebar-comun/>
        @break
    @default
        
@endswitch
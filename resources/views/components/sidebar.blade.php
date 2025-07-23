@props(['rol'])

@switch($rol)
    @case("Administrador")
        <x-sidebar.sidebar-admin/>
        @break
    @case("Encargado")
        <x-sidebar.sidebar-encargado/>
        @break
    @case("Comun")
        
        @break
    @default
        
@endswitch
<!-- Sidebar desktop -->
<aside id="sidebar" class="sidebar hidden lg:flex flex-col p-3 w-[14rem] bg-main-6 border border-main-2 border-l-0 rounded-r-lg transition-[width] duration-300 ease-in-out overflow-hidden flex-shrink-0 ">
    
    <x-sidebar.header screen="desktop"/>

    <nav class="font-montserrat font-semibold text-lg text-main-3 flex flex-col gap-2 flex-1">
        <x-sidebar.item route="home" icon="fa-solid fa-house" screen="desktop">Inicio</x-sidebar.item>
        <x-sidebar.item route="usuarios.perfil" icon="fa-solid fa-circle-user" screen="desktop">Perfil</x-sidebar.item>
        <x-sidebar.item route="notificaciones.index" icon="fa-solid fa-bell" screen="desktop">Notificaciones</x-sidebar.item>
        
        <x-sidebar.item route="home" icon="fa-solid fa-folder-open" screen="desktop">Reportes</x-sidebar.item>

        <div class="pt-3 relative border-t dark:border-bg-logo light:border-bg-header mt-auto">
            <x-sidebar.btn-logout-mobile screen="desktop"/>
        </div>


    </nav>
</aside>

<!-- Sidebar Mobile -->
<div  id="mobile-sidebar" class="lg:hidden fixed top-0 left-0 bottom-0 w-[16rem] bg-main-6 border border-main-2 border-l-0 rounded-r-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-40">
    <aside class="sidebar h-full flex flex-col w-[16rem] bg-main-6 border border-main-2 border-l-0 rounded-r-lg">

        <x-sidebar.header screen="mobile"/>

        <nav class="font-montserrat font-semibold p-3 text-lg text-main-3 flex flex-col gap-2 flex-1">

            <x-sidebar.user-data-mobile/>

            <div class="border-b dark:border-bg-logo light:border-bg-header pb-3 mb-2">
                <x-sidebar.item route="usuarios.perfil" icon="fa-solid fa-circle-user" screen="mobile">Perfil</x-sidebar.item>
                <x-sidebar.item route="notificaciones.index" icon="fa-solid fa-bell" screen="mobile">Notificaciones</x-sidebar.item>
            </div>
            
            <x-sidebar.item route="home" icon="fa-solid fa-house" screen="mobile">Inicio</x-sidebar.item>
            <x-sidebar.item route="home" icon="fa-solid fa-folder-open" screen="mobile">Reportes</x-sidebar.item>

            <div class="border-t dark:border-bg-logo light:border-bg-header pt-3 mt-1">
                <x-sidebar.btn-logout-mobile screen="mobile"/>
            </div>

        </nav>
    </aside>
</div>

@push('scripts')
    @vite('resources/js/sidebar-comun.js')
@endpush

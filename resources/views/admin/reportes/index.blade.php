<x-app-layout>
    <div class="flex w-full">
        <x-sidebar rol="Administrador"/>

        <!-- Contenedor principal -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">
            <h1 class="font-roboto font-black sm:text-2xl text-xl mb-5">Reportes</h1>

            <div class="flex items-center justify-between mb-2">
                <h2 class="font-montserrat text-main-2 font-semibold sm:text-lg text-base">
                    <i class="fa-solid fa-users mr-1"></i>
                    Lista de reportes
                </h2>
                <div class="flex items-center md:gap-2 gap-1">
                    <!-- BORRAR ESTO -->
                    @php $sortOrder = 'asc'; @endphp

                    @php $newSortOrder = $sortOrder === 'asc' ? 'desc' : 'asc';@endphp
                    <a href="{{ route('admin.usuarios.index', ['sort' => $newSortOrder]) }}"
                    class="inline-flex items-center px-2 py-1 text-xs font-montserrat border rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                        <i class="fa-solid fa-calendar-days mr-1"></i>
                        <span class="hidden md:block">Ordenar por fecha</span>
                        @if ($sortOrder === 'asc')
                            <i class="fa-solid fa-angle-up ml-1"></i>
                        @else
                            <i class="fa-solid fa-angle-down ml-1"></i>
                        @endif
                    </a>

                    <!-- BORRAR ESTO -->
                    <button onclick="openModal('search-modal')" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                        <span class="text-sm hidden md:block">Buscar</span>
                    </button>

                    <!-- BORRAR ESTO -->
                    @if(request()->has('campo') || request()->has('valor') || request()->has('sort'))
                        <a href="{{ route('admin.usuarios.index') }}" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-gray-700 text-white rounded-lg hover:bg-gray-800">
                            <i class="fa-solid fa-filter-circle-xmark text-sm"></i>
                            <span class="text-sm hidden md:block">Quitar filtros</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Tabla -->
            <x-table>
                <x-slot name="headTable">
                    <x-th-table>Folio</x-th-table>
                    <x-th-table>Área</x-th-table>
                    <x-th-table>Titulo</x-th-table>
                    <x-th-table>Fecha</x-th-table>
                    <x-th-table>Hora</x-th-table>
                    <x-th-table>Estado</x-th-table>
                    <x-th-table>Acciones</x-th-table>
                </x-slot>
                <x-slot name="bodyTable">
                    <!-- BORRAR ESTO -->
                    @php
                        $usuarios =  array();
                    @endphp
                    @foreach($usuarios as $usuario)
                    <tr class="text-sm border-b-1 whitespace-nowrap">
                        <!-- AGREGAR LOS CAMPOS ESTO -->
                    </tr>
                    @endforeach
                </x-slot>
                <!-- AGREGAR LA PAGINACION -->
            </x-table>

        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="flex w-full">
        <x-sidebar rol="Administrador"/>

        <!-- Contenedor principal -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">
            <h1 class="font-roboto font-black sm:text-2xl text-xl mb-5">Reportes</h1>

            <div class="flex items-center justify-between mb-2">
                <h2 class="font-montserrat text-main-2 font-semibold sm:text-lg text-base">
                    <i class="fa-solid fa-folder-closed mr-1"></i>
                    Lista de reportes
                </h2>
                <div class="flex items-center md:gap-2 gap-1">
                    @php $newSortOrder = $sortOrder === 'asc' ? 'desc' : 'asc';@endphp
                    <a href="{{ route('admin.reportes.index', ['sort' => $newSortOrder]) }}"
                    class="inline-flex items-center px-2 py-1 text-xs font-montserrat border rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                        <i class="fa-solid fa-calendar-days mr-1"></i>
                        <span class="hidden md:block">Ordenar por fecha</span>
                        @if ($sortOrder === 'asc')
                            <i class="fa-solid fa-angle-up ml-1"></i>
                        @else
                            <i class="fa-solid fa-angle-down ml-1"></i>
                        @endif
                    </a>

                    <button onclick="openModal('search-modal')" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                        <span class="text-sm hidden md:block">Buscar</span>
                    </button>

                    @if(request()->has('campo') || request()->has('valor') || request()->has('sort'))
                        <a href="{{ route('admin.reportes.index') }}" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-gray-700 text-white rounded-lg hover:bg-gray-800">
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
                    <x-th-table>Titulo</x-th-table>
                    <x-th-table>Área</x-th-table>
                    <x-th-table>Severidad</x-th-table>
                    <x-th-table>Estado</x-th-table>
                    <x-th-table>Fecha</x-th-table>
                    <x-th-table>Acciones</x-th-table>
                </x-slot>
                <x-slot name="bodyTable">
                    @foreach($reportes as $reporte)
                    <tr class="text-sm border-b-1 whitespace-nowrap">
                        <x-td-table type="normal" :content="$reporte['folio']" />
                        <x-td-table type="normal" :content="$reporte['titulo']" extraClasses="max-w-xs truncate" />
                        <x-td-table type="normal" :content="$reporte->area?->nombre" />
                        <x-td-table type="severidad" :content="$reporte->severidad?->nombre" />
                        <x-td-table type="normal" :content="$reporte->estado?->nombre" />
                        <x-td-table type="normal" :content="$reporte['created_at'] ? $reporte['created_at']->format('Y-m-d') : 'Sin fecha'" />
                        <td class="text-center">
                            <a href="{{ route("admin.reportes.revisar", $reporte->id)}}" class="text-violet-500 hover:text-violet-400 transition-colors duration-100 cursor-pointer">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </x-slot>
                <x-slot name="footTable"> 
                    <x-foot-table :paginator="$reportes" :colspan="7" />
                </x-slot>
            </x-table>

        </div>
    </div>
</x-app-layout>

<!-- Modal Buscar -->
<div id="search-modal" class="hidden">
    <div class="flex fixed top-0 left-0 w-full h-full bg-black/50 z-50 justify-center items-center ">
        <div class="dark:bg-slate-800 light:bg-slate-50 rounded-lg shadow-lg w-full max-w-md overflow-hidden border dark:border-slate-700 light:border-slate-300 m-10">
            <!-- Modal header -->
            <div class="flex justify-between items-center border-b dark:border-slate-700 light:border-slate-300 px-5 py-3 dark:bg-slate-700/60 light:bg-slate-100">
                <h3 class="font-roboto text-sm font-semibold text-text-1">BUSCAR</h3>
                <button onclick="closeModal('search-modal')"  class="text-slate-400 hover:text-red-500 cursor-pointer">
                    <i class="fa-solid fa-x text-xs"></i>
                </button>
            </div>
    
            <!-- Modal body -->
            <form method="GET" action="{{ route('admin.reportes.index') }}">
                <div class="p-5">
                    <!-- Contenedor del Select -->
                    <div class="mb-4">
                        <label for="campo" class="text-sm font-medium text-main-3">Filtrar por:</label>
                        <select name="campo" class="w-full mt-1 border bg-transparent dark:border-slate-500 light:border-gray-800 dark:text-slate-300 light:text-slate-700 rounded-lg p-1 outline-none">
                            <option class="dark:bg-slate-600 text-xs" value="folio" {{ request('campo') == 'folio' ? 'selected' : '' }}>Folio</option>
                            <option class="dark:bg-slate-600 text-xs" value="area" {{ request('campo') == 'area' ? 'selected' : '' }}>Área</option>
                            <option class="dark:bg-slate-600 text-xs" value="severidad" {{ request('campo') == 'severidad' ? 'selected' : '' }}>Severidad</option>
                            <option class="dark:bg-slate-600 text-xs" value="estado" {{ request('campo') == 'estado' ? 'selected' : '' }}>Estado</option>
                            <option class="dark:bg-slate-600 text-xs" value="fecha" {{ request('campo') == 'fecha' ? 'selected' : '' }}>Fecha</option>
                        </select>
                    </div>
            
                    <!-- Contenedor del Input -->
                    <div class="mb-4">
                        <label for="valor" class="text-sm font-medium text-main-3">Ingresa el dato:</label>
                        <input name="valor" type="text" class="w-full mt-1 border bg-transparent dark:border-slate-500 light:border-gray-800 dark:text-slate-300 light:text-slate-700 rounded-lg p-1 outline-none" placeholder="Escribe el valor...">
                    </div>
            
                    <!-- Contenedor del Botón -->
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700">
                            <i class="fa-solid fa-magnifying-glass text-sm"></i>
                            <span class="ml-1">Buscar</span>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<x-app-layout>
    <div class="flex w-full">
        <x-sidebar-admin />

        <!-- Contenedor principal -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">
            <h1 class="font-roboto font-black sm:text-2xl text-xl mb-5">Áreas</h1>

            <div class="grid grid-cols-1 lg:grid-cols-7 gap-10">
                <!-- Tabla de áreas -->
                <div class="lg:col-span-4 space-y-6 ">
                        <h2 class="font-montserrat text-main-2 font-semibold mb-1 sm:text-lg text-base"><i class="fa-solid fa-location-dot mr-1"></i> Todas las áreas</h2>

                        <div class="overflow-y-auto max-h-120 rounded-lg light:shadow-md light:shadow-slate-950/25">
                            <x-table :rounded="false" :shadow="false">
                                <x-slot name="headTable">
                                    <x-th-table>Área</x-th-table>
                                    <x-th-table extra-classes="hidden sm:table-cell" :centered="true">Encargados</x-th-table>
                                    <x-th-table extra-classes="hidden sm:table-cell">Estado</x-th-table>
                                    <x-th-table>Acciones</x-th-table>
                                </x-slot>
                                <x-slot name="bodyTable">
                                    @foreach($areas as $area)
                                    <tr class="text-sm border-b-1 last:border-b-0 whitespace-nowrap">
                                        <x-td-table type="normal" :content="$area['nombre']" />
                                        <x-td-table extra-classes="hidden sm:table-cell" type="normal" :centered="true" :content="$area['encargados_count']" />
                                        <x-td-table extra-classes="hidden sm:table-cell" type="state" :content="$area['estado']" />
                                        <x-td-table type="actions-modal" :content="['section' => 'admin.areas', 'id' => $area['id']]" />
                                    </tr>
                                    @endforeach
                                </x-slot>
                            </x-table>
                        </div>
                        
                        
                </div>

                <div class="lg:col-span-3"><!-- grid grid-rows-1 md:grid-rows-2 gap-2-->
                    <!-- Nueva área -->
                    <div class="mb-5">
                        <h2 class="font-montserrat text-main-2 font-semibold mb-1 sm:text-lg text-base"><i class="fa-solid fa-square-plus mr-1"></i> Nueva área</h2>
                        <form action="{{ route('admin.areas.guardar') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="light:bg-slate-50 light:border-white light:shadow-md dark:bg-slate-800 border-1 dark:border-slate-700 rounded-lg p-4">
                                <label class="block text-sm font-semibold text-main-3 mb-1" >Nombre del área:</label>
                                <input name="nombre_area" type="text" placeholder="Nueva área"  autocomplete="off"
                                        class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                                />
                                @error('nombre_area')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                                <div class="flex justify-between text-sm mt-4 font-semibold">
                                    <span class="text-main-3">Encargado(s):</span>
                                    <span class="text-text-1"><span id="encargado-count">0</span> encargado(s)</span>
                                </div>

                                <div class="dark:bg-slate-700 light:bg-slate-200 text-text-1 rounded-md overflow-y-auto max-h-25">
                                    <table class="min-w-full text-sm">
                                    <thead class="border-b border-white/20">
                                        <tr class="text-left font-semibold">
                                            <th class="px-2 py-1">Sel.</th>
                                            <th class="py-1">Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($encargados_disp as $encargado)
                                            <tr class="border-t border-text-1/10 hover:bg-text-1/5">
                                                <td class="px-2">
                                                    <input type="checkbox" name="encargados[]" value="{{ $encargado['id'] }}" class="accent-blue-500" />
                                                </td>
                                                <td >{{$encargado['apellidos'] . ' '. $encargado['nombres']}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>

                                <div class="flex justify-center mt-4">
                                    <button type="submit" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 rounded-lg bg-green-600 hover:bg-green-500 text-white cursor-pointer">
                                        <i class="fa-solid fa-plus text-sm"></i>
                                        <span class="text-sm">Crear</span>
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>

                    <!-- Encargados de área -->
                    <div class="">
                        <h2 class="font-montserrat text-main-2 font-semibold mb-1 sm:text-lg text-base"><i class="fa-solid fa-users-rectangle mr-1"></i> Encargados de área</h2>
                        <div class="overflow-y-auto max-h-40 rounded-lg light:shadow-md light:shadow-slate-950/25">
                            <x-table :rounded="false" :shadow="false">
                                <x-slot name="headTable">
                                    <x-th-table>Nombres</x-th-table>
                                    <x-th-table :centered="true" extra-classes="hidden sm:table-cell">Áreas</x-th-table>
                                    <x-th-table :centered="true">Ajustar</x-th-table>
                                </x-slot>
                                <x-slot name="bodyTable">
                                    @foreach($encargados_con_areas as $encargado)
                                    <tr class="text-sm border-b-1 last:border-b-0 whitespace-nowrap">
                                        <x-td-table type="special_user" 
                                            :content="['name' => $encargado['apellidos'].' '.$encargado['nombres'], 
                                                        'email' => $encargado['email'], 
                                                        'foto' => $encargado['foto'] ]" />
                                        <x-td-table type="normal" :content="$encargado['areas_count']" extra-classes="hidden sm:table-cell" :centered="true" />
                                        <td class="text-center">
                                            <button onclick="" class="text-orange-500 hover:text-orange-400 transition-colors duration-100 cursor-pointer">
                                                <i class="fa-solid fa-sliders"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </x-slot>
                                <x-slot name="footTable">
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<!-- Success modal -->
<x-success-modal/>

<!-- Error modal -->
<x-error-modal/>

<!-- Modal show-area -->
<div id="show-area-modal" class="hidden">
    <div class="flex fixed top-0 left-0 w-full h-full bg-black/50 z-50 justify-center items-center ">
        <div class="dark:bg-slate-800 light:bg-slate-50 rounded-lg shadow-lg w-full max-w-md overflow-hidden border-2 dark:border-slate-700 light:border-slate-300 m-10">

            <!-- Spinner de carga -->
            <div id="area-loading-show" class="hidden p-3">
                <div class="flex flex-col items-center p-3 space-y-2">
                    <p class="text-text-1 font-roboto font-medium">Cargando datos del área</p>
                    <svg class="animate-spin h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                    </svg>
                </div>
            </div>

            <!-- Contenido -->
            <div id="area-detalles-show" class="">
                <div class="relative light:bg-slate-300/60 dark:bg-slate-700/60 h-8 md:h-10 px-5 border-b-2 dark:border-slate-700 light:border-slate-300">
                    <h1 class="absolute top-1 md:top-2 text-text-1 font-montserrat font-bold">Mostrar área</h1>
                    <button onclick="closeModal('show-area-modal')" class="absolute top-1 right-4 text-slate-400 hover:text-red-500 cursor-pointer">
                        <i class="fa-solid fa-x text-xs"></i>
                    </button>
                    <label id="estadoActivoShow" class="hidden absolute top-15 right-7 items-center text-[0.65rem] md:text-xs font-black font-roboto leading-none">
                        <span class="self-center w-[0.40rem] h-[0.40rem] md:w-2 md:h-2 mr-2 rounded-full dark:bg-green-400 light:bg-green-600"></span>
                        <span class="dark:text-green-400 light:text-green-600 leading-none">ACTIVA</span>
                    </label>
                    <label id="estadoInactivoShow" class="hidden absolute top-15 right-7 items-center text-[0.65rem] md:text-xs font-black font-roboto leading-none">
                        <span class="self-center w-[0.40rem] h-[0.40rem] md:w-2 md:h-2 mr-2 rounded-full dark:bg-red-400 light:bg-red-600"></span>
                        <span class="dark:text-red-400 light:text-red-600 leading-none">INACTIVA</span>
                    </label>
                </div>

                <!-- Modal body -->
                <div class="p-6 mt-6 max-w-2xl w-full mx-auto">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 text-[0.70rem] md:text-sm text-text-1">
                        <!-- Nombre -->
                        <div class="md:col-span-2">
                            <label class="text-main-3 block">Nombre del área</label>
                            <input id="nombreAreaShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>

                        <!-- Núm. de encargados -->
                        <div>
                            <label class="text-main-3 block ">Número de encargados</label>
                            <input id="numEncargadosShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>

                        <!-- Fecha de registro -->
                        <div>
                            <label class="text-main-3 block ">Fecha de registro</label>
                            <input id="fechaCreacionShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>

                        <!-- Lista de encargados -->
                        <div id="contenedorTablaShow" class="md:col-span-2">
                            <label class="text-main-3 block ">Encargados de esta área</label>
                            <x-table extra-classes="border-1 dark:border-slate-700 light:border-slate-100 overflow-y-auto max-h-40">
                                <x-slot name="headTable"><x-th-table>Encargado(s)</x-th-table></x-slot>
                                <x-slot name="bodyTable"></x-slot>
                                <x-slot name="footTable"></x-slot>
                            </x-table>
                        </div>
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal edit-area -->
<div id="edit-area-modal" class="hidden">
    <div class="flex fixed top-0 left-0 w-full h-full bg-black/50 z-50 justify-center items-center ">
        <div class="dark:bg-slate-800 light:bg-slate-50 rounded-lg shadow-lg w-full max-w-md overflow-hidden border-2 dark:border-slate-700 light:border-slate-300 m-10">

            <!-- Spinner de carga -->
            <div id="area-loading-edit" class="hidden p-3">
                <div class="flex flex-col items-center p-3 space-y-2">
                    <p class="text-text-1 font-roboto font-medium">Cargando datos del área</p>
                    <svg class="animate-spin h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                    </svg>
                </div>
            </div>

            <!-- Contenido -->
            <div id="area-detalles-edit" class="">
                <div class="relative light:bg-slate-300/60 dark:bg-slate-700/60 h-8 md:h-10 px-5 border-b-2 dark:border-slate-700 light:border-slate-300">
                    <h1 class="absolute top-1 md:top-2 text-text-1 font-montserrat font-bold">Modificar área</h1>
                    <button onclick="closeModal('edit-area-modal')" class="absolute top-1 right-4 text-slate-400 hover:text-red-500 cursor-pointer">
                        <i class="fa-solid fa-x text-xs"></i>
                    </button>
                    <label id="estadoActivoEdit" class="hidden absolute top-15 right-7 items-center text-[0.65rem] md:text-xs font-black font-roboto leading-none">
                        <span class="self-center w-[0.40rem] h-[0.40rem] md:w-2 md:h-2 mr-2 rounded-full dark:bg-green-400 light:bg-green-600"></span>
                        <span class="dark:text-green-400 light:text-green-600 leading-none">ACTIVA</span>
                    </label>
                    <label id="estadoInactivoEdit" class="hidden absolute top-15 right-7 items-center text-[0.65rem] md:text-xs font-black font-roboto leading-none">
                        <span class="self-center w-[0.40rem] h-[0.40rem] md:w-2 md:h-2 mr-2 rounded-full dark:bg-red-400 light:bg-red-600"></span>
                        <span class="dark:text-red-400 light:text-red-600 leading-none">INACTIVA</span>
                    </label>
                </div>

                <!-- Modal body -->
                <div class="p-6 mt-6 max-w-2xl w-full mx-auto">

                    <!-- Nota: El action se va asignar desde el script js -->
                    <form id="formEditArea" action="" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 text-[0.70rem] md:text-sm text-text-1/60">
                            <!-- Nombre -->
                            <div class="md:col-span-2">
                                <label class="text-main-3 block">Nombre del área</label>
                                <input name="nombre_area" id="nombreAreaEdit" type="text" value="" class="text-text-1 bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" />
                            </div> 

                            <!-- Núm. de encargados -->
                            <div>
                                <label class="text-main-3 block ">Número de encargados</label>
                                <input id="numEncargadosEdit" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full" disabled />
                            </div>

                             <!-- Estado -->
                            <div class="text-text-1">
                                <label class="text-main-3 block">Estado</label>
                                <select id="estadoSelectEdit" name="estado" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3">
                                    <option class="dark:bg-slate-600 text-xs" value="1">Activo</option>
                                    <option class="dark:bg-slate-600 text-xs" value="0">Inactivo</option>
                                </select>
                            </div>

                            <!-- Lista de encargados -->
                            <div id="contenedorTablaEdit" class="md:col-span-2">
                                <label class="text-main-3 block ">Asignar/Quitar encargado(s)</label>
                                <x-table extra-classes="border-1 dark:border-slate-700 light:border-slate-100 overflow-y-auto max-h-40">
                                    <x-slot name="headTable">
                                        <x-th-table>Sel.</x-th-table>
                                        <x-th-table>Encargado(s)</x-th-table>
                                    </x-slot>
                                    <x-slot name="bodyTable"></x-slot>
                                    <x-slot name="footTable"></x-slot>
                                </x-table>
                            </div>


                            <!-- Botón Guardar -->
                            <div class="md:col-span-2 flex justify-center mt-2">
                                <button type="submit" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-500 hover:bg-blue-400 text-white rounded-lg cursor-pointer">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                    <span class="text-sm">Editar</span>
                                </button>
                            </div>
                            
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>


<script>
//Para el contador de encargados seleccionados en la seccion "Nueva área"
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="encargados[]"]');
    const countSpan = document.getElementById('encargado-count');

    function updateCount() {
        const selected = Array.from(checkboxes).filter(cb => cb.checked).length;
        countSpan.textContent = selected;
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateCount);
    });

    // Por si alguno ya viene marcado al renderizar la página
    updateCount();
});

// --------------------------------------------------------------------------
//Ver elemento para generalizar, pero elemento es "Área" en este caso
function verElemento(id) {
    openModal('show-area-modal');

    const areaLoading = document.getElementById('area-loading-show');
    const areaDetalles = document.getElementById('area-detalles-show');

    // Mostrar el spinner, ocultar detalles
    areaLoading.classList.remove('hidden');
    areaDetalles.classList.add('hidden');

    // Solicitud al backend
    fetch(`/admin/areas/${id}`)
    .then(res => res.json())
    .then(data => {
        //LLenar datos
        document.getElementById('nombreAreaShow').value  = data.nombre;
        document.getElementById('numEncargadosShow').value  = data.encargados_count;

        if(data.estado){
            document.getElementById('estadoActivoShow').style.display = 'inline-flex';
            document.getElementById('estadoInactivoShow').style.display = 'none';
        } else{
            document.getElementById('estadoActivoShow').style.display = 'none';
            document.getElementById('estadoInactivoShow').style.display = 'inline-flex';
        }

        if (data.created_at) {
            const fecha = data.created_at.split('T')[0].trim(); // 1. Separa en ["2025-06-20", "08:40:39.000000Z"]
            document.getElementById('fechaCreacionShow').value = fecha;
        } else {
            document.getElementById('fechaCreacionShow').value = 'Sin fecha';
        }

        //Cargamos los encargados
        const tablaContenedor = document.getElementById('contenedorTablaShow');
        const tbody = tablaContenedor.querySelector('tbody');
        tbody.innerHTML = ''; //Limpiar contenido anterior
        data.encargados.forEach(encargado => {
            const tr = document.createElement('tr');
            tr.className = 'text-sm border-b-1 last:border-b-0 whitespace-nowrap';

            const td = document.createElement('td');
            td.className = 'px-3';
            td.textContent = `${encargado.apellidos} ${encargado.nombres}`;

            tr.appendChild(td);
            tbody.appendChild(tr);
        });

        // Ocultar spinner, mostrar contenido
        areaLoading.classList.add('hidden');
        areaDetalles.classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error al cargar área:', error);
        areaLoading.innerHTML = '<p class="text-red-500">Error al cargar datos</p>';
    });
}

/*
                        BORRAR ESTO
*/
const rutaActualizarArea = "{{ url('admin/areas/actualizar') }}";

function editarElemento(id) {
    openModal('edit-area-modal');

    const areaLoading = document.getElementById('area-loading-edit');
    const areaDetalles = document.getElementById('area-detalles-edit');

    // Mostrar el spinner, ocultar detalles
    areaLoading.classList.remove('hidden');
    areaDetalles.classList.add('hidden');

    // Solicitud al backend
    fetch(`/admin/areas/modificar/${id}`)
    .then(res => res.json())
    .then(data => {

        //Asignamos el action al form
        const form = document.getElementById('formEditArea');
        form.setAttribute('action', `${rutaActualizarArea}/${data.id}`);

        //LLenar datos
        document.getElementById('nombreAreaEdit').value  = data.nombre;
        document.getElementById('numEncargadosEdit').value  = data.encargados_count;
        document.getElementById('estadoSelectEdit').value = data.estado ? '1' : '0';

        //Llenar inputs

        if(data.estado){
            document.getElementById('estadoActivoEdit').style.display = 'inline-flex';
            document.getElementById('estadoInactivoEdit').style.display = 'none';
        } else{
            document.getElementById('estadoActivoEdit').style.display = 'none';
            document.getElementById('estadoInactivoEdit').style.display = 'inline-flex';
        }

        //Cargamos la tabla con los encargados y los seleccionados
        const tablaContenedor = document.getElementById('contenedorTablaEdit');
        const tbody = tablaContenedor.querySelector('tbody');
        tbody.innerHTML = ''; //Limpiar contenido anterior

        // Crear un Set con los IDs de los encargados ya asignados
        const encargadosSelIds = new Set(data.encargados_sel.map(e => e.id));

        // Agregar las filas
        data.encargados_disp.forEach(encargado => {
            const tr = document.createElement('tr');
            tr.className = 'text-sm border-b-1 last:border-b-0 whitespace-nowrap';

            // Columna del checkbox
            const tdCheckbox = document.createElement('td');
            tdCheckbox.className = 'px-3';

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'encargados[]';
            checkbox.value = encargado.id;
            checkbox.checked = encargadosSelIds.has(encargado.id);

            tdCheckbox.appendChild(checkbox);
            tr.appendChild(tdCheckbox);

            // Columna del nombre
            const tdNombre = document.createElement('td');
            tdNombre.className = 'px-3';
            tdNombre.textContent = `${encargado.apellidos} ${encargado.nombres}`;
            tr.appendChild(tdNombre);

            tbody.appendChild(tr);
        });

        // Función para actualizar el número de encargados seleccionados
        function actualizarContador() {
            const seleccionados = tablaContenedor.querySelectorAll('input[name="encargados[]"]:checked');
            document.getElementById('numEncargadosEdit').value = seleccionados.length;
        }

        // Escuchar cambios en los checkboxes
        tablaContenedor.addEventListener('change', (event) => {
            if (event.target && event.target.matches('input[name="encargados[]"]')) {
                actualizarContador();
            }
        });

        // Ocultar spinner, mostrar contenido
        areaLoading.classList.add('hidden');
        areaDetalles.classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error al cargar el área:', error);
        areaLoading.innerHTML = '<p class="text-red-500">Error al cargar datos</p>';
    });
}


// Registrar funciones globales
window.verElemento = verElemento;
window.editarElemento = editarElemento;
</script>
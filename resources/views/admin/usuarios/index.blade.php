<x-app-layout>
    <div class="flex w-full">
        <x-sidebar rol="Administrador"/>

        <!-- container -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">
            <h1 class="font-roboto font-black sm:text-2xl text-xl mb-3 ">Usuarios</h1>

            <!-- Subtitulo -->
            <h2 class="font-montserrat text-main-2 font-semibold mb-1 sm:text-lg text-base"><i class="fa-solid fa-user-plus mr-1"></i> Crear usuario</h2>

            <div class="rounded-lg px-5 py-3 w-full border-1 font-roboto light:shadow-md light:shadow-slate-950/25 mb-6
                    light:bg-slate-50 light:border-white
                    dark:bg-slate-800 light: border-slate-700">

                <form action="{{ route('admin.usuarios.guardar') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-x-15 gap-y-3 text-sm">
                    @csrf
                    @method('POST')

                    <!-- Campos fila 1-->
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" value="{{ old('apellidos') }}" placeholder="Apellidos" required autocomplete="off"
                            class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        />
                        @error('apellidos')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="nombres">Nombres:</label>
                        <input type="text" name="nombres" value="{{ old('nombres') }}" placeholder="Nombres" required autocomplete="off"
                            class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        />
                        @error('nombres')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="clave">Contraseña:</label>
                        <input type="password" name="clave" placeholder="" required autocomplete="off"
                            class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        />
                        @error('clave')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="clave_confirmation">Confirmar contraseña:</label>
                        <input type="password" name="clave_confirmation" placeholder="" required autocomplete="off"
                            class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        />
                        @error('clave_confirmation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <!-- Campos fila 2-->
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="correo">Correo:</label>
                        <input type="email" name="correo" value="{{ old('correo') }}" placeholder="Correo" required autocomplete="off"
                            class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        />
                         @error('correo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="telefono">Teléfono:</label>
                        <input type="text" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono" required autocomplete="off"
                            class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        />
                        @error('telefono')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="rol">Rol:</label>
                        <select name="rol"
                        class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        >
                        <option value="1" {{ old('rol') == 1 ? 'selected' : '' }}>Administrador</option>
                        <option value="2" {{ old('rol') == 2 ? 'selected' : '' }}>Encargado</option>
                        <option value="3" {{ old('rol') == 3 ? 'selected' : '' }}>Común</option>
                        </select>
                        @error('rol')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-1 inline-flex items-center justify-center">
                        <button type="submit" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 rounded-lg bg-green-600 hover:bg-green-500 text-white cursor-pointer">
                            <i class="fa-solid fa-plus text-sm"></i>
                            <span class="text-sm">Crear</span>
                        </button>
                    </div>
                </form>
            </div>

             <!-- Subtitulo -->
             <div class="flex items-center justify-between mb-2">
                <h2 class="font-montserrat text-main-2 font-semibold sm:text-lg text-base">
                    <i class="fa-solid fa-users mr-1"></i>
                    Lista de usuarios
                </h2>
                <div class="flex items-center md:gap-2 gap-1">
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

                    <button onclick="openModal('search-modal')" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                        <span class="text-sm hidden md:block">Buscar</span>
                    </button>

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
                    <x-th-table>Usuario</x-th-table>
                    <x-th-table>Rol</x-th-table>
                    <x-th-table>Número de telefono</x-th-table>
                    <x-th-table>Fecha de registro</x-th-table>
                    <x-th-table>Estado</x-th-table>
                    <x-th-table>Acciones</x-th-table>
                </x-slot>
                <x-slot name="bodyTable">
                    @foreach($usuarios as $usuario)
                    <tr class="text-sm border-b-1 whitespace-nowrap">
                        <x-td-table type="special_user" :content="['name' => $usuario['apellidos']. ' ' .$usuario['nombres'], 'email' => $usuario->email, 'foto' => $usuario['foto'] ? $usuario['foto'] : null  ]" />
                        <x-td-table type="role" :content="$usuario['rol_id']" />
                        <x-td-table type="normal" :content="$usuario['telefono']" />
                        <x-td-table type="normal" :content="$usuario['created_at'] ? $usuario['created_at']->format('Y-m-d') : 'Sin fecha'" />
                        <x-td-table type="state" :content="$usuario['estado']" />
                        <x-td-table type="actions-modal" :content="['section' => 'admin.usuarios', 'id' => $usuario['id']]" />
                    </tr>
                    @endforeach
                </x-slot>
                <x-slot name="footTable"> 
                    <x-foot-table :paginator="$usuarios" :colspan="6" />
                </x-slot>
            </x-table>

        </div>
    </div>
    @push('scripts')
        @vite('resources/js/users-section-scripts.js')
    @endpush
</x-app-layout>


<!-- Success modal -->
<x-success-modal/>

<!-- Error modal -->
<x-error-modal/>

<!-- Modal delete-user -->
<x-delete-modal/>

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
            <form method="GET" action="{{ route('admin.usuarios.index') }}">
                <div class="p-5">
                    <!-- Contenedor del Select -->
                    <div class="mb-4">
                        <label for="campo" class="text-sm font-medium text-main-3">Filtrar por:</label>
                        <select name="campo" class="w-full mt-1 border bg-transparent dark:border-slate-500 light:border-gray-800 dark:text-slate-300 light:text-slate-700 rounded-lg p-1 outline-none">
                            <option class="dark:bg-slate-600 text-xs" value="nombres" {{ request('campo') == 'nombres' ? 'selected' : '' }}>Nombre</option>
                            <option class="dark:bg-slate-600 text-xs" value="apellidos" {{ request('campo') == 'apellidos' ? 'selected' : '' }}>Apellidos</option>
                            <option class="dark:bg-slate-600 text-xs" value="email" {{ request('campo') == 'email' ? 'selected' : '' }}>Correo</option>
                            <option class="dark:bg-slate-600 text-xs" value="telefono" {{ request('campo') == 'telefono' ? 'selected' : '' }}>Teléfono</option>
                            <option class="dark:bg-slate-600 text-xs" value="estado" {{ request('campo') == 'estado' ? 'selected' : '' }}>Estado (activo/inactivo)</option>
                            <option class="dark:bg-slate-600 text-xs" value="rol" {{ request('campo') == 'rol' ? 'selected' : '' }}>Rol (Admin/Encargado,Común)</option>
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

<!-- Modal show-user -->
<div id="show-user-modal" class="hidden">
    <div class="flex fixed top-0 left-0 w-full h-full bg-black/50 z-50 justify-center items-center ">
        <div class="dark:bg-slate-800 light:bg-slate-50 rounded-lg shadow-lg w-full max-w-md overflow-hidden border-2 dark:border-slate-700 light:border-slate-300 m-10">

            <!-- Spinner de carga -->
            <div id="usuario-loading-show" class="hidden p-3">
                <div class="flex flex-col items-center p-3 space-y-2">
                    <p class="text-text-1 font-roboto font-medium">Cargando datos del usuario</p>
                    <svg class="animate-spin h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                    </svg>
                </div>
            </div>

            <!-- Contenido -->
            <div id="usuario-detalles-show" class="">
                <div class="relative light:bg-slate-300/60 dark:bg-slate-700/60 h-14 md:h-17 px-5 border-b-2 dark:border-slate-700 light:border-slate-300">
                    <div class="absolute -bottom-8 md:-bottom-10">
                        <img id="fotoShow" draggable="false" class="w-16 h-16 md:w-20 md:h-20 rounded-full object-cover border-2 light:border-slate-300 dark:border-slate-700" src="" alt="Perfil">
                    </div>
                    <button onclick="closeModal('show-user-modal')" class="absolute top-2 right-4 text-slate-400 hover:text-red-500 cursor-pointer">
                        <i class="fa-solid fa-x text-xs"></i>
                    </button>
                    <label id="estadoActivoShow" class="hidden absolute top-20 right-7 items-center text-[0.65rem] md:text-xs font-black font-roboto leading-none">
                        <span class="self-center w-[0.40rem] h-[0.40rem] md:w-2 md:h-2 mr-2 rounded-full dark:bg-green-400 light:bg-green-600"></span>
                        <span class="dark:text-green-400 light:text-green-600 leading-none">ACTIVO</span>
                    </label>
                    <label id="estadoInactivoShow" class="hidden absolute top-20 right-7 items-center text-[0.65rem] md:text-xs font-black font-roboto leading-none">
                        <span class="self-center w-[0.40rem] h-[0.40rem] md:w-2 md:h-2 mr-2 rounded-full dark:bg-red-400 light:bg-red-600"></span>
                        <span class="dark:text-red-400 light:text-red-600 leading-none">INACTIVO</span>
                    </label>
                </div>

                <!-- Modal body -->
                <div class="p-6 mt-6 max-w-2xl w-full mx-auto">
                    <!-- Encabezado -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-gray-600 pb-2 mb-2 md:pb-4 md:mb-4">
                        <div>
                            <h2 id="nombreCompletoShow" class="text-sm md:text-lg font-bold text-text-1"></h2>
                            <p id="correoHeaderShow" class="text-xs md:text-sm text-text-1/80"></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 text-[0.70rem] md:text-sm text-text-1">
                        <!-- Apellido -->
                        <div>
                            <label class="text-main-3 block">Apellidos</label>
                            <input id="apellidosShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>

                        <!-- Nombre -->
                        <div class="mt-auto">
                            <label class="text-main-3 block">Nombres</label>
                            <input id="nombresShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>

                        <!-- Correo -->
                        <div class="md:col-span-2">
                            <label class="text-main-3 block" >Correo</label>
                            <div class="relative w-full">
                                <i class="fa-solid fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-text-1"></i>
                                <input id="emailShow" type="text" value="" class="w-full bg-transparent border border-slate-500 pl-8 py-1.5 md:py-2 rounded focus:outline-none focus:ring-0 focus:border-main-3" readonly
                                />
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <label class="text-main-3 block">Teléfono</label>
                            <input id="telefonoShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>

                        <!-- Rol -->
                        <div>
                            <label class="text-main-3 block ">Rol</label>
                            <input id="rolShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>

                        <!-- Fecha de registro -->
                        <div>
                            <label class="text-main-3 block ">Fecha de registro</label>
                            <input id="fechaCreacionShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>

                        <!-- Hora de registro -->
                        <div>
                            <label class="text-main-3 block ">Hora de registro</label>
                            <input id="horaCreacionShow" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3" readonly />
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal edit-user -->
<div id="edit-user-modal" class="hidden">
    <div class="flex fixed top-0 left-0 w-full h-full bg-black/50 z-50 justify-center items-center ">
        <div class="dark:bg-slate-800 light:bg-slate-50 rounded-lg shadow-lg w-full max-w-md overflow-hidden border-2 dark:border-slate-700 light:border-slate-300 m-10">

            <!-- Spinner de carga -->
            <div id="usuario-loading-edit" class="hidden p-3">
                <div class="flex flex-col items-center p-3 space-y-2">
                    <p class="text-text-1 font-roboto font-medium">Cargando datos del usuario</p>
                    <svg class="animate-spin h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                    </svg>
                </div>
            </div>

            <!-- Contenido -->
            <div id="usuario-detalles-edit" class="">
                <div class="relative light:bg-slate-300/60 dark:bg-slate-700/60 h-14 md:h-17 px-5 border-b-2 dark:border-slate-700 light:border-slate-300">
                    <div class="absolute -bottom-8 md:-bottom-10">
                        <img id="fotoEdit" draggable="false" class="w-16 h-16 md:w-20 md:h-20 rounded-full object-cover border-2 light:border-slate-300 dark:border-slate-700" src="" alt="Perfil">
                    </div>
                    <button onclick="closeModal('edit-user-modal')" class="absolute top-2 right-4 text-slate-400 hover:text-red-500 cursor-pointer">
                        <i class="fa-solid fa-x text-xs"></i>
                    </button>
                    <label id="estadoActivoEdit" class="hidden absolute top-20 right-7 items-center text-[0.65rem] md:text-xs font-black font-roboto leading-none">
                        <span class="self-center w-[0.40rem] h-[0.40rem] md:w-2 md:h-2 mr-2 rounded-full dark:bg-green-400 light:bg-green-600"></span>
                        <span class="dark:text-green-400 light:text-green-600 leading-none">ACTIVO</span>
                    </label>
                    <label id="estadoInactivoEdit" class="hidden absolute top-20 right-7 items-center text-[0.65rem] md:text-xs font-black font-roboto leading-none">
                        <span class="self-center w-[0.40rem] h-[0.40rem] md:w-2 md:h-2 mr-2 rounded-full dark:bg-red-400 light:bg-red-600"></span>
                        <span class="dark:text-red-400 light:text-red-600 leading-none">INACTIVO</span>
                    </label>
                </div>

                <!-- Modal body -->
                <div class="p-6 mt-6 max-w-2xl w-full mx-auto">
                    <!-- Encabezado -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-gray-600 pb-2 mb-2 md:pb-4 md:mb-4">
                        <div>
                            <h2 id="nombreCompletoEdit" class="text-sm md:text-lg font-bold text-text-1"></h2>
                            <p id="correoHeaderEdit" class="text-xs md:text-sm text-text-1/80"></p>
                        </div>
                    </div>

                    <!-- Nota: El action se va asignar desde el script js -->
                    <form id="formEditUsuario" action="" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-3 text-[0.70rem] md:text-sm text-text-1/60">
                            <!-- Apellido -->
                            <div>
                                <label class="text-main-3 block">Apellidos</label>
                                <input id="apellidosEdit" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full" disabled />
                            </div>

                            <!-- Nombre -->
                            <div class="mt-auto">
                                <label class="text-main-3 block">Nombres</label>
                                <input id="nombresEdit" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full " disabled />
                            </div>

                            <!-- Correo -->
                            <div class="md:col-span-2">
                                <label class="text-main-3 block" >Correo</label>
                                <div class="relative w-full">
                                    <i class="fa-solid fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-text-1/60"></i>
                                    <input id="emailEdit" type="text" value="" class="w-full bg-transparent border border-slate-500 pl-8 py-1.5 md:py-2 rounded " disabled
                                    />
                                </div>
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label class="text-main-3 block">Teléfono</label>
                                <input id="telefonoEdit" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full " disabled />
                            </div>

                            <!-- Fecha de registro -->
                            <div>
                                <label class="text-main-3 block ">Fecha de registro</label>
                                <input id="fechaCreacionEdit" type="text" value="" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full " disabled />
                            </div>

                            
                            <!-- Rol -->
                            <div class="text-text-1">
                                <label class="text-main-3 block">Rol</label>
                                <select id="rolSelectEdit" name="rol" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3">
                                    <option class="dark:bg-slate-600 text-xs" value="1">Administrador</option>
                                    <option class="dark:bg-slate-600 text-xs" value="2">Encargado</option>
                                    <option class="dark:bg-slate-600 text-xs" value="3">Común</option>
                                </select>
                            </div>

                            <!-- Estado -->
                            <div class="text-text-1">
                                <label class="text-main-3 block">Estado</label>
                                <select id="estadoSelectEdit" name="estado" class="bg-transparent border border-slate-500 px-2 py-1.5 md:px-3 md:py-2 rounded w-full focus:outline-none focus:ring-0 focus:border-main-3">
                                    <option class="dark:bg-slate-600 text-xs" value="1">Activo</option>
                                    <option class="dark:bg-slate-600 text-xs" value="0">Inactivo</option>
                                </select>
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
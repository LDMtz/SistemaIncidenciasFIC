<x-app-layout>
    <div class="flex w-full">
        <x-sidebar-admin/>

        <!-- container -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">
            <h1 class="font-roboto font-black text-2xl mb-3 ">Usuarios</h1>

            <!-- Subtitulo -->
            <h2 class="font-montserrat text-main-2 font-semibold mb-1 text-lg"><i class="fa-solid fa-user-plus mr-1"></i> Crear usuario</h2>

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
                <h2 class="font-montserrat text-main-2 font-semibold text-lg">
                    <i class="fa-solid fa-users mr-1"></i>
                    Todos los usuarios
                </h2>
                <div class="flex items-center gap-2">
                    @php $newSortOrder = $sortOrder === 'asc' ? 'desc' : 'asc';@endphp
                    <a href="{{ route('admin.usuarios.index', ['sort' => $newSortOrder]) }}"
                    class="inline-flex items-center px-2 py-1 text-xs font-montserrat border rounded hover:bg-slate-200 dark:hover:bg-slate-700">
                        Ordenar por fecha
                        @if ($sortOrder === 'asc')
                            <i class="fa-solid fa-angle-up ml-1"></i>
                        @else
                            <i class="fa-solid fa-angle-down ml-1"></i>
                        @endif
                    </a>

                    <button id="open-modal-search" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500 cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass text-sm"></i>
                        <span class="text-sm">Buscar</span>
                    </button>

                    @if(request()->has('campo') || request()->has('valor') || request()->has('sort'))
                        <a href="{{ route('admin.usuarios.index') }}" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-gray-700 text-white rounded-lg hover:bg-gray-800">
                            <i class="fa-solid fa-filter-circle-xmark text-sm"></i>
                            <span class="text-sm">Quitar filtros</span>
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
                        <x-td-table type="special_user" :content="['name' => $usuario['apellidos']. ' ' .$usuario['nombres'], 'email' => $usuario->email]" />
                        <x-td-table type="role" :content="$usuario['rol_id']" />
                        <x-td-table type="normal" :content="$usuario['telefono']" />
                        <x-td-table type="normal" :content="$usuario['created_at'] ? $usuario['created_at']->format('Y-m-d') : 'Sin fecha'" />
                        <x-td-table type="state" :content="$usuario['estado']" />
                        <x-td-table type="actions" :content="['section' => 'product', 'id' => $usuario['id']]" />
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
    @vite('resources/js/success-modal.js')
    @vite('resources/js/search-modal.js')
@endpush
</x-app-layout>

<!-- Modal Success -->
@if(session('success'))
    <div id="successModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex justify-center items-center bg-black/50">
        <div id="successModalContent" class="relative p-4 w-full max-w-md h-auto rounded-lg shadow dark:bg-gray-800 light:bg-gray-100 m-10">
            <div class="relative p-4 text-center">
                <div class="w-12 h-12 rounded-full dark:bg-green-900 light:bg-green-600 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <i class="fa-solid fa-check dark:text-green-400 light:text-green-100 text-xl"></i>
                </div>
                <p class="mb-4 text-lg font-semibold text-text-1">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

<!-- Modal Buscar -->
<div id="search-modal" class="hidden">
    <div class="flex fixed top-0 left-0 w-full h-full bg-black/50 z-50 justify-center items-center ">
        <div class="dark:bg-slate-800 light:bg-slate-50 rounded-lg shadow-lg w-full max-w-md overflow-hidden border dark:border-slate-700 light:border-slate-300 m-10">
            <!-- Modal header -->
            <div class="flex justify-between items-center border-b dark:border-slate-700 light:border-slate-300 px-5 py-3 dark:bg-slate-700/60 light:bg-slate-100">
                <h3 class="font-roboto text-sm font-semibold text-text-1">BUSCAR</h3>
                <button id="close-modal-search" class="text-slate-400 hover:text-red-500 cursor-pointer">
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
                            <option class="dark:bg-slate-600 text-xs"alue="estado" {{ request('campo') == 'estado' ? 'selected' : '' }}>Estado (activo/inactivo)</option>
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
            
        </div>
    </div>
</div>
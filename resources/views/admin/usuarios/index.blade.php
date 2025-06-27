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
                        <button type="submit" class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 rounded-lg bg-green-600 hover:bg-green-500 text-white">
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
                <button class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                    <span class="text-sm">Buscar</span>
                </button>
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
                    @php $prueba = ['test' => 'hola', 'state' => 0, 'role' => 3] @endphp
                    <tr class="text-sm border-b-1 whitespace-nowrap">
                        <x-td-table type="special_user" :content="['name' => 'Martinez Gonzalez Leoncio', 'email' => 'lf.gonzalez23@info.uas.edu.mx']" />
                        <x-td-table type="role" :content="$prueba['role']" />
                        <x-td-table type="normal" :content="'45334535'" />
                        <x-td-table type="normal" :content="'02-06-25'" />
                        <x-td-table type="state" :content="$prueba['state']" />
                        <x-td-table type="actions" :content="$prueba['test']" />
                    </tr>
                </x-slot>
            </x-table>

        </div>
    </div>
@push('scripts')
    @vite('resources/js/success-modal.js')
@endpush
</x-app-layout>

<!-- Modal Success -->
@if(session('success'))
    <div id="successModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex justify-center items-center bg-black/50">
        <div id="successModalContent" class="relative p-4 w-full max-w-md h-auto rounded-lg shadow bg-gray-800 m-10">
            <div class="relative p-4 text-center">
                <div class="w-12 h-12 rounded-full bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <i class="fa-solid fa-check text-green-400 text-xl"></i>
                </div>
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif
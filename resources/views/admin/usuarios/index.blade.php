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

                <form class="grid grid-cols-1 md:grid-cols-4 gap-x-15 gap-y-3 text-sm">
                    <!-- Campos fila 1-->
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="apellidos">Apellidos:</label>
                        <input
                        type="text"
                        class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        placeholder="Apellidos"
                        />
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="nombres">Nombres:</label>
                        <input
                        type="text"
                        class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        placeholder="Nombres"
                        />
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="password">Contraseña:</label>
                        <input
                        type="password"
                        class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        placeholder="••••••••"
                        />
                    </div>
                    
                    <!-- Botón CREAR -->
                    <div
                        class="
                        col-span-full
                        order-last
                        md:order-none
                        md:col-span-1
                        md:col-start-4
                        md:row-span-2
                        flex items-center justify-center
                        "
                    >
                        <button
                            type="submit"
                            class="flex flex-row p-2 md:flex-col items-center justify-center bg-green-600 hover:bg-green-500 text-white rounded-lg md:p-4 shadow-lg gap-2"
                        >
                            <i class="fa-solid fa-plus text-xs md:text-2xl"></i>
                            <span class="uppercase font-semibold text-xs">Crear</span>
                        </button>
                    </div>

                    <!-- Campos fila 2-->
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="email">Correo:</label>
                        <input
                        type="email"
                        class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        placeholder="Correo"
                        />
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="telefono">Teléfono:</label>
                        <input
                        type="text"
                        class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        placeholder="Teléfono"
                        />
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-main-3" for="rol">Rol:</label>
                        <select
                        class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                        >
                        <option>Administrador</option>
                        <option>Usuario</option>
                        <option>Invitado</option>
                        </select>
                    </div>
                </form>
            </div>

             <!-- Subtitulo -->
             <div class="flex items-center justify-between mb-2">
                <h2 class="font-montserrat text-main-2 font-semibold text-lg">
                    <i class="fa-solid fa-users mr-1"></i>
                    Todos los usuarios
                </h2>
                <button
                    class="font-montserrat inline-flex items-center justify-center gap-2 px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-500"
                    >
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
</x-app-layout>
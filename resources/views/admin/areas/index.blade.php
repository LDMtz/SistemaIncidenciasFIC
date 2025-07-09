<x-app-layout>
    <div class="flex w-full">
        <x-sidebar-admin />

        <!-- Contenedor principal -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">
            <h1 class="font-roboto font-black sm:text-2xl text-xl mb-5">Áreas</h1>

            <!-- Grid principal dividido en 2 columnas -->
            <div class="grid grid-cols-1 lg:grid-cols-7 gap-10">

                <!-- Columna izquierda: listado de áreas (ocupa 2/3) -->
                <div class="lg:col-span-4 space-y-6 ">
                    <!-- Tabla de áreas -->
                        <h2 class="font-montserrat text-main-2 font-semibold mb-1 sm:text-lg text-base"><i class="fa-solid fa-location-dot mr-1"></i> Todas las áreas</h2>

                        <div class="overflow-y-auto max-h-120 rounded-lg light:shadow-md light:shadow-slate-950/25">
                            <x-table :rounded="false" :shadow="false">
                                <x-slot name="headTable">
                                    <x-th-table>Área</x-th-table>
                                    <x-th-table :centered="true">Encargados</x-th-table>
                                    <x-th-table>Estado</x-th-table>
                                    <x-th-table>Acciones</x-th-table>
                                </x-slot>
                                <x-slot name="bodyTable">
                                    @for($a = 0; $a < 20; $a++)
                                    <tr class="text-sm border-b-1 last:border-b-0 whitespace-nowrap">
                                        <x-td-table type="normal" :content="'Secretaría Academica'" />
                                        <x-td-table type="normal" :content="'2'" :centered="true" />
                                        <x-td-table type="state" :content="1" />
                                        <x-td-table type="actions-modal" :content="['section' => 'admin.usuarios', 'id' => '2']" />
                                    </tr>
                                    @endfor
                                </x-slot>
                            </x-table>
                        </div>
                        
                        
                </div>

                <div class="lg:col-span-3"><!-- grid grid-rows-1 md:grid-rows-2 gap-2-->
                    <!-- Nueva área -->
                    <div class="mb-5">
                        <h2 class="font-montserrat text-main-2 font-semibold mb-1 sm:text-lg text-base"><i class="fa-solid fa-square-plus mr-1"></i> Nueva área</h2>
                        <div class="light:bg-slate-50 light:border-white light:shadow-md dark:bg-slate-800 border-1 dark:border-slate-700 rounded-lg p-4">
                            <label class="block text-sm font-semibold text-main-3 mb-1" >Nombre del área:</label>
                            <input type="text" placeholder="Nueva área" required autocomplete="off"
                                    class="w-full bg-main-7 dark:bg-main-7/80 text-text-1 rounded-md border-1 border-main-1 px-3 py-0.5 focus:outline-none focus:ring-2 focus:border-0 focus:ring-main-2"
                            />

                            <div class="flex justify-between text-sm mt-4 font-semibold">
                                <span class="text-main-3">Encargado(s):</span>
                                <span class="text-text-1"><span>1</span> encargado</span>
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
                                    <tr class="border-t border-text-1/10 hover:bg-text-1/5">
                                        <td class="px-2">
                                            <input type="checkbox" class="accent-blue-500" />
                                        </td>
                                        <td >Juan Pereaaaaaaaaaaaaaaaaaaaz</td>
                                    </tr>
                                    <tr class="border-t border-text-1/10 hover:bg-text-1/5">
                                        <td class="px-2">
                                            <input type="checkbox" class="accent-blue-500" />
                                        </td>
                                        <td >Juan Pereaaaaaaaaaaaaaaaaaaaz</td>
                                    </tr>
                                    <tr class="border-t border-text-1/10 hover:bg-text-1/5">
                                        <td class="px-2">
                                            <input type="checkbox" class="accent-blue-500" />
                                        </td>
                                        <td >Juan Pereaaaaaaaaaaaaaaaaaaaz</td>
                                    </tr>
                                    <tr class="border-t border-text-1/10 hover:bg-text-1/5">
                                        <td class="px-2">
                                            <input type="checkbox" class="accent-blue-500" />
                                        </td>
                                        <td >Juan Pereaaaaaaaaaaaaaaaaaaaz</td>
                                    </tr>
                                    <tr class="border-t border-text-1/10 hover:bg-text-1/5">
                                        <td class="px-2">
                                            <input type="checkbox" class="accent-blue-500" />
                                        </td>
                                        <td >Juan Pereaaaaaaaaaaaaaaaaaaaz</td>
                                    </tr>
                                    <tr class="border-t border-text-1/10 hover:bg-text-1/5">
                                        <td class="px-2">
                                            <input type="checkbox" class="accent-blue-500" />
                                        </td>
                                        <td >Juan Pereaaaaaaaaaaaaaaaaaaaz</td>
                                    </tr>
                                    <tr class="border-t border-text-1/10 hover:bg-text-1/5">
                                        <td class="px-2">
                                            <input type="checkbox" class="accent-blue-500" />
                                        </td>
                                        <td >Juan Pereaaaaaaaaaaaaaaaaaaaz</td>
                                    </tr>
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
                    </div>

                    <!-- Encargados de área -->
                    <div class="">
                        <h2 class="font-montserrat text-main-2 font-semibold mb-1 sm:text-lg text-base"><i class="fa-solid fa-users-rectangle mr-1"></i> Encargados de área</h2>
                        <div class="overflow-y-auto max-h-40 rounded-lg light:shadow-md light:shadow-slate-950/25">
                            <x-table :rounded="false" :shadow="false">
                                <x-slot name="headTable">
                                    <x-th-table>Nombres</x-th-table>
                                    <x-th-table :centered="true">Áreas</x-th-table>
                                    <x-th-table :centered="true">Ver</x-th-table>
                                </x-slot>
                                <x-slot name="bodyTable">
                                    @for($a = 0; $a < 20; $a++)
                                    <tr class="text-sm border-b-1 last:border-b-0 whitespace-nowrap">
                                        <x-td-table type="special_user" :content="['name' => 'Martinez Gonzalez Leoncio Daniel', 'email' => 'admin@info.uas.edu.mx', 'foto' => null ]" />
                                        <x-td-table type="normal" :content="'2'" :centered="true" />
                                        <td class="text-center">
                                            <button onclick="" class="text-violet-500 hover:text-violet-400 transition-colors duration-100 cursor-pointer">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endfor
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
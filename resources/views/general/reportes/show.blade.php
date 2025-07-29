<x-app-layout>
    <div class="flex w-full">

        <!-- container -->
        <div class="mx-4 lg:mx-8 flex-1 overflow-auto">
            <div class="flex justify-between items-center mb-3">
                <div class="flex items-center gap-x-2">
                    <h1 class="font-roboto font-black sm:text-2xl text-xl">Reportes</h1>
                    <i class="fa-solid fa-angle-right"></i>
                    <h2 class="font-roboto text-text-1/50 font-black sm:text-lg text-base">Ver reporte</h2>
                </div>

                <a href="{{ route('home') }}" 
                class="inline-flex items-center gap-x-1 text-sm sm:text-base font-semibold text-text-1 border-b border-transparent hover:border-text-1">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Volver</span>
                </a>
            </div>

            <div class="flex flex-1 items-center justify-center mt-4">
                <!-- Contenedor del reporte -->
                <div class="w-full max-w-4xl font-roboto  rounded-lg text-xs sm:text-sm border-1 overflow-hidden 
                    light:shadow-md dark:bg-slate-900 light:bg-slate-50 dark:border-slate-600 light:border-slate-400 dark:text-slate-400 light:text-slate-600">
                    <!-- Encabezado superior -->
                    <div class="grid grid-cols-2 sm:grid-cols-7 border-b-1 dark:border-slate-600 light:border-slate-400  ">
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Folio:</strong> 343242354353</div>
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Fecha:</strong> 25/05/24</div>
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Hora:</strong> 10:00 am</div>
                        <button class="flex justify-start gap-1 text-sm sm:justify-center items-center cursor-pointer p-1 text-text-1 sm:col-span-1 
                            dark:hover:bg-blue-500 light:hover:bg-blue-300">
                            <i class="fa-solid fa-file-pdf"></i>
                            Descargar
                        </button>
                    </div>

                    <!-- Usuario -->
                    <div class="grid grid-cols-1 sm:grid-cols-5 border-b-1 dark:border-slate-600 light:border-slate-400 ">
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Nombre:</strong> Martínez Gonzalez Leoncio Daniel</div>
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Correo:</strong> ldt.mtz21@info.uas.edu.mx</div>
                        <div class="p-1"><strong class="text-text-1">Teléfono:</strong> 6671980710</div>
                    </div>

                    <div class="dark:bg-slate-800 light:bg-slate-200 text-center font-semibold tracking-[0.5em] border-b-1 dark:border-slate-600 light:border-slate-400  sm:text-base">
                        <span class="text-xs text-text-1">REPORTE DE INCIDENCIA</span>
                    </div>

                    <!-- Detalles principales -->
                    <div class="grid grid-cols-1 sm:grid-cols-4 border-b-1 dark:border-slate-600 light:border-slate-400 ">
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Área:</strong> Control escolar</div>
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-1"><strong class="text-text-1">Severidad:</strong> <span class="text-red-500">Crítica</span></div>
                        <div class="p-1 sm:col-span-1"><strong class="text-text-1">Estado:</strong> <span class="text-green-500">Recibido</span></div>
                    </div>

                    <!-- Título y descripción -->
                    <div>
                        <div class="border-b-1 dark:border-slate-600 light:border-slate-400  p-1">
                            <strong class="text-text-1">Título:</strong>
                            Se rompió el proyector del aula 3
                        </div>
                        <div class="border-b-1 dark:border-slate-600 light:border-slate-400  p-1">
                            <strong class="text-text-1">Descripción:</strong> 
                            Paso esto ... lore Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis cupiditate necessitatibus odio nostrum qui quidem asperiores eum illo veniam adipisci, maxime exercitationem a ipsum? Asperiores corrupti dolore odio doloribus voluptate?
                        </div>
                    </div>

                    <!-- Asignado a -->
                    <div class="border-b-1 dark:border-slate-600 light:border-slate-400  p-1">
                        <strong class="text-text-1">Asignado a:</strong>
                        <br>
                        <br>
                    </div>

                    <!-- Fotos -->
                    <div class="p-1">
                        <strong class="text-text-1">Fotos:</strong>
                        <br>
                        <br>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
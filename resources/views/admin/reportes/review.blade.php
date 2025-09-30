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

                <a href="{{ route('admin.reportes.index') }}" 
                class="inline-flex items-center gap-x-1 text-sm sm:text-base font-semibold text-text-1 border-b border-transparent hover:border-text-1">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Volver</span>
                </a>
            </div>

            <div class="flex flex-col items-center justify-center mt-4">
                    <div class="w-full max-w-4xl font-roboto rounded-lg text-xs sm:text-sm border p-2 mb-4
                    light:shadow-md dark:bg-slate-900 light:bg-slate-50 dark:border-slate-600 light:border-slate-400 dark:text-slate-400 light:text-slate-600">

                        <!-- Formulario único para actualizar reporte -->
                        <form method="POST" action="{{ route('admin.reportes.actualizar', $reporte->id) }}" class="flex flex-wrap items-center gap-4">
                            @csrf
                            @method('PATCH')

                            <!-- Estado -->
                            <div class="flex items-center gap-2">
                                <label for="estado_id" class="font-semibold text-sm">Estado:</label>
                                <select name="estado_id" id="estado_id" 
                                    class="border dark:border-slate-600 dark:bg-slate-800 light:border-slate-400 light:bg-slate-200 rounded-md px-2 py-1 text-sm bg-transparent">
                                    @foreach(App\Models\EstadoReporte::all() as $estado)
                                        <option value="{{ $estado->id }}" {{ $reporte->estado_id == $estado->id ? 'selected' : '' }}>
                                            {{ $estado->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Severidad -->
                            <div class="flex items-center gap-2">
                                <label for="severidad_id" class="font-semibold text-sm">Severidad:</label>
                                <select name="severidad_id" id="severidad_id" 
                                    class="border dark:border-slate-600 dark:bg-slate-800 light:border-slate-400 light:bg-slate-200 rounded-md px-2 py-1 text-sm bg-transparent">
                                    @foreach(App\Models\Severidad::all() as $severidad)
                                        <option value="{{ $severidad->id }}" {{ $reporte->severidad_id == $severidad->id ? 'selected' : '' }}>
                                            {{ $severidad->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Botón único -->
                            <button type="submit" 
                                class="px-3 py-1 text-sm rounded-md bg-blue-600 text-white hover:bg-blue-700">
                                Guardar cambios
                            </button>
                        </form>
                    </div>
                <!-- Contenedor del reporte -->
                <div class="w-full max-w-4xl font-roboto  rounded-lg text-xs sm:text-sm border-1 overflow-hidden 
                    light:shadow-md dark:bg-slate-900 light:bg-slate-50 dark:border-slate-600 light:border-slate-400 dark:text-slate-400 light:text-slate-600">
                    <!-- Encabezado superior -->
                    <div class="grid grid-cols-2 sm:grid-cols-7 border-b-1 dark:border-slate-600 light:border-slate-400  ">
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Folio:</strong> {{$reporte->folio}}</div>
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Fecha:</strong> {{ $reporte->created_at->format('d/m/Y') }}</div>
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Hora:</strong> {{ $reporte->created_at->format('h:i A') }}</div>
                        <button class="flex justify-start gap-1 text-sm sm:justify-center items-center cursor-pointer p-1 text-text-1 sm:col-span-1 
                            dark:hover:bg-blue-500 light:hover:bg-blue-300">
                            <i class="fa-solid fa-file-pdf"></i>
                            Descargar
                        </button>
                    </div>

                    <!-- Usuario -->
                    <div class="grid grid-cols-1 sm:grid-cols-5 border-b-1 dark:border-slate-600 light:border-slate-400 ">
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Nombre:</strong> {{ $reporte->usuario?->apellidos && $reporte->usuario?->nombres ? $reporte->usuario->apellidos . ' ' . $reporte->usuario->nombres : 'Desconocido' }}</div>
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Correo:</strong> {{ $reporte->usuario?->email ?? 'Desconocido' }}</div>
                        <div class="p-1"><strong class="text-text-1">Teléfono:</strong> {{ $reporte->usuario?->telefono ?? 'Desconocido' }}</div>
                    </div>

                    <div class="dark:bg-slate-800 light:bg-slate-200 text-center font-semibold tracking-[0.5em] border-b-1 dark:border-slate-600 light:border-slate-400  sm:text-base">
                        <span class="text-xs text-text-1">REPORTE DE INCIDENCIA</span>
                    </div>

                    <!-- Detalles principales -->
                    <div class="grid grid-cols-1 sm:grid-cols-4 border-b-1 dark:border-slate-600 light:border-slate-400 ">
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-2"><strong class="text-text-1">Área:</strong> {{$reporte->area->nombre}}</div>
                        <div class="sm:border-r-1 border-0 dark:border-slate-600 light:border-slate-400  p-1 sm:col-span-1"><strong class="text-text-1">Severidad:</strong> <x-severidad-color :severidad="$reporte->severidad->nombre" /></span></div>
                        <div class="p-1 sm:col-span-1"><strong class="text-text-1">Estado:</strong>  <x-estado-reporte-color :estado="$reporte->estado->nombre" /></div>
                    </div>

                    <!-- Título y descripción -->
                    <div>
                        <div class="border-b-1 dark:border-slate-600 light:border-slate-400  p-1">
                            <strong class="text-text-1">Título:</strong>
                            {{$reporte->titulo}}
                        </div>
                        <div class="border-b-1 dark:border-slate-600 light:border-slate-400  p-1">
                            <strong class="text-text-1">Descripción:</strong> 
                            {{$reporte->descripcion}}
                    </div>

                    <!-- Asignado a -->
                    <div class="border-b-1 dark:border-slate-600 light:border-slate-400  p-1">
                        <strong class="text-text-1">Asignado a:</strong>
                        @foreach ($encargados as $encargado)
                        <br>
                            <span>{{$encargado->apellidos . ' ' . $encargado->nombres}}</span>
                        @endforeach
                    </div>

                    <!-- Fotos -->
                    <div class="p-1">
                        <strong class="text-text-1">Fotos:</strong>
                        <br>
                        @forelse($reporte->fotos as $foto)
                            <img src="{{ asset('storage/' . $foto->ruta)  }}" alt="Foto del reporte"
                                class="w-32 h-32 object-cover rounded-md inline-block m-1 border">
                        @empty
                            <p class="text-gray-500 italic">Reporte sin fotos</p>
                        @endforelse
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>

<!-- Success modal -->
<x-success-modal/>
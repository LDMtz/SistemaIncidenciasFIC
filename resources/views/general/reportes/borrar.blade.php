<x-app-layout>
    <div class="flex w-full">

        <!-- container -->
        <div class="mx-2 sm:mx-4 flex-1 overflow-auto">
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

            <div class="flex flex-1 items-start justify-center">
                <div class="w-full max-w-4xl">

                    @if ($rol === 'Administrador')
                    <!-- Panel de Administración -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl shadow-xl border border-slate-700/50 overflow-hidden mb-3">
                        <div class="bg-gradient-to-r from-purple-600/80 to-purple-500 px-3 py-2">
                            <div class="flex items-center gap-3">
                                <div class="bg-white/20 rounded-lg p-2 flex items-center justify-center">
                                    <i class="fa-solid fa-user-shield text-white text-base"></i>
                                </div>
                                <div>
                                    <h2 class="font-roboto text-white font-bold text-sm tracking-wide">PANEL DE ADMINISTRACIÓN</h2>
                                    <p class="text-purple-200 text-xs">Actualizar estado y severidad del reporte</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 sm:p-6">
                            <form method="POST" action="{{ route('admin.reportes.actualizar', $reporte->id) }}" class="flex flex-col sm:flex-row items-start sm:items-end gap-4">
                                @csrf
                                @method('PATCH')

                                <!-- Estado -->
                                <div class="flex-1 w-full">
                                    <label for="estado_id" class="block text-slate-300 font-semibold mb-2 text-sm">
                                        <i class="fa-solid fa-flag text-blue-400 mr-2"></i>Estado
                                    </label>
                                    <select name="estado_id" id="estado_id" 
                                        class="font-roboto w-full bg-slate-900/70 border border-slate-600 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all">
                                        @foreach(App\Models\EstadoReporte::all() as $estado)
                                            <option value="{{ $estado->id }}" {{ $reporte->estado_id == $estado->id ? 'selected' : '' }}>
                                                {{ $estado->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Severidad -->
                                <div class="flex-1 w-full">
                                    <label for="severidad_id" class="block text-slate-300 font-semibold mb-2 text-sm">
                                        <i class="fa-solid fa-gauge-high text-blue-400 mr-2"></i>Severidad
                                    </label>
                                    <select name="severidad_id" id="severidad_id" 
                                        class="font-roboto w-full bg-slate-900/70 border border-slate-600 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all">
                                        @foreach(App\Models\Severidad::all() as $severidad)
                                            <option value="{{ $severidad->id }}" {{ $reporte->severidad_id == $severidad->id ? 'selected' : '' }}>
                                                {{ $severidad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Botón -->
                                <button type="submit" 
                                    class="group relative inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 w-full sm:w-auto justify-center">
                                    <i class="fa-solid fa-save group-hover:scale-110 transition-transform"></i>
                                    <span>Guardar cambios</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif

                    <!-- Card Principal del Reporte -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl shadow-xl border border-slate-700/50 overflow-hidden">
                        
                        <!-- Header del Reporte -->
                        <div class="bg-gradient-to-r from-main-1/80 to-main-2 px-3 py-2">
                            <div class="flex items-center gap-3">
                                <div class="bg-white/20 rounded-lg p-2 sm:p-3 flex items-center justify-center">
                                    <i class="fa-solid fa-file-circle-question text-white text-base sm:text-lg"></i>
                                </div>
                                <div>
                                    <h1 class="font-roboto text-white font-bold text-base sm:text-lg tracking-wide">REPORTE DE INCIDENCIA</h1>
                                    <p class="text-main-3 text-xs sm:text-sm">Información del reporte</p>
                                </div>
                            </div>
                        </div>

                        <!-- Contenido del Reporte -->
                        <div class="p-3 sm:p-5 md:p-7">

                            <!-- Datos del Reportante -->
                            <div class="mb-8">
                                <div class="flex items-center gap-2 mb-2 sm:mb-3 md:mb-4">
                                    <h2 class="text-white font-bold text-base font-montserrat">Datos del Reportante</h2>
                                </div>
                                <div class="bg-slate-900/50 rounded-xl px-4 py-3 border border-slate-700/50 font-roboto">
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-3">
                                        <div class="flex flex-col text-left w-full md:w-auto">
                                            <span class="text-slate-400 text-xs font-medium mb-0 uppercase tracking-wide">Nombre Completo</span>
                                            <span class="text-sm text-white">{{ $reporte->usuario?->apellidos && $reporte->usuario?->nombres ? $reporte->usuario->apellidos . ' ' . $reporte->usuario->nombres : 'Desconocido' }}</span>
                                        </div>
                                        <div class="flex flex-col text-left w-full md:w-auto">
                                            <span class="text-slate-400 text-xs font-medium mb-0 uppercase tracking-wide">Correo Electrónico</span>
                                            <span class="text-sm text-white">{{ $reporte->usuario?->email ?? 'Desconocido' }}</span>
                                        </div>
                                        <div class="flex flex-col text-left w-full md:w-auto">
                                            <span class="text-slate-400 text-xs font-medium mb-0 uppercase tracking-wide">Teléfono</span>
                                            <span class="text-sm text-white">{{ $reporte->usuario?->telefono ?? 'Desconocido' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Detalles de la Incidencia -->
                            <div>
                                <div class="flex items-center gap-2 mb-3">
                                    <h2 class="text-white font-bold text-base font-montserrat">Detalles de la Incidencia</h2>
                                </div>

                                <!-- Tabla de información -->
                                <div class="bg-slate-900/50 rounded-xl border border-slate-700/50 overflow-hidden font-roboto">
                                    
                                    <!-- Fila: Folio, Fecha, Hora, Descargar -->
                                    <div class="grid grid-cols-2 sm:grid-cols-4 border-b border-slate-700/50">
                                        <div class="p-2.5 border-r border-slate-700/50 order-1 sm:order-none">
                                            <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                                <i class="fa-solid fa-hashtag text-blue-400 mr-1"></i>Folio
                                            </span>
                                            <span class="text-white text-sm font-medium">REP-20251016-0001</span>
                                        </div>
                                        <div class="p-2.5 border-r border-slate-700/50 border-t sm:border-t-0 order-3 sm:order-none">
                                            <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                                <i class="fa-solid fa-calendar text-blue-400 mr-1"></i>Fecha
                                            </span>
                                            <span class="text-white text-sm font-medium">16/10/2025</span>
                                        </div>
                                        <div class="p-2.5 border-slate-700/50 border-t sm:border-t-0 order-4 sm:order-none">
                                            <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                                <i class="fa-solid fa-clock text-blue-400 mr-1"></i>Hora
                                            </span>
                                            <span class="text-white text-sm font-medium">10:12 AM</span>
                                        </div>
                                        <div class="p-2.5 flex items-center justify-start sm:justify-center cursor-pointer 
                                            border-l-0 sm:border-l border-slate-700/50
                                            hover:bg-blue-500/20 transition-colors text-base order-2 sm:order-none">
                                            <button class="flex items-center gap-2 text-blue-400 font-medium cursor-pointer">
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <span>Descargar</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Fila: Área (mobile) -->
                                    <div class="p-2.5 border-b border-slate-700/50 sm:hidden">
                                        <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                            <i class="fa-solid fa-location-dot text-blue-400 mr-1"></i>Área
                                        </span>
                                        <span class="text-white text-sm font-medium">Seguimiento a egresados</span>
                                    </div>


                                    <!-- Fila: Área, Severidad, Estado -->
                                    <div class="grid grid-cols-2 sm:grid-cols-3 border-b border-slate-700/50">
                                        <!-- Área: desktop -->
                                        <div class="p-2.5 border-b sm:border-b-0 sm:border-r border-slate-700/50 hidden sm:block">
                                            <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                                <i class="fa-solid fa-location-dot text-blue-400 mr-1"></i>Área
                                            </span>
                                            <span class="text-white text-sm font-medium">Seguimiento a egresados</span>
                                        </div>
                                        
                                        <!-- Severidad -->
                                        <div class="p-2.5 border-r-1 border-slate-700/50">
                                            <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                                <i class="fa-solid fa-gauge-high text-blue-400 mr-1"></i>Severidad
                                            </span>
                                            <span class="text-sm font-medium text-yellow-400">Media</span>
                                        </div>
                                        
                                        <!-- Estado -->
                                        <div class="p-2.5">
                                            <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                                <i class="fa-solid fa-circle text-blue-400 mr-1"></i>Estado
                                            </span>
                                            <span class="text-sm font-medium text-green-400">Resuelto</span>
                                        </div>
                                    </div>

                                

                                    <!-- Fila: Título -->
                                    <div class="p-2.5 border-b border-slate-700/50">
                                        <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                            <i class="fa-solid fa-quote-left text-blue-400 mr-1"></i>Título
                                        </span>
                                        <p class="text-white text-sm">{{$reporte->titulo}}</p>
                                    </div>

                                    <!-- Fila: Descripción -->
                                    <div class="p-2.5 border-b border-slate-700/50">
                                        <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-1">
                                            <i class="fa-solid fa-align-left text-blue-400 mr-1"></i>Descripción
                                        </span>
                                        <p class="text-white text-sm leading-relaxed">{{$reporte->descripcion}}</p>
                                    </div>

                                    <!-- Fila: Asignado a -->
                                    <div class="p-2.5 border-b border-slate-700/50">
                                        <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-2">
                                            <i class="fa-solid fa-users text-blue-400 mr-1"></i>Asignado a
                                        </span>
                                        <div class="flex flex-wrap gap-2">
                                            @forelse ($encargados as $encargado)
                                                <div class="inline-flex items-center gap-2 rounded-full border 
                                                    px-3 py-1.5
                                                    bg-blue-500/10 text-blue-300 border-blue-500/30
                                                    hover:bg-blue-500/20 transition-all">
                                                    <i class="fa-solid fa-user text-xs"></i>
                                                    <span class="text-xs font-medium">{{ $encargado->apellidos . ' ' . $encargado->nombres }}</span>
                                                </div>
                                            @empty
                                                <p class="text-slate-400 italic text-xs">Sin encargados asignados</p>
                                            @endforelse

                                        </div>
                                    </div>

                                    <!-- Fila: Fotos -->
                                    <div class="p-2.5">
                                        <span class="text-slate-400 text-xs font-medium uppercase tracking-wide block mb-2">
                                            <i class="fa-solid fa-camera text-blue-400 mr-1"></i>Evidencia fotográfica
                                        </span>
                                        <div class="flex flex-wrap gap-3">
                                            @forelse($reporte->fotos as $foto)
                                                <div class="relative group">
                                                    <img src="{{ asset('storage/' . $foto->ruta) }}" alt="Foto del reporte"
                                                        class="w-24 h-24 sm:w-28 sm:h-28 object-cover rounded-lg shadow-md hover:shadow-xl transition-all duration-200 hover:scale-105 cursor-pointer"
                                                        onclick="openImageModal('{{ asset('storage/' . $foto->ruta) }}')">
                                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 rounded-lg transition-all duration-200 flex items-center justify-center pointer-events-none">
                                                        <i class="fa-solid fa-search-plus text-white text-xl opacity-0 group-hover:opacity-100 transition-opacity duration-200"></i>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="w-full p-6 rounded-lg border-2 border-dashed border-slate-700 bg-slate-800/30 text-center">
                                                    <i class="fa-solid fa-image text-3xl text-slate-600 mb-2"></i>
                                                    <p class="text-slate-500 italic text-xs">
                                                        Reporte sin fotos adjuntas
                                                    </p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                            </div>

                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    
    @push('scripts')
        @vite('resources/js/show-reporte.js')
    @endpush
</x-app-layout>

<!-- Success modal -->
<x-success-modal/>

<!-- Modal para imagen ampliada -->
<div id="imageModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden items-center justify-center p-4"
    onclick="closeImageModal()">
    <div class="relative max-w-7xl max-h-screen" onclick="event.stopPropagation()">
        <!-- Imagen -->
        <img id="modalImage" src="" alt="Imagen ampliada" 
            class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
        
        <!-- Botón cerrar sobre la imagen -->
        <button onclick="closeImageModal()" 
            class="absolute top-2 right-2 bg-black/50 hover:bg-black/70 text-white rounded-full w-10 h-10 flex items-center justify-center transition-all duration-200 hover:scale-110">
            <i class="fa-solid fa-times text-xl"></i>
        </button>
    </div>
</div>
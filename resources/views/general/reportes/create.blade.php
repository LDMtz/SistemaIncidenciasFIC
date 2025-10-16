<x-app-layout>
    <div class="flex w-full">

        <!-- container -->
        <div class="mx-4 sm:mx-8 flex-1 overflow-auto">
            <div class="flex justify-between items-center mb-3">
                <div class="flex items-center gap-x-2">
                    <h1 class="font-roboto font-black sm:text-2xl text-xl">Reportes</h1>
                    <i class="fa-solid fa-angle-right"></i>
                    <h2 class="font-roboto text-text-1/50 font-black sm:text-lg text-base">Crear reporte</h2>
                </div>

                <a href="{{ route('home') }}" 
                class="inline-flex items-center gap-x-1 text-sm sm:text-base font-semibold text-text-1 border-b border-transparent hover:border-text-1">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Volver</span>
                </a>
            </div>

            <div class="flex flex-1 items-start justify-center">
                <div class="w-full max-w-4xl">
                    
                    <!-- Card Principal -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl shadow-xl border border-slate-700/50 overflow-hidden">
                        
                        <!-- Header del formulario -->
                        <div class="bg-gradient-to-r from-main-1/80 to-main-2 px-2 py-1 md:px-3 md:py-2">
                            <div class="flex items-center gap-3">
                                <div class="bg-white/20 rounded-lg p-2 sm:p-3 flex items-center justify-center">
                                    <i class="fa-solid fa-file-circle-exclamation text-white text-base sm:text-lg"></i>
                                </div>
                                <div>
                                    <h1 class="font-roboto text-white font-bold text-base sm:text-lg tracking-wide">REPORTE DE INCIDENCIA</h1>
                                    <p class="text-main-3 text-xs sm:text-sm">Complete todos los campos requeridos</p>
                                </div>
                            </div>
                        </div>

                        
                        <!-- Datos del reportante -->
                        <div class="p-4 sm:p-6 md:p-8  ">

                            <div class="mb-8">
                                <div class="flex items-center gap-2 mb-2 sm:mb-3 md:mb-4">
                                    <h2 class="text-white font-bold text-base font-montserrat">Datos del Reportante</h2>
                                </div>
                                <div class="bg-slate-900/50 rounded-xl px-4 py-3 border border-slate-700/50 font-roboto">
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                                        <div class="flex flex-col text-left w-full md:w-auto">
                                            <span class="text-slate-400 text-xs font-medium mb-0 uppercase tracking-wide">Nombre Completo</span>
                                            <span class="text-sm">{{ $user['apellidos'] . ' ' . $user['nombres']}}</span>
                                        </div>
                                        <div class="flex flex-col text-left w-full md:w-auto">
                                            <span class="text-slate-400 text-xs font-medium mb-0 uppercase tracking-wide">Correo Electrónico</span>
                                            <span class="text-sm">{{ $user['email'] }}</span>
                                        </div>
                                        <div class="flex flex-col text-left w-full md:w-auto">
                                            <span class="text-slate-400 text-xs font-medium mb-0 uppercase tracking-wide">Teléfono</span>
                                            <span class="text-sm">{{ $user['telefono'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulario de Incidencia -->
                            <div>
                                <div class="flex items-center gap-2 mb-2 sm:mb-3 md:mb-4">
                                    <h2 class="text-white font-bold text-base font-montserrat">Detalles de la Incidencia</h2>
                                </div>

                                <form action="{{route('reportes.guardar')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                    @csrf
                                    @method('POST')
                                    
                                    <!-- Grid para Área y Severidad -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-5 md:gap-7">
                                        <!-- Área -->
                                        <div>
                                            <label class="block text-slate-300 font-semibold mb-1 sm:mb-2 text-sm">
                                                <i class="fa-solid fa-location-dot text-blue-400 mr-2"></i>Área
                                            </label>
                                            <select name="area" class="font-roboto w-full bg-slate-900/70 border border-slate-600 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all focus:bg-slate-800">
                                                <option selected value="" class="text-slate-400 text-xs">Selecciona el área</option>
                                                @foreach ($areas as $area)         
                                                    <option class="text-xs" value="{{ $area['id'] }}" {{ old('area') == $area['id'] ? 'selected' : '' }}>{{$area['nombre']}}</option>
                                                @endforeach
                                            </select>
                                            @error('area')
                                                <span class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                                    <i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Severidad -->
                                        <div>
                                            <label class="block text-slate-300 font-semibold mb-1 sm:mb-2 text-sm">
                                                <i class="fa-solid fa-gauge-high text-blue-400 mr-2"></i>Severidad
                                            </label>
                                            <select name="severidad" class="font-roboto w-full bg-slate-900/70 border border-slate-600 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all focus:bg-slate-800">
                                                <option selected value="" class="text-slate-400 text-xs">Selecciona la severidad</option>
                                                @php
                                                    $colores = ['text-green-400', 'text-blue-400', 'text-yellow-400', 'text-orange-400', 'text-red-400'];
                                                @endphp
                                                @foreach ($severidades as $index => $severidad)
                                                    @php
                                                        $text_color = $colores[$index] ?? 'text-slate-400';
                                                    @endphp
                                                    <option value="{{ $severidad['id'] }}" {{ old('severidad') == $severidad['id'] ? 'selected' : '' }} class="{{ $text_color }} text-xs">
                                                        {{ $severidad['nombre'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('severidad')
                                                <span class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                                    <i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Título -->
                                    <div>
                                        <label class="block text-slate-300 font-semibold mb-1 sm:mb-2 text-sm">
                                            <i class="fa-solid fa-quote-left text-blue-400 mr-2"></i>Título de la incidencia
                                        </label>
                                        <input name="titulo" type="text" value="{{ old('titulo') }}" autocomplete="off"
                                            class="font-roboto w-full bg-slate-900/70 border border-slate-600 rounded-lg px-3 py-2 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                                            placeholder="Ej: Falla en proyector del aula 4">
                                        @error('titulo')
                                            <span class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                                <i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Descripción -->
                                    <div>
                                        <label class="block text-slate-300 font-semibold mb-1 sm:mb-2 text-sm">
                                            <i class="fa-solid fa-align-left text-blue-400 mr-2"></i>Descripción detallada
                                        </label>
                                        <textarea name="descripcion" 
                                            class="font-roboto w-full bg-slate-900/70 border border-slate-600 rounded-lg px-3 py-2 text-white text-sm placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all resize-none" 
                                            rows="4" 
                                            placeholder="Describa la incidencia con el mayor detalle posible...">{{ old('descripcion') }}</textarea>
                                        @error('descripcion')
                                            <span class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                                <i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Fotos -->
                                    <div>
                                        <label class="block text-slate-300 font-semibold mb-1 sm:mb-2 text-sm">
                                            <i class="fa-solid fa-camera text-blue-400 mr-2"></i>Evidencia fotográfica 
                                            <span class="text-slate-500 font-normal">(opcional)</span>
                                        </label>
                                        <div class="relative">
                                            <input 
                                                name="fotos[]"
                                                type="file" 
                                                multiple 
                                                accept=".jpg,.jpeg,.png"
                                                class="w-full bg-slate-900/70 border-2 border-dashed border-slate-600 rounded-lg px-3 py-5 text-slate-300 text-xs sm:text-sm
                                                file:mr-4 file:py-2 file:px-3 sm:file:py-2 sm:file:px-4 file:rounded-lg file:border-0 file:text-xs sm:file:text-sm file:font-semibold 
                                                file:bg-blue-500 file:text-white hover:file:bg-blue-600 file:transition-colors file:cursor-pointer
                                                focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all cursor-pointer"
                                            />
                                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-500">
                                                <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                            </div>
                                        </div>
                                        <p class="text-slate-500 text-xs mt-2">Formatos aceptados: JPG, JPEG, PNG</p>
                                        @error('fotos.*')
                                            <span class="text-red-400 text-xs mt-1 flex items-center gap-1">
                                                <i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Botón de envío -->
                                    <div class="flex justify-end pt-4">
                                        <button type="submit" class="group relative inline-flex items-center gap-5 
                                                bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 
                                                text-white text-sm sm:text-base font-semibold px-4 py-1.5 md:px-5 md:py-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                                            <i class="fa-solid fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                                            <span>Enviar Reporte</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
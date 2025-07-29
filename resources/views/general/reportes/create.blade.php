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

            <div class="flex flex-1 items-center justify-center mt-4">
                <div class="w-full max-w-md p-4 sm:p-6 font-roboto rounded-lg border-1 h-[calc(100vh-15rem)] sm:h-full
                    light:shadow-md dark:bg-slate-900 light:bg-slate-50 dark:border-slate-600 light:border-slate-400 dark:text-slate-400 light:text-slate-600">

                    <h1 class="font-roboto text-main-2 font-extrabold text-center tracking-[0.25em] text-lg mb-2 sm:mb-3">REPORTE DE INCIDENCIA</h1>

                    <h2 class="text-main-3 font-bold text-base font-montserrat">Datos del reportante</h2>
                    <div class="flex flex-col px-2 text-sm mb-4">
                        <label><span class="font-semibold text-text-1">Nombre:</span> {{ $user['apellidos'] . ' ' . $user['nombres']}}</label>
                        <label><span class="font-semibold text-text-1">Correo:</span> {{ $user['email'] }}</label>
                        <label><span class="font-semibold text-text-1">Núm. teléfono:</span> {{ $user['telefono'] }}</label>
                    </div>

                    <h2 class="text-main-3 font-bold text-base font-montserrat">Incidencia</h2>
                    <div class="flex flex-col px-2 font-roboto">
                        <form action="{{route('reportes.guardar')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="text-sm">
                                <label class="font-semibold text-text-1">Área:</label>
                                <select name="area" class="border-1 rounded-sm dark:bg-slate-900 light:bg-slate-50 text-xs">
                                    <option selected value="" class="text-text-1/90">Selecciona el área</option>
                                    @foreach ($areas as $area)         
                                        <option value="{{ $area['id'] }}" {{ old('area') == $area['id'] ? 'selected' : '' }}>{{$area['nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('area')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <div class="mt-1 text-sm">
                                <label class="font-semibold text-text-1">Severidad:</label>
                                <select name="severidad" class="border-1 rounded-sm dark:bg-slate-900 light:bg-slate-50 text-xs">
                                    <option selected value="" class="text-text-1/90">Selecciona la severidad</option>
                                    @php
                                        // En caso de aumentar las severidades en el futuro, agregar aquí los nuevos colores
                                        $colores = ['text-green-400', 'text-blue-400', 'text-yellow-400', 'text-orange-400', 'text-red-400'];
                                    @endphp

                                    @foreach ($severidades as $index => $severidad)
                                        @php
                                            $text_color = $colores[$index] ?? 'text-slate-400';
                                        @endphp
                                        <option value="{{ $severidad['id'] }}" {{ old('severidad') == $severidad['id'] ? 'selected' : '' }} class="{{ $text_color }}">
                                            {{ $severidad['nombre'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('severidad')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="mt-1 text-sm w-full flex items-center gap-2">
                                <label class="font-semibold text-text-1 whitespace-nowrap">Título:</label>
                                <input name="titulo" type="text" value="{{ old('titulo') }}" autocomplete="off"
                                    class="border-1 rounded-sm text-xs py-1 px-2 w-full"
                                    placeholder="Ej: Falla en proyector del aula 4">
                            </div>
                            @error('titulo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="flex flex-col mt-1 text-sm">
                                <label class="font-semibold text-text-1">Descripcion:</label>
                                <textarea name="descripcion" class="border-1 rounded-sm text-xs bg-transparent p-2 h-20 resize-none">{{ old('descripcion') }}</textarea>
                            </div>
                            @error('descripcion')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="mt-2 text-sm">
                                <label class="font-semibold text-text-1">Foto(s) de la incidencia (opcional):</label>
                                <input 
                                    name ="fotos[]"
                                    type="file" 
                                    multiple 
                                    accept=".jpg,.jpeg,.png"
                                    class="block w-full text-sm text-text-1 file:mr-4 file:py-1 file:px-3 file:rounded-md file:text-xs file:font-semibold 
                                    dark:file:bg-slate-800 dark:file:text-white dark:hover:file:bg-slate-700
                                    light:file:bg-slate-400 light:file:text-black light:hover:file:bg-slate-300"
                                />
                            </div>
                            @error('fotos.*')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <div class="flex justify-center mt-8">
                                <button type="submit" class="font-medium bg-blue-500 rounded-md px-2 py-1 text-sm text-white hover:bg-blue-400">Enviar reporte</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
<x-app-layout class="">
    <div class="flex flex-col items-center justify-center w-full h-full">
        <h1 class="text-green-400 mb-5 text-xl font-roboto ">Crear reporte</h1>
        <div class="p-2 text-gray-400">

            <h2 class="text-blue-300 font-bold text-lg font-montserrat">Datos del reportante</h2>
            <div class="flex flex-col px-2 font-roboto">
                <label><span class="font-semibold text-white">Nombre:</span> {{ $user['apellidos'] . ' ' . $user['nombres']}}</label>
                <label><span class="font-semibold text-white">Correo:</span> {{ $user['email'] }}</label>
                <label><span class="font-semibold text-white">Núm. teléfono:</span> {{ $user['telefono'] }}</label>
            </div>

            <h2 class="text-blue-300 font-bold text-lg mt-3 font-montserrat">Incidencia</h2>
            <div class="flex- flex-col px-2 font-roboto">
                <form action="{{route('reportes.guardar')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="">
                        <label class="font-semibold text-white">Área:</label>
                        <select name="area" class="border-1 rounded-sm bg-slate-900 text-xs">
                            <option selected value="">Selecciona el área</option>
                            @foreach ($areas as $area)         
                                <option value="{{ $area['id'] }}" {{ old('area') == $area['id'] ? 'selected' : '' }}>{{$area['nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('area')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="mt-1">
                        <label class="font-semibold text-white">Severidad:</label>
                        <select name="severidad" class="border-1 rounded-sm bg-slate-900 text-xs">
                            <option selected value="">Selecciona la severidad</option>
                            @php
                                // En caso de aumentar las severidades en el futuro, agregar aquí los nuevos colores
                                $colores = ['green', 'blue', 'yellow', 'orange', 'red'];
                            @endphp

                            @foreach ($severidades as $index => $severidad)
                                @php
                                    $color = $colores[$index] ?? 'slate';
                                @endphp
                                <option value="{{ $severidad['id'] }}" {{ old('severidad') == $severidad['id'] ? 'selected' : '' }} class="text-{{ $color }}-400">
                                    {{ $severidad['nombre'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('severidad')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="mt-1">
                        <label class="font-semibold text-white">Título:</label>
                        <input name="titulo" type="text" value="{{ old('titulo') }}" class="border-1 rounded-sm text-xs py-1 w-60 px-2" placeholder="Ej: Falla en proyector del aula 4">
                    </div>
                    @error('titulo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="flex flex-col mt-1">
                        <label class="font-semibold text-white">Comentario:</label>
                        <textarea name="comentario" class="border-1 rounded-sm bg-slate-900 text-xs p-2 h-20 resize-none">{{ old('comentario') }}</textarea>
                    </div>
                    @error('comentario')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="mt-2">
                        <label class="font-semibold text-white">Foto(s) de la incidencia (opcional):</label>
                        <input 
                            name ="fotos[]"
                            type="file" 
                            multiple 
                            accept=".jpg,.jpeg,.png"
                            class="block w-full text-sm text-white file:mr-4 file:py-1 file:px-3 file:rounded-md file:text-xs file:font-semibold file:bg-slate-800 file:text-white hover:file:bg-slate-700"
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
    
</x-app-layout>

<!-- Success modal -->
<x-success-modal/>

<!-- Error modal -->
<x-error-modal/>
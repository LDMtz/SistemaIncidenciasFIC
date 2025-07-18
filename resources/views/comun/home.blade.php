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
                <form action="">
                    <div class="">
                        <label class="font-semibold text-white">Área:</label>
                        <select class="border-1 rounded-sm bg-slate-900 text-xs">
                            <option selected value="">Selecciona el área</option>
                            @foreach ($areas as $area)         
                                <option value="{{$area['id']}}">{{$area['nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-1">
                        <label class="font-semibold text-white">Severidad:</label>
                        <select class="border-1 rounded-sm bg-slate-900 text-xs">
                            <option selected value="">Selecciona la severidad</option>
                            <option value="1" class="text-green-400">Sugerencia</option>
                            <option value="2" class="text-blue-400">Baja</option>
                            <option value="3" class="text-yellow-400">Media</option>
                            <option value="4" class="text-orange-400">Alta</option>
                            <option value="5" class="text-red-400">Crítica</option>
                        </select>
                    </div>
                    <div class="mt-1">
                        <label class="font-semibold text-white">Título:</label>
                        <input type="text" class="border-1 rounded-sm text-xs py-1 w-60 px-2" placeholder="Ej: Falla en proyector del aula 4">
                    </div>
                    <div class="flex flex-col mt-1">
                        <label class="font-semibold text-white">Comentario:</label>
                        <textarea class="border-1 rounded-sm bg-slate-900 text-xs p-2 h-20 resize-none"></textarea>
                    </div>
                    <div class="mt-2">
                        <label class="font-semibold text-white">Foto(s) de la incidencia (opcional):</label>
                        <input 
                            type="file" 
                            multiple 
                            accept="image/*"
                            class="block w-full text-sm text-white file:mr-4 file:py-1 file:px-3 file:rounded-md file:text-xs file:font-semibold file:bg-slate-800 file:text-white hover:file:bg-slate-700"
                        />
                    </div>
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
<x-app-layout>
    <div class="flex w-full">
        <x-sidebar rol="Comun"/>

        <!-- container -->
        <div class="mx-6 lg:mx-10 flex-1 overflow-auto">
                <h1>HOME DEL USUARIO <span class="text-green-400">Común</span></h1>
                <a href="{{route("reportes.mostrar", 1)}}" class="underline text-orange-400">Ver reporte (prueba)</a><br>
                <a href="{{route("reportes.crear")}}" class="underline text-orange-400">Crear reporte (prueba)</a>
        </div>
        
    </div>
</x-app-layout>
<x-app-layout class="">
    <div class="flex flex-col items-center justify-center w-full h-full">
        <a href="{{route("reportes.mostrar", 1)}}" class="underline text-orange-400">Ver reporte (prueba)</a>
        <a href="{{route("reportes.crear")}}" class="underline text-orange-400">Crear reporte (prueba)</a>
    </div>
    
</x-app-layout>

<!-- Success modal -->
<x-success-modal/>

<!-- Error modal -->
<x-error-modal/>
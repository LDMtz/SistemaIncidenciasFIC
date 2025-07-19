<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Acceso no autorizado</title>
    @vite('resources/css/app.css') <!-- TailwindCss-->
</head>
<body class="bg-slate-900 flex items-center justify-center h-screen font-roboto">
        <div class="text-center">
            <h1 class="text-7xl sm:text-8xl md:text-9xl font-bold text-blue-500">404</h1>
            <p class="text-2xl sm:text-3xl md:text-4xl mt-3 font-semibold text-blue-300">No encontrado</p>
            <p class="text-sm sm:text-base md:text-lg mt-3 text-slate-300">La página que buscas no existe</p>

            <a href="{{ url()->previous() }}" class="inline-block mt-6 bg-blue-600 text-white 
                px-3 py-1 text-xs sm:text-sm md:text-base rounded-md hover:bg-blue-700 transition">
                Volver atrás
            </a>
        </div>

</body>
</html>


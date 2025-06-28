<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de incidencias - Facultad de Informática Culiacán</title>
    @vite('resources/css/app.css') <!-- TailwindCss-->
    @vite('resources/js/header-scripts.js')
</head>
<body class="bg-bg-main flex flex-col min-h-screen" data-theme="dark">
    <x-logout-modal/>
    <x-header />
    <main class="flex-grow flex py-6 text-text-1">
        {{$slot}}
    </main>
    <x-footer />
    @stack('scripts')

</body>
</html>


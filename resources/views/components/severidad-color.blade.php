@props(['severidad'])

@php
    $colores = [
        'Sugerencia' => 'text-green-400',
        'Baja'       => 'text-blue-400',
        'Media'      => 'text-yellow-400',
        'Alta'       => 'text-orange-400',
        'Crítica'    => 'text-red-400',
    ];

    $color = $colores[$severidad] ?? 'text-gray-400';
@endphp

<span class="{{ $color }}">
    {{ $severidad }}
</span>
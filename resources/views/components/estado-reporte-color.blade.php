@props(['estado'])

@php
    $colores = [
        'Recibido'    => 'text-blue-400',
        'En proceso'  => 'text-yellow-400',
        'Resuelto'    => 'text-green-400',
        'Cancelado'   => 'text-red-400',
        'Pospuesto'   => 'text-gray-400',
    ];

    $color = $colores[$estado] ?? 'text-gray-400';
@endphp

<span class="{{ $color }}">
    {{ $estado }}
</span>
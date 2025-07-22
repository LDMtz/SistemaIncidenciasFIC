@php
    $type = class_basename($notification->type);
@endphp

@switch($type)

    @case('CambioRolNotification')
        <x-notifications.cambio-rol :notification="$notification" />
        @break
    
    @case('AreaAsignadaNotification')
        <x-notifications.area-asignada :notification="$notification" />
        @break

    @default
        <div class="p-2 bg-red-400 text-sm font-semibold text-white rounded">Notificación desconocida</div>

@endswitch
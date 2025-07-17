@php
    $type = class_basename($notification->type);
@endphp

@switch($type)

    @case('CambioRolNotification')
        <x-notifications.cambio-rol :notification="$notification" />
        @break

    @default
        <div class="p-4 bg-gray-100 text-sm text-gray-600 rounded">Notificación desconocida</div>

@endswitch
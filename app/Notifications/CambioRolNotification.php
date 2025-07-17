<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class CambioRolNotification extends Notification
{
    use Queueable;

    private $user;
    private $rol;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, Rol $rol)
    {
        $this->user = $user;
        $this->rol = $rol;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'titulo' => 'Tu rol de usuario ha sido cambiado',
            'user_id' => $this->user->id,
            'rol' => mb_strtoupper($this->rol->nombre),
            'icono' => 'fa-solid fa-bookmark',
        ];
    }
}

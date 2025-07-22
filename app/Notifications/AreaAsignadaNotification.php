<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\User;
use App\Models\Area;

class AreaAsignadaNotification extends Notification
{
    use Queueable;

    private $user;
    private $area;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, Area $area)
    {
        $this->user = $user;
        $this->area = $area;
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
            'titulo' => 'Te han asignado un área',
            'user_id' => $this->user->id,
            'area' => $this->area->nombre,
            'icono' => 'fa-solid fa-location-dot',
        ];
    }
}

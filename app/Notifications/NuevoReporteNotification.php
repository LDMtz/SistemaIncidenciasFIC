<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Reporte;

class NuevoReporteNotification extends Notification
{
    use Queueable;

    protected $reporte;

    /**
     * Create a new notification instance.
     */
    public function __construct(Reporte $reporte)
    {
        $this->reporte = $reporte;
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
        //Si el que recibe la notificacion es admin
        $isAdmin = $notifiable->rol->nombre === 'Administrador'; 

        return [
            'titulo' => $isAdmin 
                ? 'Nuevo reporte en un área sin encargados' 
                : 'Has recibido un nuevo reporte en tu área',
            'mensaje' => $isAdmin 
                ? 'Se ha creado un nuevo reporte para el área: '
                : 'Tienes un nuevo reporte asignado en el área: ',
            'area' => $this->reporte->area->nombre,
            'titulo_reporte' => $this->reporte->titulo,
            'reporte_id' => $this->reporte->id,
            'icono' => 'fa-solid fa-file-circle-exclamation',
        ];
    }
}

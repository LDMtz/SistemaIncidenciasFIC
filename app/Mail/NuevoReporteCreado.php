<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Reporte;

class NuevoReporteCreado extends Mailable
{
    use Queueable, SerializesModels;

    public Reporte $reporte;

    /**
     * Create a new message instance.
     */
    public function __construct(Reporte $reporte)
    {
        $this->reporte = $reporte;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo Reporte Creado',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $r = $this->reporte;

    return new Content(
        htmlString: <<<HTML
                <h1>Nuevo reporte creado</h1>

                <p>
                    Se ha creado un nuevo reporte en el sistema y ha sido asignado a usted para su seguimiento.
                </p>

                <p><strong>Folio:</strong> {$r->folio}</p>
                <p><strong>Área:</strong> {$r->area->nombre}</p>
                <p><strong>Severidad:</strong> {$r->severidad->nombre}</p>

                <hr>

                <h2>Detalles del reporte</h2>
                <p><strong>Título:</strong> {$r->titulo}</p>
                <p><strong>Descripción:</strong><br>{$r->descripcion}</p>

                <hr>

                <h2>Información del reportante</h2>
                <p><strong>Reportado por:</strong> {$r->usuario->nombres} {$r->usuario->apellidos}</p>
                <p><strong>Fecha de creación:</strong> {$r->created_at->format('d/m/Y H:i')}</p>

                <br>
                <p>
                    Ingrese al sistema para revisar el reporte y dar el seguimiento correspondiente.
                </p>

                <p style="font-size:12px; color:#666;">
                    Este correo es informativo, no es necesario responderlo.
                </p>
            HTML
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

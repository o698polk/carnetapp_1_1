<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;
class EnviarCorreo extends Mailable
{
   

    /**
     * Create a new message instance.
     */
    use Queueable, SerializesModels;
    public $dato;



    public function __construct($id)
    {
    $this->dato = Usuario::findOrFail($id);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Enviar Correo',
        );
    }
   public function build()
    {
        return $this->view('usuarios.correoenviar')
                    ->with('dato', $this->dato); // Pasamos la variable $dato a la vista
    }

    /**
     * Get the message content definition.
     */
    
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

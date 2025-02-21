<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificacionCompra extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $plainPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $plainPassword)
    {
        $this->usuario = $usuario;
        $this->plainPassword = $plainPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Verificación de Compra y Registro')
                    ->view('emails.verificacion_compra'); // Asume que crearás una vista en resources/views/emails/verificacion_compra.blade.php
    }
}

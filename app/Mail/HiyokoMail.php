<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HiyokoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $product;
    /**
     * Create a new message instance.
     */
    public function __construct($user,$product)
    {
        $this->user = $user;
        $this->product = $product;

        // dd($this->user,$this->product);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope( subject: 'Hiyoko Mail',);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content( view: 'email.hiyoko',);
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

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportTicket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private string $title, private string  $body)
    {
    }

    /**
     * This function constructs and returns the Envelope for the support ticket email,
    *  specifying the subject of the email.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'FoneWorx Support Ticket',
        );
    }

    /**
     * This function constructs and returns the Content for the support ticket email,
    * specifying the email view and the data to be passed to the view.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email',
            with: [
                'title' => $this->title,
                'body' => $this->body,
            ],
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

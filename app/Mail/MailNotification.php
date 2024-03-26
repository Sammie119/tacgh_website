<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];
    public $mailType;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $mailType)
    {
        $this->data = $data;
        $this->mailType = $mailType;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        switch ($this->mailType) {
            case 'contact':
                $view = 'mail.contact_mail';
                break;
            case 'prayer':
                $view = 'mail.prayer_mail';
                break;
            case 'testimony':
                $view = 'mail.testimony_mail';
                break;
        }

        return new Content(
            markdown: $view,
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

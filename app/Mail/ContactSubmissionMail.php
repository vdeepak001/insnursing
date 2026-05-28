<?php

namespace App\Mail;

use App\Models\ContactQuery;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactQuery $contactQuery
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Inquiry: ' . $this->contactQuery->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-submission',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

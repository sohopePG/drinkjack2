<?php

namespace App\Mail;

use App\Models\DrinkRequest;
use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ParticipantMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $participant;

    /**
     * Create a new message instance.
     */
    public function __construct(Participant $newparticipant)
    {
        $this->participant = $newparticipant;
    }

    public function build()
    {
        $subject = $this->participant->recruitment->title.'に'.$this->participant->user->name.'さんが参加しました';

        return $this->from('drinkjack@email.com', 'Drink Jack')
        ->to($this->participant->user->email)
            ->subject($subject)
            ->view('emails.recruitment_mail')
            ->with([
                'participant' => $this->participant,
            ]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.recruitment_mail',
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

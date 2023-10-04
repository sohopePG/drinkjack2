<?php

namespace App\Mail;

use App\Models\DrinkRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DrinkRequestMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $drinkRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(DrinkRequest $drinkRequest)
    {
        $this->drinkRequest = $drinkRequest;
    }

    public function build()
    {
        return $this->from('drinkjack@email.com', 'Drink Jack')
            ->to($this->drinkRequest->receiver->email)
            ->subject('飲みの依頼が届きました!')
            ->view('emails.request_receive_email')
            ->with([
                'drinkRequest' => $this->drinkRequest,
            ]);
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

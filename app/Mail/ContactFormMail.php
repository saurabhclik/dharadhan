<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from($this->data['email'])
                    ->replyTo($this->data['email'])
                    ->subject("Contact Form - " . config('app.name') . " Site")
                    ->view('emails.contact')
                    ->with([
                        'firstname' => $this->data['name'],
                        'lastname'  => $this->data['lastname'],
                        'email'     => $this->data['email'],
                        'content'   => $this->data['message'],
                    ]);
    }
}

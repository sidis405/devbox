<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyPostWasUpdatedMail extends Mailable
{
    public $post;
    public $recipient;
    public $sender;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post, $recipient, $sender)
    {
        $this->post = $post;
        $this->recipient = $recipient;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.post-was-updated')->subject("A post was updated on [blog].");
    }
}

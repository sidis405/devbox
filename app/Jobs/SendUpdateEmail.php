<?php

namespace App\Jobs;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyPostWasUpdatedMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendUpdateEmail implements ShouldQueue
{
    protected $post;
    protected $recipient;
    protected $sender;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(Post $post, User $recipient, User $sender)
    {
        $this->post = $post;
        $this->recipient = $recipient;
        $this->sender = $sender;
    }

    public function handle()
    {
        Mail::to($this->recipient)->send(new NotifyPostWasUpdatedMail($this->post, $this->recipient, $this->sender));
    }
}

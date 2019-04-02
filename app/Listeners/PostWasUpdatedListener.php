<?php

namespace App\Listeners;

use App\User;
use App\Jobs\SendUpdateEmail;
use App\Events\PostWasUpdated;

class PostWasUpdatedListener
{
    public function handle(PostWasUpdated $event)
    {
        $post = $event->post;
        $currentUser = auth()->user();
        $admin = User::where('role', 'admin')->firstOrFail();

        if ($post->wasAuthoredBy($currentUser) && $currentUser->isNotAdmin()) {
            $sender = $post->user;
            $recipient = $admin;
        }

        if ($post->wasNotAuthoredBy($currentUser) && $currentUser->isAdmin()) {
            $sender = $admin;
            $recipient = $post->user;
        }

        if (! ($post->wasAuthoredBy($currentUser) && $currentUser->isAdmin())) {
            SendUpdateEmail::dispatch($post, $recipient, $sender);
        }
    }
}

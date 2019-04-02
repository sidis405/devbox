@component('mail::message')
# Hello {{ $recipient->name }}

The post <em>"{{ $post->title }}"</em> was updated by {{ $sender->name }}.

@component('mail::button', ['url' => route('posts.show', $post)])
See updated version of post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

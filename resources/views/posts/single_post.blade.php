<div class="card">
    <div class="card-header">
        <h5><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h5>
        <small>
            by <strong>{{ $post->user->name }}</strong>
            on <strong>{{ $post->category->name }}</strong>
        </small>
    </div>
    <div class="card-body">
        {{ $post->preview }}

        @if($showBody)
            {!! nl2br($post->body) !!}
        @endif
    </div>
    <div class="card-footer">
        <small>
            <em>{{ $post->created_at->format('d/m/Y H:i') }}</em>
        </small>
        <small>
            #tags: {{ $post->tags->pluck('name')->implode(', ') }}
        </small>
    </div>
</div>
        <hr />

<div class="card">
    <div class="card-header">
        <h5><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h5>
        <small>
            by <strong>{{ $post->user->name }}</strong>
            on <strong><a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a></strong>
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}">[ Edit ]</a>
            @endcan
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
            @foreach($post->tagLinks() as $name => $link)
                <a href="{{ $link }}">#{{ $name }}</a>
            @endforeach
        </small>
    </div>
</div>
<hr />

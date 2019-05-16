<div class="card">
    <div class="card-header">Archive</div>
    <div class="card-body">
        <ul>
            @foreach($archive as $monthRecord)
                <li>
                    <a href="{{ route('posts.index') }}?year={{ $monthRecord->year }}&month={{ $monthRecord->month }}">{{ $monthRecord->month }} {{ $monthRecord->year }} ({{ $monthRecord->published }})</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="card">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <ul>
            @foreach($categories as $category)
                <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }} ({{ $category->posts_count}})</a></li>
            @endforeach
        </ul>
    </div>
</div>

<div class="card">
    <div class="card-header">Tags</div>
    <div class="card-body">
            @foreach($tags as $tag)
                <a style="font-size: {{ $tag->posts_count * 1.2}}px" href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a>
            @endforeach
    </div>
</div>

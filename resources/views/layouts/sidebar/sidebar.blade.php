<div class="card">
    <div class="card-header">{{ __('blog.archive') }}</div>
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

<categories
    :title="{{ json_encode(__('blog.categories')) }}"
    :categories="{{ json_encode($categories) }}">
</categories>

<tags
     :title="{{ json_encode(__('blog.tags')) }}"
     :tags="{{ json_encode($tags) }}">
</tags>

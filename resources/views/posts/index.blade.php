@extends('layouts.app')

@section('content')

    <h4>Latest posts ({{ $posts->total() }})</h4>

    @foreach($posts as $post)

        @include('posts.single_post', ['showBody' => false])

    @endforeach

    {{ $posts->links() }}

@endsection

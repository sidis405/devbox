@extends('layouts.app')

@section('content')

    <h4>Posts categorised as {{ $category->name }} ({{ $posts->total() }})</h4>

    @foreach($posts as $post)

        @include('posts.single_post', ['showBody' => false])

    @endforeach

    {{ $posts->links() }}

@endsection

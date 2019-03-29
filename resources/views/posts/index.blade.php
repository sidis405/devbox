@extends('layouts.app')

@section('content')
    @foreach($posts as $post)

        @include('posts.single_post', ['showBody' => false])

    @endforeach
@endsection

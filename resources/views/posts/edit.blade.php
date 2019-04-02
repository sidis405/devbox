@extends('layouts.app')

@section('content')

    <h4>Edit {{ $post->title }}</h4>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        @include('posts.form')

        <button type="submit" class="btn btn-warning btn-block">Update</button>

    </form>


@can('delete', $post)
    <hr>

    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endcan


@endsection

@extends('layouts.app')

@section('content')

    @include('posts.single_post', ['showBody' => true])

@endsection

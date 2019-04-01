@extends('layouts.app')

@section('content')

<h4>Create new post</h4>

<form action="{{ route('posts.store') }}" method="POST">

    @csrf

    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Preview</label>
        <textarea class="form-control" name="preview" rows="2"></textarea>
    </div>

    <div class="form-group">
        <label>Body</label>
        <textarea class="form-control" name="body" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label>Tags</label>
        <select name="tags[]" class="form-control" multiple="">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success btn-block">Publish</button>

</form>

@endsection

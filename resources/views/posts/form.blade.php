<div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
    </div>

    <div class="form-group">
        <label>Choose Cover</label>
        <input type="file" name="cover" class="form-control">
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option></option>
            @foreach($categories as $category)
                <option @if($category->id == old('category_id', $post->category_id)) selected="" @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Preview</label>
        <textarea class="form-control" name="preview" rows="2">{{ old('preview', $post->preview) }}</textarea>
    </div>

    <div class="form-group">
        <label>Body</label>
        <textarea class="form-control" name="body" rows="4">{{ old('body', $post->body) }}</textarea>
    </div>

    <div class="form-group">
        <label>Tags</label>
        <select name="tags[]" class="form-control" multiple="">
            @foreach($tags as $tag)
                <option @if(in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray()))) selected="" @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

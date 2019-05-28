<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;

class TagsController extends Controller
{
    public function index()
    {
        return Tag::has('posts')->withCount('posts')->get();
    }

    public function show(Tag $tag)
    {
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_id', $tag->id); // pivot
        })->with('user', 'category', 'tags')->paginate(15);

        return view('tags.show', compact('posts', 'tag'));
    }
}

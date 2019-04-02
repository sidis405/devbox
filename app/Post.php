<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //belognsTo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Accessors - Get.ters - Modifica rappresentazione campo
     */

    // public function getTitleAttribute($title)
    // {
    //     return join('', array_reverse(str_split(strtoupper($title))));
    // }


    /**
     * Mutators - Set.ters
     */

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    /**
     * Functions
     */

    public function tagLinks()
    {
        return $this->tags->flatMap(function ($tag) {
            return [$tag->name => route('tags.show', $tag)];
        });
    }
}

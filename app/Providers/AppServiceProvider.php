<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('posts.form', function ($view) {
            $categories = Category::all();
            $tags = Tag::all();

            return $view->with(compact('categories', 'tags'));
        });

        View::composer('layouts.sidebar.sidebar', function ($view) {
            $categories = Category::has('posts')->withCount('posts')->orderBy('posts_count', 'DESC')->get();
            $tags = Tag::has('posts')->withCount('posts')->get();

            $archive = Post::selectRaw('year(created_at) as year, monthName(created_at) as month, count(id) as published')->groupBy(\DB::raw('year, month'))->orderByRaw('MIN(created_at) DESC')->get();

            //select year(created_at) as year, monthName(created_at), count(id) as published from posts group by 1, 2  order by MIN(created_at)

            return $view->with(compact('categories', 'tags', 'archive'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}

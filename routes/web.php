<?php

Route::get('/', 'PostsController@index');
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

Route::get('/', 'PostsController@index')->name('posts.index');

Route::resource('posts', 'PostsController')->except('index');

Route::get('categories/{category}', 'CategoriesController')->name('categories.show');
Route::get('tags/{tag}', 'TagsController')->name('tags.show');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// REST
// GET--, POST, PUT|PATCH, DELETE--

// Listare tutti i post - index - GET - /posts - PostsController@index - posts.index
// Mostrare un singolo post - show - GET - /posts/{post} - PostsController@show - posts.show
// Mostrare il form di creazione - create - GET - /posts/create - PostsController@create - posts.create
// Salvataggio nuovo post - store - POST - /posts - PostsController@store - posts.store
// Mostrare il form di modifica - edit - GET - /posts/{post}/edit - PostsController@edit - posts.edit
// Aggiornamento post esistente - update - PATCH - /posts/{post} - PostsController@update - posts.update
// Rimozione post - destroy - DELETE - /posts/{post} - PostsController@destroy - posts.destroy

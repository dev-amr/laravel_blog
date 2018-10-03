<?php

use App\Post;



Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/posts/tags/{tag}', 'TagsController@index');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::patch('/post/{post}', 'PostsController@update')->name('post.update');
Route::delete('/posts/{post}', 'PostsController@destroy')->name('post.destroy');
Route::post('/search', 'PostsController@search');

Route::get('/dashboard', 'PostsController@getposts'); //user's posts

//Auth
Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store')->name('login');
Route::get('/logout','SessionsController@destroy');

Route::view('/about', 'layouts.about');
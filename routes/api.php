<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/posts', 'Api\PostController@index')->name('posts.index');
Route::get('/posts/{post:id}', 'Api\PostController@show')->name('posts.show');

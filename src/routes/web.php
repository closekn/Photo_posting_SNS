<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', 'Home\HomeController@index');

// Post
Route::get('/post/{post_id}/favorites', 'Post\PostController@favorites');

// User
Route::get('/user/{user_id}', 'User\UserController@show');

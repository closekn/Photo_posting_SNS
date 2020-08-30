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

// Auth
Route::get('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');
// Github
Route::get('/login/github', 'Auth\LoginController@redirectToProvider');
Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallback');

// Post
Route::get('/', 'Post\PostController@index');
Route::get('/post/create', 'Post\PostController@create');
Route::post('/post', 'Post\PostController@store');
Route::get('/post/{post_id}/favorites', 'Post\PostController@favorites');

// User
Route::get('/user/{user_id}', 'User\UserController@show');

// Favorite
Route::post('/favorite/create', 'Favorite\FavoriteController@create');
Route::post('/favorite/delete', 'Favorite\FavoriteController@delete');

<?php

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


    Route::get('/', 'PostController@index')->middleware('auth');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}/reply', 'ReplyController@reply');
    Route::post('/replies/{post}', 'ReplyController@store');
    Route::get('/likes/like/{post}', 'LikeController@like');
    Route::get('/likes/unlike/{post}', 'LikeController@unlike');
    Route::get('/likes/smart/{post}', 'LikeController@smart');
    Route::get('/likes/unsmart/{post}', 'LikeController@unsmart');
    Route::get('/users/{user}', 'FollowController@showuser');
    Route::get('/users/{user}/follow', 'FollowController@follow');
    Route::get('/users/{user}/unfollow', 'FollowController@unfollow');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

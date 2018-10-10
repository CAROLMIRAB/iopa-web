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


Route::get('home', [
    'as' => 'home',
    'uses' => 'Front\HomeController@home'
]);

Route::get('theme', [
    'as' => 'theme',
    'uses' => 'Front\PostController@viewTheme'
]);


Route::group(['prefix' => 'posts'], function () {

    Route::get('create', [
        'as' => 'create',
        'uses' => 'Front\PostController@viewCreatePost'
    ]);

    Route::get('store', [
        'as' => 'posts.store',
        'uses' => 'Front\PostController@saveCreatePost'
    ]);

});

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {

    Route::get('create', [
        'as' => 'create',
        'uses' => 'Front\PostController@createPost'
    ]);

});

Auth::routes();


Route::get('blog', 'Front\PostController@viewAllPosts')->name('blog');

Route::get('blog/{slug}', 'Front\PostController@viewFullPost')->name('post');


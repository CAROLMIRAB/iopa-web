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
Route::get('', function(){
    return redirect('admin/post/create');
});

Route::get('home', [
    'as' => 'home',
    'uses' => 'Front\HomeController@home'
]);

Route::get('theme', [
    'as' => 'theme',
    'uses' => 'Front\PostController@viewTheme'
]);

Route::get('entradas/{slug}', [
    'as' => 'post.viewpost',
    'uses' => 'Front\PostController@viewFullPost'
]);

Route::get('entradas', [
    'as' => 'post.viewposts',
    'uses' => 'Front\PostController@viewFullPost'
]);


Route::group(['prefix' => 'admin'], function () {
   
 
    Route::get('post/create', [
        'as' => 'post.createview',
        'uses' => 'Back\PostController@viewCreatePost'
    ]);

    Route::post('post/store', [
        'as' => 'post.store',
        'uses' => 'Back\PostController@saveCreatePost'
    ]);

});

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {

    Route::get('create', [
        'as' => 'create',
        'uses' => 'Back\PostController@createPost'
    ]);

});

Auth::routes();


Route::get('blog', 'Front\PostController@viewAllPosts')->name('blog');

Route::get('blog/{slug}', 'Front\PostController@viewFullPost')->name('post');


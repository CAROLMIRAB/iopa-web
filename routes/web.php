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

Route::get('/home', function () {
    return view('home.index');
});

Route::redirect('/', 'blog');

Auth::routes();

Route::get('blog', 'Front\PageController@blog')->name('blog');

Route::get('blog/{slug}', 'Front\PageController@post')->name('post');


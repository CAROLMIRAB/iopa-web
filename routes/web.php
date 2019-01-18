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
    return redirect('admin/post/nuevo');
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


Route::get('entradas/', [
    'as' => 'post.viewposts',
    'uses' => 'Front\PostController@viewFullPost'
]);

Route::get('cirugias/', [
    'as' => 'surgery.viewposts',
    'uses' => 'Front\PostController@viewFullPost'
]);

Route::get('medicos/', [
    'as' => 'medicos.viewposts',
    'uses' => 'Front\PostController@viewFullPost'
]);

Route::group(['prefix' => 'admin'], function () {
   
    Route::get('post/nuevo', [
        'as' => 'post.createview',
        'uses' => 'Back\PostController@viewCreatePost'
    ]);

    Route::get('post/editar/{slug}', [
        'as' => 'post.editview',
        'uses' => 'Back\PostController@viewEditPost'
    ]);


    Route::get('medico/nuevo', [
        'as' => 'doctor.createview',
        'uses' => 'Back\DoctorController@viewCreateDoctor'
    ]);

    Route::get('sucursal/nueva', [
        'as' => 'office.createview',
        'uses' => 'Back\OfficeController@viewCreateOffice'
    ]);

 

    Route::post('post/store', [
        'as' => 'post.store',
        'uses' => 'Back\PostController@saveCreatePost'
    ]);

    Route::post('post/edit', [
        'as' => 'post.edit',
        'uses' => 'Back\PostController@editPost'
    ]);

    Route::post('post/slug-create', [
        'as' => 'post.slug-create',
        'uses' => 'Back\PostController@titleAndSlug'
    ]);

    Route::post('slug/slug-create', [
        'as' => 'core.slug-create',
        'uses' => 'Back\CoreController@titleAndSlug'
    ]);

    Route::get('post/all-posts', [
        'as' => 'post.all-posts',
        'uses' => 'Back\PostController@allPosts'
    ]);

    Route::get('post', [
        'as' => 'post.view-all-posts',
        'uses' => 'Back\PostController@viewAllPosts'
    ]);

    Route::get('doctor/all-doctors', [
        'as' => 'doctor.all-doctors',
        'uses' => 'Back\DoctorController@allDoctors'
    ]);

    Route::get('medicos', [
        'as' => 'doctor.view-all-doctors',
        'uses' => 'Back\DoctorController@viewAllDoctors'
    ]);
    
    Route::get('medicos/editar/', [
        'as' => 'doctor.editview',
        'uses' => 'Back\DoctorController@viewEditDoctor'
    ]);

    Route::post('doctor/edit', [
        'as' => 'doctor.edit',
        'uses' => 'Back\DoctorController@editDoctor'
    ]);

    Route::post('doctor/store', [
        'as' => 'doctor.store',
        'uses' => 'Back\DoctorController@saveCreateDoctor'
    ]);

    Route::post('doctor/store-img', [
        'as' => 'doctor.storeimg',
        'uses' => 'Back\DoctorController@uploadImage'
    ]);

    Route::post('office/store', [
        'as' => 'office.store',
        'uses' => 'Back\OfficeController@saveCreateOffice'
    ]);

    Route::post('office/store-img', [
        'as' => 'office.storeimg',
        'uses' => 'Back\OfficeController@uploadImage'
    ]);

    Route::get('office/find-office', [
        'as' => 'office.find-office',
        'uses' => 'Back\OfficeController@findOffice'
    ]);

    Route::post('surgery/store', [
        'as' => 'surgery.store',
        'uses' => 'Back\SurgeryController@saveCreateSurgery'
    ]);

    Route::post('surgery/edit', [
        'as' => 'surgery.edit',
        'uses' => 'Back\SurgeryController@editSurgery'
    ]);

    Route::post('surgery/slug-create', [
        'as' => 'surgery.slug-create',
        'uses' => 'Back\SurgeryController@titleAndSlug'
    ]);

    Route::get('surgery/all-surgeries', [
        'as' => 'surgery.all-surgeries',
        'uses' => 'Back\SurgeryController@allSurgeries'
    ]);

    Route::get('cirugias', [
        'as' => 'surgery.view-all-surgeries',
        'uses' => 'Back\SurgeryController@viewAllSurgeries'
    ]);

    Route::get('cirugias/nueva', [
        'as' => 'surgery.createview',
        'uses' => 'Back\SurgeryController@viewCreateSurgery'
    ]);

    Route::get('cirugias/editar/{slug}', [
        'as' => 'surgery.editview',
        'uses' => 'Back\SurgeryController@viewEditSurgery'
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


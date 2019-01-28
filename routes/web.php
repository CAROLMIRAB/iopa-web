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
Route::get('', function () {
    return redirect()->route('post.view-all-posts');
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

Route::get('examenes/', [
    'as' => 'exam.viewposts',
    'uses' => 'Front\PostController@viewFullPost'
]);

Route::get('medicos/', [
    'as' => 'doctor.viewposts',
    'uses' => 'Front\PostController@viewFullPost'
]);

Route::get('sucursales/', [
    'as' => 'office.viewposts',
    'uses' => 'Front\PostController@viewFullPost'
]);

Route::group(['prefix' => 'admin'], function () {


    /************** ROUTES POST ******************/
    Route::group(['prefix' => 'noticias'], function () {

        Route::get('', [
            'as' => 'post.view-all-posts',
            'uses' => 'Back\PostController@viewAllPosts'
        ]);

        Route::get('nuevo', [
            'as' => 'post.createview',
            'uses' => 'Back\PostController@viewCreatePost'
        ]);

        Route::get('editar', [
            'as' => 'post.editview',
            'uses' => 'Back\PostController@viewEditPost'
        ]);

        Route::get('all-posts', [
            'as' => 'post.all-posts',
            'uses' => 'Back\PostController@allPosts'
        ]);

        Route::post('store', [
            'as' => 'post.store',
            'uses' => 'Back\PostController@saveCreatePost'
        ]);

        Route::post('edit', [
            'as' => 'post.edit',
            'uses' => 'Back\PostController@editPost'
        ]);

    });


    /************** ROUTES DOCTOR ******************/
    Route::group(['prefix' => 'medicos'], function () {

        Route::get('', [
            'as' => 'doctor.view-all-doctors',
            'uses' => 'Back\DoctorController@viewAllDoctors'
        ]);

        Route::get('all-doctors', [
            'as' => 'doctor.all-doctors',
            'uses' => 'Back\DoctorController@allDoctors'
        ]);

        Route::get('editar', [
            'as' => 'doctor.editview',
            'uses' => 'Back\DoctorController@viewEditDoctor'
        ]);

        Route::get('nuevo', [
            'as' => 'doctor.createview',
            'uses' => 'Back\DoctorController@viewCreateDoctor'
        ]);

        Route::post('edit', [
            'as' => 'doctor.edit',
            'uses' => 'Back\DoctorController@editDoctor'
        ]);

        Route::post('store', [
            'as' => 'doctor.store',
            'uses' => 'Back\DoctorController@saveCreateDoctor'
        ]);

        Route::post('store-img', [
            'as' => 'doctor.storeimg',
            'uses' => 'Back\DoctorController@uploadImage'
        ]);

    });


    /************** ROUTES OFFICE ******************/
    Route::group(['prefix' => 'sucursales'], function () {

        Route::get('', [
            'as' => 'office.view-all-offices',
            'uses' => 'Back\OfficeController@viewAllOffices'
        ]);

        Route::get('all-offices', [
            'as' => 'office.all-offices',
            'uses' => 'Back\OfficeController@allOffices'
        ]);

        Route::get('find-office', [
            'as' => 'office.find-office',
            'uses' => 'Back\OfficeController@findOffice'
        ]);

        Route::get('editar', [
            'as' => 'office.editview',
            'uses' => 'Back\OfficeController@viewEditOffice'
        ]);

        Route::get('nuevo', [
            'as' => 'office.createview',
            'uses' => 'Back\OfficeController@viewCreateOffice'
        ]);

        Route::post('store', [
            'as' => 'office.store',
            'uses' => 'Back\OfficeController@saveCreateOffice'
        ]);

        Route::post('edit', [
            'as' => 'office.edit',
            'uses' => 'Back\OfficeController@editOffice'
        ]);

        Route::post('store-img', [
            'as' => 'office.storeimg',
            'uses' => 'Back\OfficeController@uploadImage'
        ]);
    });



    /************** ROUTES SURGERY ******************/
    Route::group(['prefix' => 'cirugias'], function () {

        Route::get('', [
            'as' => 'surgery.view-all-surgeries',
            'uses' => 'Back\SurgeryController@viewAllSurgeries'
        ]);

        Route::get('all-surgeries', [
            'as' => 'surgery.all-surgeries',
            'uses' => 'Back\SurgeryController@allSurgeries'
        ]);

        Route::get('nueva', [
            'as' => 'surgery.createview',
            'uses' => 'Back\SurgeryController@viewCreateSurgery'
        ]);

        Route::get('editar', [
            'as' => 'surgery.editview',
            'uses' => 'Back\SurgeryController@viewEditSurgery'
        ]);

        Route::post('store', [
            'as' => 'surgery.store',
            'uses' => 'Back\SurgeryController@saveCreateSurgery'
        ]);

        Route::post('edit', [
            'as' => 'surgery.edit',
            'uses' => 'Back\SurgeryController@editSurgery'
        ]);

    });


    /************** ROUTES EXAMS ******************/
    Route::group(['prefix' => 'examenes'], function () {

        Route::get('', [
            'as' => 'exam.view-all-exams',
            'uses' => 'Back\ExamController@viewAllExams'
        ]);

        Route::get('all-exams', [
            'as' => 'exam.all-exams',
            'uses' => 'Back\ExamController@allExams'
        ]);

        Route::get('nueva', [
            'as' => 'exam.createview',
            'uses' => 'Back\ExamController@viewCreateExam'
        ]);

        Route::get('editar', [
            'as' => 'exam.editview',
            'uses' => 'Back\ExamController@viewEditExam'
        ]);

        Route::post('store', [
            'as' => 'exam.store',
            'uses' => 'Back\ExamController@saveCreateExam'
        ]);

        Route::post('edit', [
            'as' => 'exam.edit',
            'uses' => 'Back\ExamController@editExam'
        ]);

    });


    Route::post('slug/slug-create', [
        'as' => 'core.slug-create',
        'uses' => 'Back\CoreController@titleAndSlug'
    ]);

    Route::get('404', [
        'as' => '404',
        'uses' => 'Back\ErrorController@backNotFound'
    ]);

    Route::get('500', [
        'as' => '500',
        'uses' => 'Back\ErrorController@backFatal'
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


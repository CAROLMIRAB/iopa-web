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


Route::get('', [
    'as' => 'home',
    'uses' => 'Front\HomeController@home'
]);

Route::get('theme', [
    'as' => 'theme',
    'uses' => 'Front\PostController@viewTheme'
]);

Route::get('404', [
    'as' => '404',
    'uses' => 'Back\ErrorController@notFound'
]);

Route::get('500', [
    'as' => '500',
    'uses' => 'Back\ErrorController@fatal'
]);

Route::get('entradas/{slug}', [
    'as' => 'post.viewpost',
    'uses' => 'Front\PostController@viewFullPost'
]);

Route::get('sucursales/{slug}', [
    'as' => 'office.viewpost',
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

Route::get('especialidades/', [
    'as' => 'specialty.viewposts',
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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

   

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

        Route::post('change-status', [
            'as' => 'post.change-status',
            'uses' => 'Back\PostController@changeStatus'
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

        Route::post('change-status', [
            'as' => 'doctor.change-status',
            'uses' => 'Back\DoctorController@changeStatus'
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

        Route::get('find-specialty', [
            'as' => 'specialty.find-specialty',
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

        Route::post('change-status', [
            'as' => 'surgery.change-status',
            'uses' => 'Back\SurgeryController@changeStatus'
        ]);
    });

     /************** ROUTES SPECIALTY ******************/
     Route::group(['prefix' => 'especialidades'], function () {

        Route::get('', [
            'as' => 'specialty.view-all-specialties',
            'uses' => 'Back\SpecialtyController@viewAllSpecialties'
        ]);

        Route::get('all-specialties', [
            'as' => 'specialty.all-specialties',
            'uses' => 'Back\SpecialtyController@allSpecialties'
        ]);

        Route::get('nueva', [
            'as' => 'specialty.createview',
            'uses' => 'Back\SpecialtyController@viewCreateSpecialty'
        ]);

        Route::get('editar', [
            'as' => 'specialty.editview',
            'uses' => 'Back\SpecialtyController@viewEditSpecialty'
        ]);

        Route::post('store', [
            'as' => 'specialty.store',
            'uses' => 'Back\SpecialtyController@saveCreateSpecialty'
        ]);

        Route::post('edit', [
            'as' => 'specialty.edit',
            'uses' => 'Back\SpecialtyController@editSpecialty'
        ]);

        Route::post('change-status', [
            'as' => 'specialty.change-status',
            'uses' => 'Back\SpecialtyController@changeStatus'
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

        Route::post('change-status', [
            'as' => 'exam.change-status',
            'uses' => 'Back\ExamController@changeStatus'
        ]);

    });

     /************** ROUTES AGREEMENT ******************/
     Route::group(['prefix' => 'convenios'], function () {

        Route::post('save-ges', [
            'as' => 'agreement.save-ges',
            'uses' => 'Back\AgreementController@saveGes'
        ]);

        Route::post('min-isapre', [
            'as' => 'agreement.min-isapre',
            'uses' => 'Back\AgreementController@unsetIsapre'
        ]);

        Route::post('save-isapre', [
            'as' => 'agreement.save-isapre',
            'uses' => 'Back\AgreementController@saveIsapres'
        ]);

        Route::post('save-subfonasa', [
            'as' => 'agreement.save-subfonasa',
            'uses' => 'Back\AgreementController@saveSubFonasa'
        ]);

        Route::post('min-fonasa', [
            'as' => 'agreement.min-fonasa',
            'uses' => 'Back\AgreementController@unsetFonasa'
        ]);

        Route::get('agreement', [
            'as' => 'agreement.view-agreement',
            'uses' => 'Back\AgreementController@viewAgreement'
        ]);

     });


    Route::post('slug/slug-create', [
        'as' => 'core.slug-create',
        'uses' => 'Back\CoreController@titleAndSlug'
    ]);




});




Auth::routes();

Route::get('blog', 'Front\PostController@viewAllPosts')->name('blog');

Route::get('blog/{slug}', 'Front\PostController@viewFullPost')->name('post');



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

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('roles');

Route::get('/admin', 'Admin\AdminHomeController@index')->name('admin')->middleware('roles');

Route::get('/student/{id}', 'RolesController@roles_welcome')->name('student');

Route::get('/student', 'RolesController@studentRoles')->name('studentRoles');

Route::get('/homepage/{roles}', 'RolesController@rolesHome')->name('homepage')->middleware('roles');

Route::get('/account', 'InfoPersonController@homeAccount')->name('account');

Route::get('/editAdminAccount/{id}', 'Admin\AdminInfoController@openEditAdminInfo')->name('openEdit');

Route::get('/adminAccount', 'Admin\AdminInfoController@viewAdmins')->name('adminAccount');

Route::get('/info', 'InfoPersonController@viewInfo')->name('info');

Route::get('/lecture', 'Lectures\StudentLecturesController@lectureIndex')->name('lecture');

Route::get('/lectures', 'Lectures\LectureController@infoLectures')->name('lectures');

Route::get('/adminLecture', 'Lectures\LectureController@adminLecture')->name('adminLecture');

Route::get('/subjects', 'Subject\SubjectController@indexSubject')->name('subjects');

Route::get('/updateSubjects/{id}', 'Admin\SubjectAdminController@SubjectsUpdateIndex')->name('updateSubjects');

Route::get('/updateTest', 'Testing\TestingController@updateTestIndex')->name('updateTest');

Route::get('/editLecture/{id}', 'Lectures\LectureController@LectureEditIndex')->name('editLecture');

Route::get('/viewLecture/{id}', 'Lectures\LectureController@lectureInform')->name('lectureInform');

Route::get('/studentLectures/{id}', 'Lectures\StudentLecturesController@lectureView')->name('lectureView');

Route::get('/testing', 'Testing\TestingController@TestingIndex')->name('testing');

Route::get('/allTest', 'Testing\TestingController@allTestIndex')->name('allTest');

Route::get('/deleteSubject/{id}', 'Subject\SubjectController@deleteSubject')->name('deleteSubject');

Route::get('/deleteTest/{id}', 'Testing\TestingController@deleteTest')->name('deleteTest');

Route::get('/editTests/{id}', 'Testing\TestingController@updateTestIndex')->name('updateTests');

Route::get('/testView/{id}', 'Testing\TestingController@testingView')->name('testView');

Route::get('/deleteLecture/{id}', 'Lectures\LectureController@deleteLecture')->name('deleteLecture');

Route::get('/deleteInfo/{id}', 'Admin\AdminInfoController@deleteAdminInfo')->name('deleteInfo');

Route::get('/deleteAccount/{id}', 'Admin\AdminInfoController@deleteAccount')->name('deleteAccount');

Route::get('/studentResults', 'Testing\TestingController@showResults')->name('studentResults');

Route::post('/index', 'RolesController@insertRoles')->name('index');

Route::post('/info', 'InfoPersonController@addInfo');

Route::post('/adminInfo', 'Admin\AdminInfoController@addAdmins')->name('adminInfo');

Route::post('/editAdminAccount/{id}', 'Admin\AdminInfoController@updateInfoAdmin')->name('editAdminAccount');

Route::post('/addLecture', 'Lectures\LectureController@addLecture')->name('addLecture');

Route::post('/updateLecture/{id}', 'Lectures\LectureController@updateLecture')->name('updateLecture');

Route::post('/addSubject', 'Subject\SubjectController@addSubject')->name('addSubject');

Route::post('/updateSubject/{id}', 'Subject\SubjectController@updateSubject')->name('updateSubject');

Route::post('/addTest', 'Testing\TestingController@addTest')->name('addTest');

Route::post('/editTest/{id}', 'Testing\TestingController@updateTest')->name('editTest');

Route::post('/checkAnswer/{id}', 'Testing\TestingController@checkAnswer')->name('checkAnswer');
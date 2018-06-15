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

Route::get('/admin_template', 'HomeController@admin')->name('admin');

Route::get('/student_access', 'Auth\LoginController@studentAccessView');

Route::post('/student_access_data',  'Auth\LoginController@studentAccessData');

Route::get('/course', 'CourseController@course');

Route::post('/addCourse', 'CourseController@addCourse');

Route::get('/student', 'StudentController@student');

Route::post('/addStudent', 'StudentController@addStudent');

Route::get('/fee', 'FeeController@fee');

Route::get('/fetch/{id}', 'FeeController@view');

Route::post('/addFee', 'FeeController@addFee');

Route::get('/exams', 'ExaminationController@exam');

Route::get('/exam_booking/{id}', 'ExaminationController@view');

Route::post('/addExam', 'ExaminationController@addExam');

Route::get('/lessons', 'DrivingLessonController@view');

Route::post('/addLesson', 'DrivingLessonController@addLesson');

Route::get('/passStudent/{id}', 'StudentController@passStudentView');

Route::post('/passStudent/{id}', 'StudentController@passStudent');


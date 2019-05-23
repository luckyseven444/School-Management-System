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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/teacher/approve/{id}', 'TeacherController@Approve');
Route::get('/teacher/delete/{id}', 'TeacherController@Delete');
Route::get('/teacher/assignment', 'TeacherController@Assignment');

Route::get('/attendance', 'AttendanceController@Load');
Route::get('/attendance/submit', 'AttendanceController@Submit');
Route::get('/guardian/check', 'GuardianController@CheckAttendance');

Route::get('/download', 'HomeController@downloadPDF');




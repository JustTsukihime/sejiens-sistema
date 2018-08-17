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

Route::get('/', 'HomeController@landing');
//
Auth::routes();
//
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/student/import', 'StudentController@import')->name('student.import');
Route::post('/student/importAttendees', 'StudentController@importAttendees')->name('student.importAttendees');
Route::post('/student/createUsers', 'StudentController@createUsers')->name('student.createUsers');
Route::resource('/student', 'StudentController');

Route::post('/mail/studentConfirmation', 'EmailController@studentConfirmation');
Route::post('/mail/send', 'EmailController@send')->name('mail.send');
Route::resource('/mail', 'EmailController');

//Route::get('/', 'QRController@index');
//Route::get('/{qr}', 'QRController@show');
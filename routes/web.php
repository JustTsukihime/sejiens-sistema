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
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'student', 'as' => 'student.'], function() {
    Route::get('management', 'StudentController@management')->name('management');
    Route::post('import', 'StudentController@import')->name('import');
    Route::post('importAttendees', 'StudentController@importAttendees')->name('importAttendees');
    Route::post('resolve', 'StudentController@resolve');
    Route::post('{student}/addGroup', 'StudentController@addGroup');
    Route::post('{student}/forceConfirm', 'StudentController@forceConfirm');
//    Route::post('createUsers', 'StudentController@createUsers')->name('createUsers');
});
Route::resource('/student', 'StudentController');

Route::group(['prefix' => 'group', 'as' => 'group.'], function() {
    Route::get('{group}/createMember', 'GroupController@createMember');
    Route::post('{group}/createMember', 'GroupController@storeMember');
    Route::post('{group}/removeMember', 'GroupController@removeMember');
});
Route::resource('group', 'GroupController');

Route::post('/mail/studentConfirmation', 'EmailController@studentConfirmation');
Route::post('/mail/send', 'EmailController@send')->name('mail.send');
Route::resource('/mail', 'EmailController');

//Route::get('/', 'QRController@index');
//Route::get('/{qr}', 'QRController@show');
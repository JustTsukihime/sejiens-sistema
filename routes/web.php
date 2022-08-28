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

use App\Http\Controllers\EmailController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'landing'])->name('landing');
//
Auth::routes();
//
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'student', 'as' => 'student.'], function() {
    Route::get('management', [StudentController::class, 'management'])->name('management');
    Route::post('import', [StudentController::class, 'import'])->name('import');
    Route::post('importAttendees', [StudentController::class, 'importAttendees'])->name('importAttendees');
    Route::post('resolve', [StudentController::class, 'resolve']);
    Route::post('confirm', [StudentController::class, 'confirm'])->name('confirm');
    Route::post('qrarchive', [StudentController::class, 'downloadQRArchive']);
    Route::get('confirm/{hash}', [StudentController::class, 'confirmation'])->name('confirmation');
    Route::get('reject/{email}', [StudentController::class, 'reject']);
    Route::get('{student}/vcard', [StudentController::class, 'VCard'])->name('vcard');
    Route::post('{student}/addGroup', [StudentController::class, 'addGroup']);
    Route::post('{student}/forceConfirm', [StudentController::class, 'forceConfirm']);
    Route::post('{student}/forceCancel', [StudentController::class, 'forceCancel']);
//    Route::post('createUsers', 'StudentController@createUsers')->name('createUsers');
});
Route::resource('/student', StudentController::class);

Route::group(['prefix' => 'group', 'as' => 'group.'], function() {
    Route::get('{group}/createMember', [GroupController::class, 'createMember']);
    Route::post('{group}/createMember', [GroupController::class, 'storeMember']);
    Route::post('{group}/removeMember', [GroupController::class, 'removeMember']);
    Route::get('{group}/vcard', [GroupController::class, 'membersVCard']);
    Route::post('whatsapp', [GroupController::class, 'makeWhatsappGroup']);
});
Route::resource('group', GroupController::class);
Route::resource('user', UserController::class);

Route::post('/mail/studentConfirmation', [EmailController::class, 'studentConfirmation']);
Route::post('/mail/send', [EmailController::class, 'send'])->name('mail.send');
Route::resource('/mail', EmailController::class);

//Route::get('/', 'QRController@index');
//Route::get('/{qr}', 'QRController@show');
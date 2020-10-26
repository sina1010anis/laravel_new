<?php

use Illuminate\Support\Facades\Route;

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
    $title='فروشگاه عکس';
    return view('index' , compact('title'));
})->name('index');
Route::prefix('user')->middleware('auth')->group(function (){
    Route::get('/show/UserSpecifications/{userControll}' , [\App\Http\Controllers\UserControllController::class,'show'])->name('User_Specifications');
    Route::get('/edit/User/Profile/{userControll}' , [\App\Http\Controllers\UserControllController::class,'edit'])->name('User_Edit');
    Route::put('/update/User/Profile/{userControll}' , [\App\Http\Controllers\UserControllController::class,'update'])->name('User_Update_Profile');
    Route::get('/delete/User/{userControll}' , [\App\Http\Controllers\UserControllController::class,'destroy'])->name('Delete_User');
    Route::get('/support/User' , function (){return view('user.support_panel_user')->with('title' , 'پشتبانی');})->name('Support_User');
    Route::post('/support/User/send/message' , [\App\Http\Controllers\UserControllController::class,'store'])->name('Support_User_Send');
    Route::get('/support/User/View/Message' , [\App\Http\Controllers\UserControllController::class,'view_chat'])->name('Support_User_View_Message');
    Route::get('/Date/User/New' , [\App\Http\Controllers\UserControllController::class,'index'])->name('Date_User_New');
    Route::post('/Date/User/New/Store' , [\App\Http\Controllers\UserControllController::class,'Date_Store'])->name('Date_User_New_Store');
    Route::get('/Date/User/View' , [\App\Http\Controllers\UserControllController::class,'Date_View'])->name('Date_User_View');
    Route::get('/Date/Edit/Status/{date_new}' , [\App\Http\Controllers\UserControllController::class,'Date_Edit'])->name('Date_Edit_Status');
    Route::get('/Date/View/All/{date_new}' , [\App\Http\Controllers\UserControllController::class,'Show_Data'])->name('Show_Data');
    Route::get('/Upload/Photo/User' , [\App\Http\Controllers\UserControllController::class,'Upload_User'])->name('Upload_User');
});
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/Upload/Photo/Users', [App\Http\Controllers\UserControllController::class, 'Ajax']);

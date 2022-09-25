<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayoutController;

// use App\Http\Controllers\ImageUploadController;

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


//CRUD ::
Route::get('employees', [EmployeeController::class, 'index']);
Route::get('create-employee', [EmployeeController::class, 'create']);
Route::post('store-employee', [EmployeeController::class, 'store']);

Route::get('edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::post('update-employee/{id}', [EmployeeController::class, 'update']);
Route::get('delete-employee/{id}', [EmployeeController::class, 'delete']);
//AUth::
Route::get('login', [AuthController::class, 'login']);
Route::post('storelogin', [AuthController::class, 'loginstore']);

Route::group(['middleware' => 'checkloggedin'], function () {
    Route::get('dashboard', [HomeController::class, 'dashboard']);
});

Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['checkloggedin','isadmin']], function () {
    Route::get('admin', [HomeController::class, 'admin']);
});
Route::group(['middleware' => ['checkloggedin','isstudent']], function () {
    Route::get('student', [HomeController::class, 'student']);
});

// //Upload::Image
// Route::get('/upload', [UploadController::class,'upload']);
// Route::post('upload-image', [UploadController::class,'uploadimage']);

//ImageUpload
// Route::get('image/upload', [ImageUploadController::class,'fileCreate']);
// // Route::get('image/upload','ImageUploadController@fileCreate');
// Route::post('image/upload/store','ImageUploadController@fileStore');
// Route::post('image/delete','ImageUploadController@fileDestroy');
//LayOut::
Route::get('index', [LayoutController::class, 'index']);
Route::get('dashboard', [LayoutController::class, 'dashboard']);

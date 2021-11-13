<?php

use App\Http\Controllers\MinistryController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
// dang nhap
/*Route::get('/',
[StudentController::class,'login']
);
Route::post('/home1',
[StudentController::class,'store']
);*/

/*// trang home
Route::get('/DASHBOARD',
[StudentController::class,'index']
);*/


Route::get('/',
[\App\Http\Controllers\Auth\LoginController::class,'showLoginForm']
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('courses', \App\Http\Controllers\CourseController::class);
    Route::resource('grades', \App\Http\Controllers\GradeController::class);
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    Route::resource('subjects', \App\Http\Controllers\SubjectsController::class);
    Route::resource('books', \App\Http\Controllers\BookController::class);
    Route::resource("invoice", \App\Http\Controllers\InvoiceController::class);
    Route::resource('gradess', \App\Http\Controllers\GradessController::class);
    Route::resource("invoices", \App\Http\Controllers\InvoicesController::class);

});

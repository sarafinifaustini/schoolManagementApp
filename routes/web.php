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
    return view('welcome');
});

//auth route for both
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

// for blogwriters
Route::group(['middleware' => ['auth', 'role:blogwriter']], function() {
Route::get('/index', [PostsController::class, 'index'])->name('student');
Route::post('/index', [PostsController::class, 'store']);
Route::delete('/index/{post}', [PostsController::class, 'destroy'])->name('students.destroy');

Route::get('/students/{post}/edit',[PostsController::class,'edit'])->name('student.editPost');

Route::put('/student/{post}/edit',[PostsController::class,'update'])->name('student.update');
});

require __DIR__.'/auth.php';





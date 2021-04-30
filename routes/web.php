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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\userController::class, 'index'])->name('user_index');
Route::get('/user/ubahAkses/{id}', [App\Http\Controllers\userController::class, 'edit']);
Route::get('/user/edit/{id}', 'userController@edit')->name('edit-user')->middleware('role:admin');
Route::PUT('/user/{id}', 'supplierController@update')->name('user-update');

Route::get('/rumahAdmin', [App\Http\Controllers\userController::class, 'index'])->name('rumah_index');

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

Route::get('/user', [App\Http\Controllers\userController::class, 'index'])->name('user_index')->middleware('role:admin');
Route::get('/user/ubahAkses/{id}', [App\Http\Controllers\userController::class, 'edit'])->middleware('role:admin');
Route::get('/user/edit/{id}', 'userController@edit')->name('edit-user')->middleware('role:admin');
Route::PUT('/user/{id}', [App\Http\Controllers\userController::class, 'update'])->middleware('role:admin')->name('user-update');

Route::get('/rumahAdmin', [App\Http\Controllers\rumah_controller::class, 'index'])->name('rumahAdminIndex')->middleware('role:admin');;
Route::POST('/rumahAdmin', [App\Http\Controllers\rumah_controller::class, 'store'])->middleware('role:admin');;
Route::get('/rumahAdmin/hapus/{id}', [App\Http\Controllers\rumah_controller::class, 'destroy'])->middleware('role:admin');;
Route::get('/rumahAdmin/edit/{id}', [App\Http\Controllers\rumah_controller::class, 'edit'])->middleware('role:admin');;
Route::PUT('/rumahAdmin/edit/{id}', [App\Http\Controllers\rumah_controller::class, 'update'])->middleware('role:admin');;

Route::get('/typerumah', [App\Http\Controllers\rumah_controller::class, 'typerumah'])->name('rumahAdminTypeIndex')->middleware('role:admin');
Route::get('/typerumah/edit/{id}', [App\Http\Controllers\rumah_type::class, 'edit'])->middleware('role:admin');
Route::put('/typerumah/edit/{id}', [App\Http\Controllers\rumah_type::class, 'update'])->middleware('role:admin');
Route::POST('/typerumah', [App\Http\Controllers\rumah_type::class, 'store'])->middleware('role:admin');
Route::get('/typerumah/hapus/{id}', [App\Http\Controllers\rumah_type::class, 'destroy'])->middleware('role:admin');

Route::get('/listtype', [App\Http\Controllers\rumah_controller::class, 'userrumahtype'])->name('rumah');
Route::get('/type/{id}', [App\Http\Controllers\rumah_controller::class, 'listrumah'])->name('rumahlist');

Route::get('/booking/{id}', [App\Http\Controllers\booking_controller::class, 'booking'])->name('booking');
Route::POST('/booking/{id}', [App\Http\Controllers\booking_controller::class, 'savebooking']);

Route::get('/riwayat', [App\Http\Controllers\booking_controller::class, 'history'])->name('riwayat');
Route::POST('/riwayat', [App\Http\Controllers\booking_controller::class, 'saveBukti']);

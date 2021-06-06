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

Route::get('/user', [App\Http\Controllers\userController::class, 'index'])->name('user_index')->middleware('role:admin|marketing');
Route::get('/user/ubahAkses/{id}', [App\Http\Controllers\userController::class, 'edit'])->middleware('role:admin');
Route::get('/user/edit/{id}', 'userController@edit')->name('edit-user')->middleware('role:admin');
Route::PUT('/user/{id}', [App\Http\Controllers\userController::class, 'update'])->middleware('role:admin')->name('user-update');

Route::get('/verifikasi/{id}/{status}', [App\Http\Controllers\userController::class, 'verifikasi'])->middleware('role:marketing');


Route::get('/rumahAdmin', [App\Http\Controllers\rumah_controller::class, 'index'])->name('rumahAdminIndex')->middleware('role:marketing');;
Route::POST('/rumahAdmin', [App\Http\Controllers\rumah_controller::class, 'store'])->middleware('role:marketing');;
Route::get('/rumahAdmin/hapus/{id}', [App\Http\Controllers\rumah_controller::class, 'destroy'])->middleware('role:marketing');;
Route::get('/rumahAdmin/edit/{id}', [App\Http\Controllers\rumah_controller::class, 'edit'])->middleware('role:marketing');;
Route::PUT('/rumahAdmin/edit/{id}', [App\Http\Controllers\rumah_controller::class, 'update'])->middleware('role:marketing');;

Route::get('/typerumah', [App\Http\Controllers\rumah_controller::class, 'typerumah'])->name('rumahAdminTypeIndex')->middleware('role:marketing');
Route::get('/typerumah/edit/{id}', [App\Http\Controllers\rumah_type::class, 'edit'])->middleware('role:marketing');
Route::put('/typerumah/edit/{id}', [App\Http\Controllers\rumah_type::class, 'update'])->middleware('role:marketing');
Route::POST('/typerumah', [App\Http\Controllers\rumah_type::class, 'store'])->middleware('role:marketing');
Route::get('/typerumah/hapus/{id}', [App\Http\Controllers\rumah_type::class, 'destroy'])->middleware('role:marketing');

Route::get('/listtype', [App\Http\Controllers\rumah_controller::class, 'userrumahtype'])->name('rumah');
Route::get('/type/{id}', [App\Http\Controllers\rumah_controller::class, 'listrumah'])->name('rumahlist');

Route::get('/booking/{id}', [App\Http\Controllers\booking_controller::class, 'booking'])->name('booking');
Route::POST('/booking/{id}', [App\Http\Controllers\booking_controller::class, 'savebooking']);

Route::get('/riwayat', [App\Http\Controllers\booking_controller::class, 'history'])->name('riwayat');
Route::POST('/riwayat', [App\Http\Controllers\booking_controller::class, 'saveBukti']);

Route::get('/listBooking', [App\Http\Controllers\booking_controller::class, 'listBooking'])->name('listBooking');


Route::get('/bookingProses/{id}/{status}', [App\Http\Controllers\booking_controller::class, 'proses']);

Route::get('/akunkas', [App\Http\Controllers\akunkas_controller::class, 'index'])->name('akunkas');
Route::POST('/akunkas', [App\Http\Controllers\akunkas_controller::class, 'store']);


Route::get('/rekapitulasi', [App\Http\Controllers\akunkas_controller::class, 'rekapitulasi'])->name('rekapitulasi');

// konfirmasi
// report
// grafik

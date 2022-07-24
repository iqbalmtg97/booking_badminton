<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('landingpage.index');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'checkRole:Admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kel-penyewa', [App\Http\Controllers\PenyewaController::class, 'index'])->name('penyewa');
    Route::get('/kel-booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
    Route::get('/kel-lapangan', [App\Http\Controllers\LapanganController::class, 'index'])->name('lapangan');
});

Route::group(['middleware' => ['auth', 'checkRole:User']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kel-booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
});







// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/kel-batal', [App\Http\Controllers\BatalController::class, 'index'])->name('batal');

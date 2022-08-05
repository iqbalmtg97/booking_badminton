<?php

use App\Events\MessageCreated;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapanganController;

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

Route::get('/message/created', function () {
    MessageCreated::dispatch('lorem ipsum dolor sit amet');
});

Route::get('/', [LandingController::class, 'index']);

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index']);

// kel-booking
Route::get('/kel-booking', [BookingController::class, 'index']);
Route::post('/kel-booking/store', [BookingController::class, 'store']);
Route::post('/kel-booking/update', [BookingController::class, 'updateBuktibayar']);
Route::post('/kel-booking/batal', [BookingController::class, 'batal']);
Route::post('/kel-booking/pilihan', [BookingController::class, 'pilihan']);
Route::get('/kel-booking/hapus/{id}', [BookingController::class, 'destroy']);
Route::get('/getdatas/{id}', [BookingController::class, 'getdata']);


Route::group(['middleware' => ['auth', 'checkRole:Admin']], function () {
    // kel-penyewa
    Route::get('/kel-penyewa', [PenyewaController::class, 'index']);
    Route::get('/kel-penyewa/destroy/{id}', [PenyewaController::class, 'destroy']);

    // kel-lapangan
    Route::get('/kel-lapangan', [LapanganController::class, 'index']);
    Route::post('/kel-lapangan/store', [LapanganController::class, 'store']);
    Route::post('/kel-lapangan/update', [LapanganController::class, 'update']);
    Route::get('/kel-lapangan/destroy/{id}', [LapanganController::class, 'destroy']);
    Route::get('/getdata/{id}', [LapanganController::class, 'getdata']);
});







// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/kel-batal', [App\Http\Controllers\BatalController::class, 'index'])->name('batal');

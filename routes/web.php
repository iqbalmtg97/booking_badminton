<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\BookingController;
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

Route::get('/', function () {
    return view('landingpage.index');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/kel-booking', [BookingController::class, 'index']);

Route::group(['middleware' => ['auth', 'checkRole:Admin']], function () {
    Route::get('/kel-penyewa', [PenyewaController::class, 'index']);
    Route::get('/kel-lapangan', [LapanganController::class, 'index']);
    Route::post('/kel-lapangan/store', [LapanganController::class, 'store']);
    Route::post('/kel-lapangan/update', [LapanganController::class, 'update']);
    Route::get('/kel-lapangan/destroy/{id}', [LapanganController::class, 'destroy']);
    Route::get('/getdata/{id}', [LapanganController::class, 'getdata']);
});







// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/kel-batal', [App\Http\Controllers\BatalController::class, 'index'])->name('batal');

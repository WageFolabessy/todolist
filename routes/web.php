<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Middleware\HanyaBelumLogin;
use App\Http\Middleware\HanyaSudahLogin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/template', 'template');

Route::get('/', [HomeController::class, 'home']);

Route::controller(PenggunaController::class)->group(function(){
    Route::get('/masuk', 'masuk')->middleware(HanyaBelumLogin::class);
    Route::post('/masuk', 'doMasuk')->middleware(HanyaBelumLogin::class);
    Route::post('/keluar', 'doKeluar');
});
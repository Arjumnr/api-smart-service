<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PilihKendaraanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Menambah user
Route::post('/signUp', [UserController::class, 'tambahUser']);

//Menampilkan Semua User
Route::get('/users', [UserController::class, 'index']);

//Login
Route::post('/signIn', [LoginController::class, 'login']); 

//Pilih Kendaraan Untuk User Yang Belum Memiliki Kendaraan
Route::post('/pilihKendaraan', [PilihKendaraanController::class, 'createPilihKendaraan']); 

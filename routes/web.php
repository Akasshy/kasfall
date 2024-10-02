<?php

use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UangKasController;
use App\Http\Controllers\UserController;
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

Route::get('/',[UserController::class,'login']);
Route::post('/auth',[UserController::class,'auth']);


Route::middleware(['login'])->group(function(){

    //Hal Utama
    Route::get('/dashboard',[UangKasController::class,'dashboard']);
    Route::get('siswa/show',[SiswaController::class,'show']);
    Route::post('/siswa/show',[SiswaController::class,'search']);
    Route::get('siswa/create',[SiswaController::class,'create']);
    Route::post('siswa/create',[SiswaController::class,'add']);
    Route::get('siswa/update/{id}',[SiswaController::class,'update']);
    Route::post('siswa/update/{id}',[SiswaController::class,'edit']);
    Route::get('siswa/delete/{id}',[SiswaController::class,'delete']);
    
    // Pemasukan
    Route::get('/pemasukan',[UangKasController::class,'index']);
    // Route::post('/pemasukan',[UangKasController::class,'caritanggal']);
    Route::post('/pemasukan',[UangKasController::class,'search']);
    Route::get('create-pemasukan',[UangKasController::class,'createpemasukan']);
    Route::post('create-pemasukan',[UangKasController::class,'addpemasukan']);
    // Route::get('create-pengeluaran',[UangKasController::class,'createpengeluaran']);
    // Route::post('create-pengeluaran',[UangKasController::class,'addpengeluaran']);
    Route::get('/pemasukan/delete/{id}',[UangKasController::class,'deletepemasukan']);
    Route::get('update-pemasukan/{id}',[UangKasController::class,'updatepemasukan']);
    Route::post('update-pemasukan/{id}',[UangKasController::class,'editpemasukan']);
    
    //Pengeluaran
    Route::get('/pengeluaran',[PengeluaranController::class,'show']);
    Route::post('/pengeluaran',[PengeluaranController::class,'search']);
    Route::get('create-pengeluaran',[PengeluaranController::class,'create']);
    Route::post('/create-pengeluaran',[PengeluaranController::class,'add']);
    Route::get('/pengeluaran/delete/{id}',[PengeluaranController::class,'delete']);
    // Route::get('update-pengeluaran/{id}',[PengeluaranController::class,'update']);
    // Route::post('update-pengeluaran/{id}',[PengeluaranController::class,'edit']);
});

Route::get('/logout',[UserController::class,'logout']);







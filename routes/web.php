<?php

use App\Http\Controllers\JawabanPilihanGandaController;
use App\Http\Controllers\KataController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\PilihanGandaController;
use App\Http\Controllers\SoalKalimatController;
use App\Http\Controllers\UserController;
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
Route::get('/', [KataController::class, 'index'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register_proses', [UserController::class, 'register_proses']);
Route::get('/logout', [UserController::class, 'logout']);

//Kata
Route::get('/kata', [KataController::class, 'index']);
Route::post('/tambah_kata', [KataController::class, 'tambah_kata']);
Route::post('/hapus_kata', [KataController::class, 'hapus_kata']);
Route::post('/update_kata', [KataController::class, 'update_kata']);

//Pilihan Ganda
Route::get('/pilihanganda', [PilihanGandaController::class, 'index']);
Route::post('/tambah_soal_kata', [PilihanGandaController::class, 'tambah']);
Route::post('/hapus_pilihanganda', [PilihanGandaController::class, 'delete']);
Route::get('/jawaban_pilihanganda/{id?}', [PilihanGandaController::class, 'jawaban']);
//Jawaban pilihan ganda
Route::post('/tambah_jawaban_pilihanganda', [JawabanPilihanGandaController::class, 'tambah_jawaban_pilihanganda']);
Route::post('/hapus_jawaban_pilihanganda', [JawabanPilihanGandaController::class, 'delete']);

//Kalimat
Route::get('/kalimat', [SoalKalimatController::class, 'index']);
Route::post('/tambah_kalimat', [SoalKalimatController::class, 'tambah']);
Route::post('/hapus_kalimat', [SoalKalimatController::class, 'delete']);
Route::post('/update_kalimat', [SoalKalimatController::class, 'update']);


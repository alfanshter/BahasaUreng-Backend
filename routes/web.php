<?php

use App\Http\Controllers\KataController;
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


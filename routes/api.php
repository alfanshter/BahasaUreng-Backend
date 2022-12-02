<?php

use App\Http\Controllers\KataController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\KuisKalimatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Kuis
Route::get('/kuis_kata', [KuisController::class, 'kuis_kata']);
Route::post('/jawab_kuis_kata', [KuisController::class, 'jawab_kuis_kata']);

//Kosa Kata
Route::get('/kosakata', [KataController::class, 'index_api']);
Route::get('/cari_kosakata', [KataController::class, 'find']);

//kalimat
Route::get('/kuis_kalimat', [KuisKalimatController::class, 'kuis_kalimat']);
Route::post('/jawab_kalimat', [KuisKalimatController::class, 'jawab_kalimat']);

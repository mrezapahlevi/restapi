<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MakulController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route Public
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route Protect
Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('mahasiswa')->group(function(){
        Route::get('read',  [MahasiswaController::class, 'index']);
        Route::post('create', [MahasiswaController::class, 'store']);
        Route::put('update/{id}',  [MahasiswaController::class, 'update']);
        Route::delete('delete/{id}',  [MahasiswaController::class, 'destroy']);
    });
    
    Route::prefix('dosen')->group(function(){
        Route::get('read',  [DosenController::class, 'index']);
        Route::post('create', [DosenController::class, 'store']);
        Route::put('update/{id}',  [DosenController::class, 'update']);
        Route::delete('delete/{id}',  [DosenController::class, 'destroy']);
    });
    
    Route::prefix('makul')->group(function(){
        Route::get('read',  [MakulController::class, 'index']);
        Route::post('create', [MakulController::class, 'store']);
        Route::put('update/{id}',  [MakulController::class, 'update']);
        Route::delete('delete/{id}',  [MakulController::class, 'destroy']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});


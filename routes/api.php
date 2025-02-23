<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\TudolistController;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Auth Start
Route::post('register', [AuthController::class, 'register']);
Route::post('verify', [AuthController::class, 'verify']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group( function () {
    Route::post('logout', [AuthController::class, 'logout']);
         
    });
// Auth End




//  TUDO START
Route::middleware(['auth:sanctum'])->group( function () {
   Route::get('search', [SearchController::class, 'search']);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('tudolist', TudolistController::class);

    });
// TUDO END


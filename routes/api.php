<?php

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

Route::post('/buyers/login', [\App\Http\Controllers\Buyers\AuthController::class, 'login']);
Route::post('/sellers/login', [\App\Http\Controllers\Sellers\AuthController::class, 'login']);

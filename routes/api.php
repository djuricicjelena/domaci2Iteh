<?php

use App\Http\Controllers\TipoviController;
use App\Http\Controllers\TrenerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VezbaController;
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
Route::post('uloguj', [UserController::class, 'login']);
Route::post('registruj', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('treneri', TrenerController::class);
    Route::resource('tipovi', TipoviController::class);
    Route::resource('vezbe', VezbaController::class);
});

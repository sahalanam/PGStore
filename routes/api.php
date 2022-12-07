<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EMoneyController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\TransaksiController;


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

Route::resource('/emoney', EMoneyController::class);

route::resource('/transaksi', TransaksiController::class);

Route::post('/register', [AkunController::class, 'register']);
Route::post('/login', [AkunController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AkunController::class, 'logout']);
});
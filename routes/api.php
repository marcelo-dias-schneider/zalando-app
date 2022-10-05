<?php

use App\Http\Controllers\AuthorizationBasicAuthController;
use App\Http\Controllers\ZalandoOrderNotificationController;
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

Route::middleware(['authorization.basic.auth'])->prefix('/authorization-basic')->group(function () {
    Route::get('/', [AuthorizationBasicAuthController::class, 'index']);
    Route::post('/', [AuthorizationBasicAuthController::class, 'store']);
});

Route::middleware(['authorization.basic.auth'])->prefix('/orders')->group(function () {
    Route::get('/', [ZalandoOrderNotificationController::class, 'retrieve_orders']);
    Route::post('/notification', [ZalandoOrderNotificationController::class, 'store']);
    Route::get('/notification/{order_number}', [ZalandoOrderNotificationController::class, 'retrieve']);
    Route::get('/sync-duplicated/{order_number}', [ZalandoOrderNotificationController::class, 'sync']);
});

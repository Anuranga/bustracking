<?php

use App\Http\Controllers\DirectionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichvendors
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/current_location', [DirectionController::class, 'storeDriverLocation']);
Route::post('/driver_login', [DriverController::class, 'DriverLogin']);
Route::post('/passenger_register', [PassengerController::class, 'create']);
Route::post('/passenger_Login', [PassengerController::class, 'PassengerLogin']);
Route::get('/get_routes', [DirectionController::class, 'GetRoutes']);


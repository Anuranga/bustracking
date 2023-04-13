<?php

use App\Http\Controllers\DirectionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('users')->group(function (){
        Route::get('/user/route/{origin}/{destination}', [DirectionController::class, 'UserLocationRequest']);
});

//Route::get('/getRoutes', [DirectionController::class, 'GetRoutes']);
Route::post('/currentLocation', [DirectionController::class, 'storeDriverLocation']);
Route::any('/driver_registration', [DriverController::class, 'RegisterDriver'])->name('driver_registration');
//Route::any('/passenger_registration', [PassengerController::class, 'RegisterPassenger'])->name('driver_registration');
Route::any('/driver_list', [DriverController::class, 'DriverList'])->name('driver_list');
Route::any('/passenger_list', [PassengerController::class, 'PassengerList'])->name('passenger_list');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});

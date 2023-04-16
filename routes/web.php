<?php

use App\Http\Controllers\DirectionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Log;
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
    return view('auth/login');
});

Route::prefix('users')->group(function (){
        Route::get('/user/route/{origin}/{destination}', [DirectionController::class, 'UserLocationRequest']);
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Route::group(['middleware' => 'role:Admin,CEO'], function(){
        Route::get('/dashboard', function () {
            return view('welcome');
        })->name('dashboard');

        Route::any('/driver_registration', [DriverController::class, 'RegisterDriver'])->name('driver_registration');
        Route::any('/update_driver_status', [DriverController::class, 'updateDriverStatus'])->name('update_driver_status');
        Route::any('/driver_list', [DriverController::class, 'DriverList'])->name('driver_list');
        Route::any('/driver_routes_list', [DriverController::class, 'DriverRoutesList'])->name('driver_routes_list');

        Route::any('/all_driver_list', [DriverController::class, 'AllDriverList'])->name('all_driver_list');
        Route::any('/all_passenger_list', [PassengerController::class, 'AllPassengerList'])->name('all_passenger_list');
        Route::any('/all_routes_list', [DirectionController::class, 'AllRoutesList'])->name('all_routes_list');

        Route::any('/passenger_routes_list', [PassengerController::class, 'PassengerRoutesList'])->name('passenger_routes_list');
        Route::any('/passenger_list', [PassengerController::class, 'PassengerList'])->name('passenger_list');

        Route::any('generate-pdf', [DriverController::class, 'generatePDF'])->name('generate-pdf');
        Route::any('generate-pdf-passenger', [PassengerController::class, 'generatePDF'])->name('generate-pdf-passenger');
        Route::any('generate-pdf-all-driver', [DriverController::class, 'generatePDFAllDriver'])->name('generate-pdf-all-driver');
        Route::any('generate-pdf-all-passenger', [PassengerController::class, 'generatePDFAllPassenger'])->name('generate-pdf-all-passenger');
        Route::any('generate-pdf-all-routes', [DirectionController::class, 'generatePDFAllRoutes'])->name('generate-pdf-all-routes');

   // });
});

// Route::any('update_driver_status', [DriverController::class, 'updateDriverStatus'])->name('update_driver_status');

<?php

use App\Http\Controllers\DirectionController;
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

Route::get('/getRoutes/{origin}', [DirectionController::class, 'GetRoutes']);
Route::post('/currentLocation', [DirectionController::class, 'storeDriverLocation']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
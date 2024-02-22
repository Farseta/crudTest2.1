<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// otherAsset start
Route::resource('/otherAssets',App\Http\Controllers\Other_assetController::class);
// otherAsset end

// vehicleAsset start
Route::resource('/transportations',App\Http\Controllers\TransportationController::class);
// vehicleAsset end

// vehicleLend start
Route::resource('/vehicleLends',App\Http\Controllers\Vehicle_lendingController::class);
// vehicleLend end

// vehileReturn start
Route::resource('/vehicleReturns',App\Http\Controllers\Vehicle_returnController::class);
// vehileReturn end

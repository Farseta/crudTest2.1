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
Route::get('/api/otherAssets',[App\Http\Controllers\Other_assetController::class,'api']);
// otherAsset end

// vehicleAsset start
Route::resource('/transportations',App\Http\Controllers\TransportationController::class);
Route::get('/api/transportations',[App\Http\Controllers\TransportationController::class,'api']);
// vehicleAsset end

// vehicleLend start
Route::resource('/vehicleLends',App\Http\Controllers\Vehicle_lendingController::class);
Route::get('/api/vehicleLends',[App\Http\Controllers\Vehicle_lendingController::class,'api']);
// vehicleLend end

// vehileReturn start
Route::resource('/vehicleReturns',App\Http\Controllers\Vehicle_returnController::class);
Route::get('/api/vehicleReturns',[App\Http\Controllers\Vehicle_returnController::class,'api']);
// vehileReturn end

// print start
Route::resource('/print', App\Http\Controllers\PrintController::class);
Route::get('/api/print', [App\Http\Controllers\PrintController::class, 'api']);
// print end

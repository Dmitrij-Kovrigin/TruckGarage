<?php

use App\Http\Controllers\MechanicController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/trucks', [App\Http\Controllers\TruckController::class, 'index'])->name('trucks');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/trucks/create', [App\Http\Controllers\TruckController::class, 'create'])->name('truck_create');
    Route::post('/trucks/store', [App\Http\Controllers\TruckController::class, 'store'])->name('truck_store');
    Route::get('/trucks/show/{truck}', [App\Http\Controllers\TruckController::class, 'show'])->name('truck_show');
    Route::get('/trucks/edit/{truck}', [App\Http\Controllers\TruckController::class, 'edit'])->name('truck_edit');
    Route::put('/trucks/update/{truck}', [App\Http\Controllers\TruckController::class, 'update'])->name('truck_update');
    Route::delete('/trucks/delete/{truck}', [App\Http\Controllers\TruckController::class, 'destroy'])->name('truck_delete');

    Route::prefix('/mechanics')->name('mechanic_')->group(function () {
        Route::get('/', [MechanicController::class, 'index'])->name('index');
        Route::get('/create', [MechanicController::class, 'create'])->name('create');
        Route::post('/store', [MechanicController::class, 'store'])->name('store');
        Route::get('/show/{mechanic}', [MechanicController::class, 'show'])->name('show');
    });
});


// Route::prefix('brands')->name('brand_')->group(function () {
//     Route::get('/create', [BrandController::class, 'create'])->name('create');
    
//     Route::get('/', [BrandController::class, 'index'])->name('index');
//     Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('edit');
//     Route::put('/update/{brand}', [BrandController::class, 'update'])->name('update');
//     Route::delete('/delete/{brand}', [BrandController::class, 'destroy'])->name('delete');
//     Route::get('/show/{brand}', [BrandController::class, 'show'])->name('show');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ServiceController;

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
Route::prefix('points')->group(function () {
    Route::get('index', [PointController::class, 'index'])->name('points.index');
    Route::get('create', [PointController::class, 'create'])->name('points.create');
    Route::post('store', [PointController::class, 'store'])->name('points.store');
    Route::get('edit/{point}', [PointController::class, 'edit'])->name('points.edit');
    Route::post('update/{point}', [PointController::class, 'update'])->name('points.update');
    Route::get('associate/{point}', [PointController::class, 'associate'])->name('points.associate');
    Route::post('association/{point}', [PointController::class, 'updateAssociation'])->name('points.association');

});

Route::prefix('services')->group(function () {
    Route::get('index', [ServiceController::class, 'index'])->name('services.index');
    Route::get('create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('edit/{service}', [ServiceController::class, 'edit'])->name('services.edit');
    Route::post('update/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::get('associate/{service}', [ServiceController::class, 'associate'])->name('services.associate');
    Route::post('association/{service}', [ServiceController::class, 'updateAssociation'])->name('services.association');
});

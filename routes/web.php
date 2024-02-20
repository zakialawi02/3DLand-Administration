<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UriController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\DashboardController;

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

Auth::routes();

Route::get('/', function () {
    return view('mainMap');
});
Route::prefix('data/parcel')->group(function () {
    Route::get('/', [ParcelController::class, 'index'])->name('parcel.index');
    Route::get('/create', [ParcelController::class, 'create'])->name('parcel.create');
    Route::post('/save', [ParcelController::class, 'store'])->name('parcel.save');
    Route::delete('/{parcel_id}/delete', [ParcelController::class, 'destroy'])->name('parcel.delete');
    Route::get('/{parcel_id}/edit', [ParcelController::class, 'edit'])->name('parcel.edit');
});
Route::prefix('data/resident')->group(function () {
    Route::get('/', [ResidentController::class, 'index'])->name('resident.index');
    Route::get('/create', [ResidentController::class, 'create'])->name('resident.create');
    Route::post('/save', [ResidentController::class, 'store'])->name('resident.save');
});
Route::prefix('data/uri')->group(function () {
    Route::get('/', [UriController::class, 'index'])->name('uri.index');
    Route::get('/create', [UriController::class, 'create'])->name('uri.create');
    Route::post('/save', [UriController::class, 'store'])->name('uri.save');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

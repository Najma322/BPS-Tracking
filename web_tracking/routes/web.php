<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bps_controller;

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
// Landing Login
Route::get('login', [bps_controller::class, 'login']);
Route::post('custom-login', [bps_controller::class, 'customLogin'])->name('login.custom');

// Landing Registration
Route::get('register', [bps_controller::class, 'registration']);
Route::post('custom-registration', [bps_controller::class, 'customRegistration'])->name('register.custom');

// Signout
Route::get('signout', [bps_controller::class, 'signOut']);

// Landing Employee
Route::get('dashboard', [bps_controller::class, 'dashboard']);
Route::post('storePlotting', [bps_controller::class, 'createPlotting'])->name('store.plotting');
Route::post('updatePlotting', [bps_controller::class, 'updatePlotting'])->name('update.plotting');
Route::post('image-upload', [bps_controller::class, 'storeIMG'])->name('image.store');
Route::post('deleteData', [bps_controller::class, 'deleteData'])->name('delete.data');
Route::post('deleteImage', [bps_controller::class, 'deleteImage'])->name('delete.image');
Route::post('webcam', [bps_controller::class, 'webcam'])->name('take.image');

// Employees Page
Route::get('supervisor', [bps_controller::class, 'superPage']);
Route::get('petlap', [bps_controller::class, 'petlapPage']);
Route::get('admin', [bps_controller::class, 'miminPage']);


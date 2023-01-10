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

// Employees Page
Route::get('super', [bps_controller::class, 'super']);
Route::get('petlap', [bps_controller::class, 'petlap']);
Route::get('mimin', [bps_controller::class, 'mimin']);

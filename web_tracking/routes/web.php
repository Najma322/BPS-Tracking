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
// Landing Employee
Route::get('employee', [bps_controller::class, 'employee']);
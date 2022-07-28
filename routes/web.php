<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeragamController;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\SiswaController;
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

Route::resource('siswa', SiswaController::class);

Route::resource('seragam', SeragamController::class);

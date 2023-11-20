<?php

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


Route::resource('/admin', \App\Http\Controllers\AdminController::class); 
// Auth::routes();
Route::resource('/ruangan', \App\Http\Controllers\RuanganController::class); 
// Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
//  });
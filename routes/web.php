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

// Route::get('/', function () {
//     return view('site.ola');
// })->name('index');
Route::view('/', 'site.home')->name('index');
Route::view('/login', 'site.login');
Route::view('/register', 'site.register')->name('register');

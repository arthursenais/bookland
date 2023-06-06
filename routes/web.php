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
    return view('site.ola');
})->name('index');

Route::get('/login', function() {
    return view('site.login');
})->name('login');
Route::get('/register', function() {
    return view('site.register');
})->name('register');

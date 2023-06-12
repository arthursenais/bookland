<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LivroController;
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

Route::resource('livros', LivroController::class);
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/login', [SiteController::class, 'login'])->name('login');
Route::get('/register', [SiteController::class, 'register'])->name('register');

Route::get('/livro/{slug}', [SiteController::class,'details'])->name('details');
Route::get('/search/{pesquisa}', [SiteController::class,'pesquisar'])->name('pesquisar');


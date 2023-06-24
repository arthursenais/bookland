<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
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
Route::resource('users', UserController::class);

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/novidades', [LivroController::class,'novidades'])->name('novidades');
Route::get('/populares', [LivroController::class,'populares'])->name('populares');
Route::get('/livro/{slug}', [SiteController::class,'details'])->name('details');
Route::view('/emdesenvolvimento', 'site.wip')->name('wip');
Route::get('/pesquisa', [SiteController::class,'pesquisar'])->name('pesquisar');





Route::get('/login', [SiteController::class, 'login'])->name('login');
Route::get('/nova-conta', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::post('/auth', [LoginController::class, 'auth' ])->name('login.auth');

Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::delete('/admin/livro/delete/{id}', [LivroController::class,'destroy'])->name('admin.deleteLivro');
Route::post('/admin/livro/store', [LivroController::class,'store'])->name('admin.storeLivro');
Route::post('/admin/livro/update/{id}', [LivroController::class,'update'])->name('admin.updateLivro');

Route::delete('/admin/categoria/delete/{id}', [CategoriaController::class,'destroy'])->name('admin.deleteCategoria');
Route::post('/admin/categoria/store', [CategoriaController::class,'store'])->name('admin.storeCategoria');
Route::post('/admin/categoria/update/{id}', [CategoriaController::class,'update'])->name('admin.updateCategoria');

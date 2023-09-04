<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlunoController;
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
Route::get('/clubedaleitura', [LivroController::class,'clubedolivro'])->name('clubedolivro');
Route::get('/categorias', [SiteController::class,'categorias'])->name('categorias');
Route::get('/populares', [LivroController::class,'populares'])->name('populares');
Route::get('/livro/{slug}', [SiteController::class,'details'])->name('details');

Route::view('/suporte', 'site.suporte')->name('suporte');

Route::view('/emdesenvolvimento', 'site.wip')->name('wip');
Route::get('/pesquisa', [SiteController::class,'pesquisar'])->name('pesquisar');

//Aqui seria a rota para ver os "meus empréstimos". Está desabilitado por padrão.
//Route::get('/emprestimos', [EmprestimoController::class,'index'])->name('meusEmprestimos')->middleware('auth');
Route::get('/novoEmprestimo/{slug}', [EmprestimoController::class,'create'])->name('createEmprestimo')->middleware('auth');
Route::post('/emprestimo/store/', [EmprestimoController::class,'store'])->name('storeEmprestimo')->middleware('auth');
Route::delete('/emprestimo/delete/{id}', [EmprestimoController::class,'destroy'])->name('user.deleteEmprestimo')->middleware('auth');
Route::post('/admin/emprestimo/update/{emprestimo}', [EmprestimoController::class,'update'])->name('admin.arquivarEmprestimo');


Route::get('/login', [SiteController::class, 'login'])->name('login');
Route::get('/nova-conta', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::post('/auth', [LoginController::class, 'auth' ])->name('login.auth');

Route::get('/painel', [AdminController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/painel/livros', [LivroController::class, 'index'])->middleware('auth');
Route::get('/painel/usuarios', [UserController::class, 'index'])->middleware('auth');

Route::get('/painel/emprestimos', [EmprestimoController::class, 'arquivados'])->middleware('auth');

Route::delete('/admin/livro/delete/{id}', [LivroController::class,'destroy'])->name('admin.deleteLivro');
Route::post('/admin/livro/store', [LivroController::class,'store'])->name('admin.storeLivro');
Route::post('/admin/livro/update/{id}', [LivroController::class,'update'])->name('admin.updateLivro');

Route::delete('/admin/categoria/delete/{id}', [CategoriaController::class,'destroy'])->name('admin.deleteCategoria');
Route::delete('/admin/livro/deleteAll/', [LivroController::class,'destroyAll'])->name('admin.deleteAllLivros');
Route::delete('/admin/categoria/deleteAll/', [CategoriaController::class,'destroyAll'])->name('admin.deleteAllCategorias');
Route::post('/admin/categoria/store', [CategoriaController::class,'store'])->name('admin.storeCategoria');
Route::post('/admin/aluno/store', [AlunoController::class,'store'])->name('admin.storeAluno');
Route::delete('/admin/aluno/delete/{matricula}', [AlunoController::class,'update'])->name('admin.deleteAluno')->middleware('auth');
Route::post('/admin/aluno/ativar/{matricula}', [AlunoController::class,'ativar'])->name('admin.ativarAluno')->middleware('auth');
Route::post('/admin/categoria/update/{id}', [CategoriaController::class,'update'])->name('admin.updateCategoria');
Route::get('/arquivo', [EmprestimoController::class,'arquivados'])->name('admin.arquivados')->middleware('auth');
Route::get('/admin/aluno/arquivados', [AlunoController::class,'arquivados'])->name('admin.alunosArquivados')->middleware('auth');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\User;


class SiteController extends Controller
{
    public function index() {
        $livros = Livro::all();
        return view('site.home', compact('livros'));
    }
    public function dashboard() {
        $livros = Livro::all();
        $usuarios = User::all();
        return view('site.admin.dashboard', compact('livros','usuarios'));
    }
    public function pesquisar(Request $pesquisa) {
        $livros = Livro::join('categorias', 'livros.id_categoria', '=', 'categorias.id')
            ->where('livros.titulo', 'like', '%' . request('pesquisa') . '%')
            ->orWhere('livros.autor', 'like', '%' . request('pesquisa') . '%')
            ->orWhere('categorias.nome', 'like', '%' . request('pesquisa') . '%')
            ->paginate(10);

        return view('site.pesquisa', compact('livros'));
    }
    public function details($slug) {
        $livro = Livro::where('slug', $slug)->first();
        return view('site.details', compact('livro'));
    }
    public function login() {
        return view('site.login');
    }
    public function register() {
        return view('site.register');
    }
}

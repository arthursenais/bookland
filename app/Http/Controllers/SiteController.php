<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;


class SiteController extends Controller
{
    public function index() {
        $livros = Livro::paginate(10);
        return view('site.home', compact('livros'));
    }
    public function pesquisar($pesquisa) {
        $livros = Livro::where('titulo','like',$pesquisa)->orWhere('autor','like',$pesquisa);
        return view('site.pesquisa', compact('pesquisa'));
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

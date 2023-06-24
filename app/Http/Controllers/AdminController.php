<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;


class AdminController extends Controller
{
    public function dashboard() {
        $livros = Livro::all();
        $usuarios = User::all();
        $categorias = Categoria::all();
        $ultimoMes = Carbon::now()->subMonth();
        $usuariosAdquiridos = User::where('created_at', '>=', $ultimoMes)->get();
        if (Gate::allows('verDashboard')) {
            return view('admin.dashboard', compact('livros','usuarios','categorias','ultimoMes','usuariosAdquiridos'));
        } else {
            return redirect()->route('index') ;
        }
    }
    public function acervo() {
        $livros = Livro::all();
        if (Gate::allows('verDashboard')) {
            return view('admin.acervo', compact('livros'));
        } else {
            return redirect()->route('index') ;
        }
    }
}

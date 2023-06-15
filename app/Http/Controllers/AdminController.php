<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class AdminController extends Controller
{
    public function dashboard() {
        $livros = Livro::all();
        $usuarios = User::all();
        $categorias = Categoria::all();
        if (Gate::allows('verDashboard')) {
            return view('admin.dashboard', compact('livros','usuarios','categorias'));
        } else {
            return redirect()->route('index') ;
        }
    }
}

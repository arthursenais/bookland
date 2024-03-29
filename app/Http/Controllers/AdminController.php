<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Models\Emprestimo;


class AdminController extends Controller
{
    public function dashboard() {
        if (Gate::allows('verDashboard')) {
            return view('admin.dashboard');
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

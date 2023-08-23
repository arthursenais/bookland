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
        $livros = Livro::all();
        $usuarios = User::all();
        $categorias = Categoria::all();
        $emprestimos = Emprestimo::where('arquivado',0)->get();
        $emprestimosPorSemana = $emprestimos->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('W'); // 'W' representa o número da semana
        });
        if (Gate::allows('verDashboard')) {
            return view('admin.dashboard', compact('livros','usuarios','categorias','emprestimos','emprestimosPorSemana'));
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

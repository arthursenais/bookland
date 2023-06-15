<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $this->authorize('verDashboard');
        $livros = Livro::all();
        $usuarios = User::all();
        return view('admin.dashboard', compact('livros','usuarios'));
    }
}

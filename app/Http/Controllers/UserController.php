<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        if (Gate::allows('verDashboard')) {
            return view('admin.usuarios',compact('usuarios'));

        } else {
            return redirect()->route('index') ;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:users,email',
            'matricula' => 'required|unique:users,matricula',
            'password' => 'required',
            'confirmarpassword' => 'required|same:password',
        ], [
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'Email inválido',
            'matricula.required' => 'O campo matrícula é obrigatório!',
            'matricula.unique' => 'A matrícula digitada já foi registrada. Verifique se há erros de digitação',
            'password.required' => 'O campo senha é obrigatório!',
            'confirmarpassword.required' => 'O campo senha é obrigatório!',
            'confirmarpassword.same' => 'As senhas não estão iguais, Verifique se há erros de digitação'
        ]);

        $user = $validado;
        $user['password'] = bcrypt($user['password']);
        $user = User::create($user);

        Auth::login($user);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

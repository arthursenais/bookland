<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function auth(Request $request) {
        $credenciais = $request->validate([
            'matricula' => ['required'],
            'password' => ['required'],
        ], [
            'matricula.required' => 'O campo matricula é obrigatório!',
            'password.required' => 'O campo senha é obrigatório!'
        ]
    );

        if (Auth::attempt($credenciais,$request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        } else {
            return redirect()->back()->with('erro', 'Matricula ou senha inválida.');
        }


    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('index'));


    }
    public function register() {
        return view('register.create');
    }

}

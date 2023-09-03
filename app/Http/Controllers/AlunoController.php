<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function arquivados()
    {
        $alunos = Aluno::all();
        if (Gate::allows('verDashboard')) {
            return view('admin.listaAlunos', compact('alunos'));
        } else {
            return redirect()->route('index');
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'nome_completo' => 'required',
            'matricula' => 'required|unique:alunos,matricula',
        ], [
            'nome_completo.required' => 'O campo nome completo é obrigatório!',
            'matricula.required' => 'O campo matrícula é obrigatório!',
            'matricula.unique' => 'A matrícula digitada já foi registrada.',
        ]);

        $aluno = $validado;
        $aluno = Aluno::create($aluno);
        return response()->json('Cadastro realizado com sucesso', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        $aluno = Aluno::where('matricula', $request->matricula)->first();
        $aluno->ativo = 0;
        $aluno->save();
        return response()->json('Aluno atualizado com sucesso', 200);
    }
    public function ativar(Request $request, Aluno $aluno)
    {
        $aluno = Aluno::where('matricula', $request->matricula)->first();
        $aluno->ativo = 1;
        $aluno->save();
        return response()->json('Aluno atualizado com sucesso', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}

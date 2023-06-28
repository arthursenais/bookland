<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprestimos = Emprestimo::all();
        return view('user.meusEmprestimos', compact('emprestimos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {   $hoje = Carbon::now()->format('Y-m-d');
        $livro = Livro::where('id', $id)->first();
        return view('user.fazerEmprestimo',compact('livro','hoje'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $emprestimo = $request->all();
            $emprestimo = Emprestimo::create($emprestimo);
            return redirect()->route('meusEmprestimos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprestimos = Emprestimo::where('notificacao',0)->where('arquivado',0)->where('id_usuario',auth()->user()->id)->get();
        return view('user.meusEmprestimos', compact('emprestimos'));
    }
    public function arquivados() {
        $emprestimosArquivados = Emprestimo::where('arquivado',1)->get();
        $emprestimosAtivos = Emprestimo::where('arquivado',0)->get();
        $emprestimos = Emprestimo::all();
        if (Gate::allows('verDashboard')) {
            return view('admin.emprestimos', compact('emprestimos','emprestimosArquivados','emprestimosAtivos'));
        } else {
            return redirect()->route('index') ;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $hoje = Carbon::now()->format('Y-m-d');
        $livro = Livro::where('slug', $slug)->first();
        $usuarios = User::all();

        return view('user.fazerEmprestimo', compact('livro', 'hoje','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emprestimo = $request->all();
        $emprestimo['data_limite'] = Carbon::createFromFormat('Y-m-d', $request->data_emprestimo)->addWeeks($request->semanas);
        $emprestimo['notificacao'] = 0;

        if ($request->data_emprestimo < Carbon::now()->startOfDay()->toDateString() or $request->semanas <= 0) {
            return back()->with('erro', 'Insira uma data válida');
        } elseif (Emprestimo::where('id_livro', $request->id_livro)->where('id_usuario', $request->id_usuario)->exists()) {
            return back()->with('erro', 'Você já possui um empréstimo para este livro');
        } else {
            $emprestimo = Emprestimo::create($emprestimo);
            return redirect()->route('meusEmprestimos');
        }
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
        $emprestimo->notificacao = 0;
        $emprestimo->arquivado = 1;
        $emprestimo->data_limite = Carbon::now();
        $emprestimo->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emprestimo = Emprestimo::find($id);
        $emprestimo->notificacao = 1;
        $emprestimo->save();
        return back()->with('sucesso','Emprestimo removido da lista.');
    }
}

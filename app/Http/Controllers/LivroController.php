<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function novidades()
    {
        $now = Carbon::now();
        $startOfWeek = $now->startOfWeek(Carbon::SUNDAY)->format('Y-m-d H:i:s');
        $endOfWeek = $now->endOfWeek(Carbon::SATURDAY)->format('Y-m-d H:i:s');

        $livros = Livro::whereBetween('created_at', [$startOfWeek, $endOfWeek])->orderBy('created_at','desc')->paginate(10);


        return view('site.novidades', compact('livros'));
    }
    public function populares()
    {
        $livros = Livro::where('emprestados','>=',1)->orderBy('emprestados','desc')->paginate(10);

        return view('site.populares', compact('livros'));
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
        $livro = $request->all();
        if($request->imagem) {
            $livro['imagem'] = $request->imagem->store('livros');
        }
        $livro['slug'] = Str::slug($request->titulo);


        $livro = Livro::create($livro);
        return redirect()->route('dashboard')->with('sucesso','Livro adicionado com sucesso!');

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
        $livro = Livro::find($id);
        if ($request->imagem) {
            $livro->imagem = $request->imagem->store('livros');
        }
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->descricao = $request->descricao;
        $livro->disponiveis = $request->disponiveis;
        $livro->id_categoria = $request->id_categoria;
        $livro->slug = Str::slug($request->titulo);
        $livro->save();
        return redirect()->route('dashboard')->with('sucesso','Livro atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livro = Livro::find($id);
        $livro->delete();
        return redirect()->route('dashboard')->with('sucesso','Livro removido com sucesso!');
    }
    public function destroyAll()
    {
        Livro::truncate();
        return redirect()->route('dashboard')->with('sucesso','Livros removidos com sucesso');
    }
}

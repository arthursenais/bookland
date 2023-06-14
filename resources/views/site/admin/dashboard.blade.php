@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')

<div class="flex flex-col justify-center p-20 items-center ">
    <h1 class="text-4xl">Dashboard</h1>
    <div class="flex flex-col sm:flex-row m-12 gap-6 min-w-full justify-center">
        <div class="shadow-lg p-12  sm:min-w-[500px]  max-h-80 rounded  overflow-auto ">
            <h1 class="text-2xl">Acervo</h1>
            @foreach ( $livros as $livro )

                <li class="border-y py-2 sm:py-5">{{$livro->titulo}}</li>
            @endforeach
        </div>
        <div class="shadow-lg p-12  sm:min-w-[300px] max-h-80 rounded  overflow-auto ">
            <h1 class="text-2xl">Usuários</h1>
           @forelse ($usuarios as $usuario)
               <li>{{$usuario->nome}}</li>
           @empty

           @endforelse
        </div>
    </div>
</div>

<style>


@endsection

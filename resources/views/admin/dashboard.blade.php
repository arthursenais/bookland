@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')
    @auth
    <div class="flex flex-col justify-center p-20 items-center ">
        <h1 class="text-md dark:text-gray-200 text-bold">Bem vindo, {{auth()->user()->nome}}!</h1>
        <h1 class="text-4xl dark:text-gray-200 text-bold">Dashboard</h1>
        <div class="flex flex-col sm:flex-row m-12 gap-6 min-w-full justify-center">
            <div
                class="shadow-lg border  dark:border-gray-600/20 p-12  sm:min-w-[500px]  max-h-80 rounded-lg  overflow-auto ">
                <h1 class="text-2xl dark:text-gray-200">Acervo</h1>
                @foreach ($livros as $livro)
                    <li class="border-y py-2 sm:py-5 dark:text-gray-200">{{ $livro->titulo }}</li>
                @endforeach
            </div>
            <div
                class="shadow-lg border  dark:border-gray-600/20 p-12  sm:min-w-[300px] max-h-80 rounded-lg  overflow-auto ">
                <h1 class="text-2xl dark:text-gray-200">Usuários</h1>
                @forelse ($usuarios as $usuario)
                    <li class="border-y py-2 sm:py-5 dark:text-gray-200">{{ $usuario->nome }}</li>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    @else
    <div class="flex flex-col justify-center p-20 items-center">
        <h1 class="text-4xl dark:text-gray-200 text-bold">Acesso restrito</h1>
    </div>
    @endauth


@endsection

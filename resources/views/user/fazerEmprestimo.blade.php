@extends('site.layout')
@section('title', 'Fazer empréstimo')

@section('content')
    <div class="flex flex-col justify-around p-10 dark:text-white sm:flex-row sm:gap-24">
        <div>
            <h1 class="text-4xl">Fazer empréstimo</h1>
            <form class="flex-col mt-8 justify-evenly">
                <label for="data" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quando você
                    deseja pegar o livro?</label>
             
                    <input  name="data_emprestimo" type="date" autocomplete="nome" required
                        class="block px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm dark:text-black border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-red-500 invalid:text-red-600 focus:invalid:border-red-500 focus:invalid:ring-red-500 ">


                <label for="data_emprestimo" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quanto tempo você precisará para terminar a leitura?</label>

                    <input  value="{{$hoje}}" name="data_emprestimo" type="date" autocomplete="nome" required
                        class="block px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm dark:text-black border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-red-500 invalid:text-red-600 focus:invalid:border-red-500 focus:invalid:ring-red-500 ">

            </form>
        </div>
        <div>
            <h1 class="text-xl max-w-fit">{{ $livro->titulo }}</h1>
            <img class=""
                src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                alt="Imagem">
        </div>
    </div>

@endsection

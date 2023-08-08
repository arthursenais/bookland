@extends('site.layout')
@section('title', 'Fazer empréstimo')

@section('content')
    @include('user.mensagens')
    <div class="flex flex-col-reverse items-center p-10 sm:items-start sm:justify-around dark:text-white sm:flex-row ">
        <div>
            <h1 class="text-4xl">Fazer empréstimo</h1>
            <form method="POST" action="{{ route('storeEmprestimo') }}" class="flex flex-col mt-8 max-w-fit">
                @csrf
                <label for="data" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quando você
                    deseja pegar o livro?</label>

                <input name="data_emprestimo" min="{{ $hoje }}" type="date" autocomplete="nome" required
                    class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm dark:text-black border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-red-500 invalid:text-red-600 focus:invalid:border-red-500 focus:invalid:ring-red-500 ">


                <label for="semanas" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quantas
                    semanas você precisará
                    para terminar a leitura?</label>

                <input min="1" max="4" value="1" name="semanas" type="number" autocomplete="nome"
                    required
                    class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm dark:text-black border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-red-500 invalid:text-red-600 focus:invalid:border-red-500 focus:invalid:ring-red-500">
                <label for="id_usuario" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quem
                    levará o livro?</label>
                <select name="id_usuario"
                    class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm dark:text-black border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-red-500 invalid:text-red-600 focus:invalid:border-red-500 focus:invalid:ring-red-500">
                    @foreach ($usuarios as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->nome}}</option>
                    @endforeach
            
                </select>
                <input type="hidden" name="id_livro" value="{{ $livro->id }}">
                <button type="submit"
                    class=" w-full rounded-md bg-sky-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 mt-4">Alugar</button>
            </form>
        </div>
        <div>
            <h1 class="text-xl max-w-fit">{{ $livro->titulo }}</h1>
            <img class="shadow-lg max-w-sm shadow-black/50 hover:shadow-black/70 dark:shadow-black/30 dark:hover:shadow-black/50 hover:grayscale-0 grayscale-[30%] ease-out duration-300"
                src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                alt="Imagem">
        </div>
    </div>

@endsection

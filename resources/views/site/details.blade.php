@extends('site.layout')
@section('title', 'Bem-vindo!')
@section('content')

    <div class="flex flex-col px-0 sm:px-32">
        <div class="flex flex-col items-center mt-10 sm:flex-row sm:items-start">
            <div class="mb-12 sm:mr-12">
                <h1 class="text-2xl sm:hidden dark:text-gray-300">{{ $livro->titulo }}</h1>
                <img class="shadow-lg max-w-[400px] min-w-[400px] shadow-black/50 hover:shadow-black/70 dark:shadow-black/30 dark:hover:shadow-black/50 hover:grayscale-0 grayscale-[30%] ease-out duration-300"
                    src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}">
            </div>
            <div class="max-w-xs sm:max-w-none">
                <div class="flex items-center">
                    @if ($livro->clube_do_livro == 1)
                    <div class="group relative">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5 fill-blue-500">
                            <path fill-rule="evenodd"
                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                clip-rule="evenodd" />
                            </svg>
                            <p class="text-blue-500  absolute w-max p-2 bottom-5 hidden group-hover:block">Este livro faz parte do clube do livro</p>
                    </div>
                    @endif
                    <h1 class="text-2xl sm:text-4xl dark:text-gray-300"> {{ $livro->titulo }} </h1>
                </div>

                <a href="{{ Route('pesquisar', ['pesquisa' => $livro->autor]) }}"
                    class="text-gray-600 transition-all hover:text-gray-950 dark:hover:text-gray-400 hover:underline">{{ $livro->autor }}</a>
                <br>
                <a href="{{ Route('pesquisar', ['pesquisa' => $livro->categoria->nome]) }}"
                    class="text-gray-600 transition-all hover:text-gray-950 dark:hover:text-gray-400 hover:underline">{{ $livro->categoria->nome }}</a>
                <p class="dark:text-gray-400">{{ $livro->descricao }}</p>
                <div class="sm:mt-10">

                    <p class="dark:text-white">
                        @if ($livro->disponiveis >= 1)
                            {{ $livro->disponiveis }}
                            @if ($livro->disponiveis == 1)
                                exemplar disponível
                            @else
                                exemplares disponíveis
                            @endif
                        @else
                            Nenhum exemplar disponível
                        @endif
                    </p>

                    <div
                        class="flex transition ease-in-out mt-2 sm:hover:scale-105 sm:w-fit max-sm:my-5 max-sm:justify-center">
                        <a href="{{ route('createEmprestimo', $livro->slug) }}"
                            class="p-2 text-white transition border rounded sm:bg-inherit border-sky-600 hover:bg-sky-600 hover:text-white bg-sky-600 sm:p-0 sm:px-2 sm:text-sky-600 sm:rounded-full">Empréstimo</a>
                        {{-- <button
                            class="p-2 text-white transition bg-red-500 border-t border-b border-r border-red-500 rounded sm:bg-inherit hover:bg-red-500 hover:text-white sm:p-0 sm:px-2 sm:text-red-500 sm:rounded-r-full">Reserva</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')

    <div class="flex flex-col px-2 sm:px-32 dark:text-white">

        @if ($livros->isEmpty())
        <div class="flex justify-center p-24">

            <h1>Não há livros ainda!</h1>
        </div>
        @else
            <h1 class="mt-6 text-xl font-medium md:text-2xl dark:text-gray-300">Recém Adicionados</h1>
            <div class="flex w-full gap-4 py-3 overflow-x-auto overflow-y-clip ">

                @foreach ($livros as $livro)
                    <a href="{{ route('details', $livro->slug) }}"
                        class="sm:max-w-[200px] max-w-[120px] sm:hover:scale-105 ease-in transition-all shrink-0 ">
                        <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                            class="rounded">
                        {{-- <p class="line-clamp-2 dark:text-gray-300"> {{ $livro->titulo }} </p> --}}
                    </a>
                @endforeach


            </div>
            <h1 class="mt-6 text-xl font-medium md:text-2xl dark:text-gray-300">Principais Escolhas</h1>

            <div class="flex w-full gap-4 py-3 overflow-x-auto overflow-y-clip ">

                @foreach ($livros as $livro)
                    <a href="{{ route('details', $livro->slug) }}"
                        class="sm:max-w-[200px] max-w-[120px] sm:hover:scale-105 ease-in transition-all shrink-0">
                        <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                            class="rounded">
                        {{-- <p class="line-clamp-2 dark:text-gray-300"> {{ $livro->titulo }} </p> --}}
                    </a>
                @endforeach


            </div>
            @foreach ($categorias as $categoria)
                @if ($categoria->livros->isEmpty())

                @else
                <h1 class="mt-6 text-xl font-medium md:text-2xl dark:text-gray-300">{{ $categoria->nome }}</h1>

                <div class="flex w-full gap-4 py-3 overflow-x-auto overflow-y-clip ">
                    @foreach ($livros as $livro)
                        @if ($livro->categoria->nome == $categoria->nome)
                            <a href="{{ route('details', $livro->slug) }}"
                                class="sm:max-w-[200px] max-w-[120px] sm:hover:scale-105 ease-in transition-all shrink-0">
                                <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                                    class="rounded">
                                {{-- <p class="line-clamp-2 dark:text-gray-300"> {{ $livro->titulo }} </p> --}}
                            </a>
                        @endif
                    @endforeach
                </div>
                @endif
            @endforeach

        </div>
        @endif





@endsection

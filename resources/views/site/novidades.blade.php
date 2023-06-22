@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')

    <h1 class="md:text-4xl text-center mt-6 text-2xl dark:text-gray-300">Novidades da semana</h1>

    <div class="flex flex-col sm:px-32">{{ $livros->links() }}

        <div class="flex flex-wrap gap-4 justify-center  mt-5 mb-5 w-full">

            @forelse ($livros as $livro)
                <a href="{{ route('details', $livro->slug) }}"
                    class="self-stretch max-w-[200px] sm:hover:max-w-[210px] ease-in transition-all  ">
                    <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}" class="rounded">
                    <p class="line-clamp-2 dark:text-gray-300"> {{ $livro->titulo }} </p>
                </a>
            @empty
                <h1 class="md:text-2xl text-center mt-6 text-xl dark:text-gray-300">Sem resultados</h1>
            @endforelse


        </div>
        {{ $livros->links() }}
    </div>

@endsection

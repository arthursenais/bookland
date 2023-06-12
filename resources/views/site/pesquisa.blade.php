@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')

    <h1 class="md:text-4xl text-center mt-6 text-2xl dark:text-gray-300">Catálogo</h1>

    <div class="flex flex-col sm:px-32"> {{ $livros->links() }}

        <div class="flex flex-wrap  justify-center  mt-5 mb-5 w-full">

            @foreach ($livros as $livro)
                <a href="{{ route('details', $livro->slug) }}"
                    class="self-stretch max-w-[200px] sm:hover:max-w-[210px] ease-in transition-all  ">
                    <img src="{{ $livro->imagem }}">
                    <p class="line-clamp-2 dark:text-gray-300"> {{ $livro->titulo }} </p>
                </a>
            @endforeach


        </div>
        {{ $livros->links() }}
    </div>

@endsection

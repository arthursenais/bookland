@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')



<div class="flex flex-col sm:px-32">

    <h1 class="md:text-2xl mt-6 text-xl dark:text-gray-300" >Recém Adicionados</h1>
    <div class="flex  gap-4   w-full overflow-x-auto overflow-y-clip py-3 ">

        @foreach ($livros as $livro)
        <a href="{{ route('details', $livro->slug) }}"
            class="max-w-[200px] sm:hover:scale-105 ease-in transition-all shrink-0 ">
            <img src="{{ $livro->imagem }}" class="rounded">
            {{-- <p class="line-clamp-2 dark:text-gray-300"> {{ $livro->titulo }} </p> --}}
        </a>
        @endforeach


    </div>

    <h1 class="md:text-2xl mt-6 text-xl dark:text-gray-300">Principais Escolhas</h1>

        <div class="flex  gap-4  w-full overflow-x-auto overflow-y-clip py-3 ">

            @foreach ($livros as $livro)
                <a href="{{ route('details', $livro->slug) }}"
                    class="max-w-[200px] sm:hover:scale-105 ease-in transition-all shrink-0">
                    <img src="{{ $livro->imagem }}" class="rounded">
                    {{-- <p class="line-clamp-2 dark:text-gray-300"> {{ $livro->titulo }} </p> --}}
                </a>
            @endforeach


        </div>

        <h1 class="md:text-2xl mt-6 text-xl dark:text-gray-300">Fantasia</h1>

            <div class="flex  gap-4  w-full overflow-x-auto overflow-y-clip py-3 ">

                @foreach ($livros as $livro)
                    <a href="{{ route('details', $livro->slug) }}"
                        class="max-w-[200px] sm:hover:scale-105 ease-in transition-all shrink-0">
                        <img src="{{ $livro->imagem }}" class="rounded">
                        {{-- <p class="line-clamp-2 dark:text-gray-300"> {{ $livro->titulo }} </p> --}}
                    </a>
                @endforeach


            </div>

        </div>
    </div>

@endsection

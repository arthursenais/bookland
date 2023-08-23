@extends('site.layout')
@section('title', 'Bem-vindo!')
@section('content')

    <div class="flex flex-wrap justify-evenly gap-1 px-2 mt-10 sm:px-32 dark:text-white">
        @if ($livros->isEmpty())
            <div class="flex justify-center p-24">
                <h1>Não há livros ainda!</h1>
            </div>
        @else
            @foreach ($categorias as $categoria)
                <button onclick="collapse(this)" type="button" id="categoria{{ $categoria->id }}"
                    class=" flex items-center justify-center  h-[100px] w-[200px] hover:to-purple-800  transition rounded-lg ">
                    {{ $categoria->nome }}
                </button>
                {{-- <div class="swiper mySwiper{{ $categoria->id }} w-[100%] hidden">
                    <div class="swiper-wrapper p-3">
                        @foreach ($livros as $livro)
                            @if ($livro->categoria->nome == $categoria->nome)
                                <div class="swiper-slide transition ">
                                    <a class="sm:w-[160px] sm:h-[230px] sm:hover:scale-110 transition rounded-lg bg-gray-900 flex justify-center items-center"
                                        href="{{ route('details', $livro->slug) }}">
                                        <img class="sm:max-w-[150px] sm:max-h-[200px]"
                                            src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div
                        class="swiper-button-prev rounded-full bg-white/50 opacity-75 hover:opacity-100 dark:bg-gray-800/70 shadow dark:shadow-black dark:shadow-lg backdrop-blur p-8 hover:scale-110 transition text-black dark:text-white">
                    </div>
                    <div
                        class="swiper-button-next rounded-full bg-white/50 opacity-75 hover:opacity-100 dark:bg-gray-800/70 shadow dark:shadow-black dark:shadow-lg backdrop-blur p-8 hover:scale-110 transition text-black dark:text-white">
                    </div>
                </div> --}}
            @endforeach
    </div>
    @endif
    <script>
        @foreach ($categorias as $categoria)

            $('categoria{{ $categoria->id }}').css({
                background: 'linear-gradient(to right, red,yellow)'
            });
            
        @endforeach
        function collapse(x) {
            $(x).toggleClass('bg-gray-900');
        }
    </script>




@endsection

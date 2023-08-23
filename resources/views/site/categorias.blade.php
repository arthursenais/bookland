@extends('site.layout')
@section('title', 'Bem-vindo!')
@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
@endsection
@section('content')

    <div class="flex flex-col px-2 sm:px-32 dark:text-white">
        @if ($livros->isEmpty())
            <div class="flex justify-center p-24">
                <h1>Não há livros ainda!</h1>
            </div>
        @else
            @foreach ($categorias as $categoria)
                <button onclick="collapse(this)" type="button" id="categoria-{{ $categoria->id }}"
                    class=" flex items-center p-3  transition rounded-lg justify-between sm:w-[30em] mt-10 gap-10">
                    <div class="flex items-center gap-5 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                        </svg>
                        <div class="truncate max-w-[20em]">
                            {{ $categoria->nome }}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
                <div class="swiper mySwiper{{ $categoria->id }} w-[100%] hidden">
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
                </div>
            @endforeach
    </div>
    @endif
    <script>
        @foreach ($categorias as $categoria)
            const swiper{{ $categoria->id }} = new Swiper('.mySwiper{{ $categoria->id }}', {
                loop: false,
                centerInsufficientSlides: false,
                centeredSlides: false,
                slidesPerGroup: 2,
                spaceBetween: 5,
                slidesPerView: 3,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    800: {
                        slidesPerView: 6.2,
                    },
                },
            });

            function collapse(x) {
                $(x).toggleClass('bg-gray-900');
                $(x).next().toggleClass('hidden');
            }
        @endforeach
    </script>




@endsection

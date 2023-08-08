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
            <div class="swiper mySwiper1 w-[90%]">
                <h1 class="mt-6 text-xl font-medium md:text-2xl dark:text-gray-300">Livros na biblioteca</h1>
                <div class="items-center swiper-wrapper">
                    @foreach ($livros as $livro)
                        <div class="swiper-slide">
                            <a href="{{ route('details', $livro->slug) }}">
                                <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                                    >
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="swiper mySwiper2 w-[90%]">
                <h1 class="mt-6 text-xl font-medium md:text-2xl dark:text-gray-300">Principais escolhas</h1>
                <div class="items-center swiper-wrapper">
                    @foreach ($livros->sortBy('autor') as $livro)
                        <div class="swiper-slide">
                            <a href="{{ route('details', $livro->slug) }}">
                                <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                                    >
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            @foreach ($categorias as $categoria)
            @if ($categoria->livros->isEmpty())
            @else
            <div class="swiper mySwiper{{$categoria->id}} w-[90%]">
                <h1 class="mt-6 text-xl font-medium md:text-2xl dark:text-gray-300">{{$categoria->nome}}</h1>
                <div class="items-center swiper-wrapper">
                    @foreach ($livros as $livro)
                    @if ($livro->categoria->nome == $categoria->nome)
                        <div class="swiper-slide">
                            <a href="{{ route('details', $livro->slug) }}">
                                <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}">
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach

    </div>
    @endif
    <script>
        const swiper = new Swiper('.mySwiper1', {
            loop: false,
            autoplay: {
                delay: 2000,
            },
            grabCursor: true,
            centeredSlides: false,
            spaceBetween: 5,
            slidesPerView: 3,
            breakpoints: {

                800: {
                    slidesPerView: 6,
                    loop: false,
                },
            },
        });
        const swiper2 = new Swiper('.mySwiper2', {
            loop: false,
            autoplay: {
                delay: 2000,
            },
            grabCursor: true,
            centeredSlides: false,
            spaceBetween: 5,
            slidesPerView: 3,
            breakpoints: {
                800: {
                    slidesPerView: 6,
                    loop: false,
                },

            },
        });
        @foreach ($categorias as $categoria)
        const swiper{{$categoria->id}} = new Swiper('.mySwiper{{$categoria->id}}', {
            loop: false,
            autoplay: {
                delay: 2000,
            },
            grabCursor: true,
            centeredSlides: false,
            spaceBetween: 5,
            slidesPerView: 3,
            breakpoints: {
                800: {
                    slidesPerView: 6,
                    loop: false,
                },

            },
        });
            @endforeach
    </script>




@endsection

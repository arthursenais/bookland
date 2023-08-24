@extends('site.layout')
@section('title', 'Bem-vindo!')
@section('content')

    <div class="flex flex-wrap  gap-4 px-2 mt-10 sm:px-24    dark:text-white">
        @if ($livros->isEmpty())
            <div class="flex justify-center p-24">
                <h1>Não há livros ainda!</h1>
            </div>
        @else
            @foreach ($categorias->sortBy('id') as $categoria)
                <button onclick="collapse('#modal{{ $categoria->id }}')" type="button" id="categoria{{ $categoria->id }}"
                    class=" flex items-center justify-center hover:scale-105 h-[100px] w-[200px] hover:to-purple-800  transition rounded-lg ">
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
                <div class="modal fixed inset-0 z-40 flex justify-center  bg-gray-950/80 hidden"
                    id="modal{{ $categoria->id }}">
                    <div class="bloco w-[450px] p-5 m-5 min-h-[350px] overflow-auto ">
                        <div class="w-full flex items-top justify-between">
                            <h1 class="text-2xl">{{ $categoria->nome }}</h1>
                            <button type="button"
                                class="fechar w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600">close</button>
                        </div>
                        <div class="flex flex-wrap items-center gap-x-5 gap-y-2 justify-center mt-2">
                            @foreach ($livros as $livro)
                                @if ($livro->categoria->nome == $categoria->nome)
                                    <a class="livro sm:hover:scale-110  transition rounded-lg flex flex-col justify-center items-center"
                                        href="{{ route('details', $livro->slug) }}">
                                        <img class="w-[100px]  transition h-[150px]"
                                            src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}">
                                        <p class="absolute hidden transition text-center ">{{ $livro->titulo }}</p>
                                    </a>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach
    </div>
    @endif
    <script>
        var cores = [
            'linear-gradient(295deg, rgba(10,35,143,1) 0%, rgba(3,128,194,1) 100%)', // azul com azul escuro
            'linear-gradient(295deg, #FF3CAC 0%, #784BA0 50%, #2B86C5 100%)', // azul com lilas
            'linear-gradient(295deg, rgba(10,35,143,1) 0%, rgba(194,3,99,1) 100%)', // roxo com azul
            'linear-gradient(295deg, rgba(201,14,187,1) 0%, rgba(39,2,138,1) 100%)', // azul com rosa
            'linear-gradient(295deg, rgba(143,77,10,1) 0%, rgba(164,3,194,1) 100%)', // roxo com laranja
            'linear-gradient(295deg, rgba(201,45,14,1) 0%, rgba(227,107,7,1) 100%)', // laranja e laranja
            'linear-gradient(295deg, rgba(201,14,140,1) 0%, rgba(138,2,2,1) 100%)', // vermelho com rosa

        ];
        @foreach ($categorias as $categoria)
            corAleatoria = cores[Math.floor(Math.random() * cores.length) + 0];
            $('#categoria{{ $categoria->id }}').css({
                background: corAleatoria
            });
            $('#modal{{ $categoria->id }}').find('.bloco').css({
                background: corAleatoria
            });
        @endforeach
        function collapse(modal) {
            $(modal).toggleClass('hidden').css({
                opacity: 0,
            });
            $(modal).find('.bloco').css({
                scale: 0.9,
            });
            $(modal).animate({
                opacity: 1,
            }, 200);
            $(modal).find('.bloco').animate({
                scale: 1,
            }, 200);
        }

        $(".modal").click(function(e) {
            if (e.target != this) {
                return;
            }
            $(this).toggleClass('hidden');
        });
        $(".livro").hover(function() {
            $(this).find('p').toggleClass('hidden');
            $(this).find('img').css({
                filter: 'brightness(0.2)',
            });
        })

        $(".livro").mouseleave(function() {
            $(this).find('img').css('filter', 'brightness(1)');
        })

        $(".fechar").click(function() {
            $(this).closest('.modal').toggleClass('hidden');
        })
    </script>




@endsection

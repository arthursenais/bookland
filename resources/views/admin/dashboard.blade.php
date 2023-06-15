@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')
    @auth
        <div class="flex flex-col justify-center items-center mt-4 ">

            <h1 class="text-md dark:text-gray-200 text-bold">Bem vindo, {{ auth()->user()->nome }}!</h1>
            <h1 class="text-4xl dark:text-gray-200 text-bold hover:animate-pulse cursor-default">Bomlivro</h1>
            <div class="flex flex-col lg:flex-row m-12 gap-6 min-w-full justify-center">
                <div>
                    <div class="flex align-bottom gap-2 ">
                        <h1 class="text-2xl dark:text-gray-200">{{ $livros->count() }} Items no Acervo</h1>
                        <input type="text" placeholder="Pesquisar no acervo" id="searchAcervo"
                            class="bg-transparent outline-none max-w-[150px] dark:text-white border-b">
                    </div>
                    <div id='results'
                        class="shadow-lg border  dark:border-gray-600/20   sm:min-w-[500px] min-h-full max-h-80 rounded-lg  overflow-auto ">

                        @forelse ($livros as $livro)
                            <a href="{{ route('details', $livro->slug) }}"
                                class="linkLivro flex items-center py-2 gap-4 hover:bg-gray-200 dark:hover:bg-gray-700 transition dark:text-gray-200">
                                <img src="{{ $livro->imagem }}" alt="imagem" class="max-w-[64px] rounded">
                                <p class="max-w-xs">
                                    {{ $livro->titulo }}
                                </p>
                            </a>
                        @empty
                            Não há livros no acervo
                        @endforelse
                    </div>
                </div>


                <div>
                    <h1 class="text-2xl dark:text-gray-200"> {{ $usuarios->count() }} Usuários Cadastrados</h1>
                    <div
                        class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        @forelse ($usuarios as $usuario)
                            <a href="#"
                                class="block hover:bg-gray-200 dark:hover:bg-gray-700 transition py-2 sm:py-5 dark:text-gray-200">{{ $usuario->nome }}</a>
                        @empty
                        @endforelse
                    </div>
                </div>



                <div>
                    <h1 class="text-2xl dark:text-gray-200">{{ $categorias->count() }} Categorias</h1>
                    <div
                        class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        @forelse ($categorias as $categoria)
                            <a href="#"
                                class="block hover:bg-gray-200 dark:hover:bg-gray-700 transition py-2 sm:py-5 dark:text-gray-200">{{ $categoria->nome }}</a>
                        @empty
                            Não há categorias
                        @endforelse
                    </div>
                </div>



            </div>
            <h1 class="text-4xl dark:text-gray-200 text-bold hover:animate-pulse cursor-default mt-4">Gráficos</h1>
            <div class="flex flex-col lg:flex-row m-12 gap-6 min-w-full justify-center">
                <div>
                    <h1 class="text-2xl dark:text-gray-200">Aquisição de usuários</h1>
                    <div    class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        <h1>Gráfico emprestimos realizados no tempo</h1>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl dark:text-gray-200">Livros</h1>
                    <div    class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        <h1>Gráfico pizza mostrando a quais categorias os livros pertencem </h1>
                    </div>
                    
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col justify-center p-20 items-center">
            <h1 class="text-4xl dark:text-gray-200 text-bold">Acesso restrito</h1>
        </div>
    @endauth

    <script>
        const searchInput = document.getElementById('searchAcervo');
        const resultsContainer = document.getElementById('results');
        const links = Array.from(document.getElementsByClassName('linkLivro'));

        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.toLowerCase();
            const filteredLinks = links.filter(link =>
                link.textContent.toLowerCase().includes(searchTerm)
            );

            resultsContainer.innerHTML = '';

            filteredLinks.forEach(link => {
                resultsContainer.appendChild(link.cloneNode(true));
            });
        });
    </script>
@endsection

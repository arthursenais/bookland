@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')
    @auth

        <div class="flex flex-col justify-center items-center mt-4 ">

            @include('admin.mensagens')
            <h1 class="text-md dark:text-gray-200 text-bold">Bem vindo, {{ auth()->user()->nome }}!</h1>
            <h1 class="text-4xl dark:text-gray-200 text-bold hover:animate-pulse cursor-default">Bomlivro</h1>
            <div class="flex flex-col lg:flex-row m-12 gap-6 min-w-full justify-center">
                <div>
                    <div class="flex align-bottom gap-2 ">
                        <p class="text-2xl dark:text-gray-200">{{ $livros->count() }} Items no Acervo</p>
                        <input type="text" placeholder="Pesquisar no acervo" id="searchAcervo" class="bg-transparent outline-none max-w-[150px] dark:text-white border-b">
                    </div>

                    <div id='results'
                        class="shadow-lg border  dark:border-gray-600/20   sm:min-w-[500px] min-h-full max-h-80 rounded-lg  overflow-auto ">

                        @forelse ($livros as $livro)
                            <div
                                class="linkLivro flex items-center justify-around  hover:bg-gray-200 dark:hover:bg-gray-700 transition dark:text-gray-200">
                                <a href="{{ route('details', $livro->slug) }}" class="flex items-center w-[90%] gap-2 p-2">
                                    <img src="{{ $livro->imagem }}" alt="imagem" class="max-w-[64px] rounded">
                                    <div>
                                        <p class="max-w-xs">
                                            {{ $livro->titulo }}
                                        </p>
                                        <p class="italic font-thin ">{{ $livro->categoria->nome }} - {{ $livro->autor }} </p>
                                    </div>

                                </a>
                                <button type="button" onclick="modalLivro({{$livro->id}})" class="rounded-full bg-red-500 h-12 w-12 material-icons mr-2 text-white hover:bg-red-600 transition">edit</button>
                            </div>
                            @include('admin.modalLivro')
                        @empty
                            Não há livros no acervo
                        @endforelse
                    </div>
                    <button type="button"  onclick="modalAddLivro()" class="rounded-full relative bottom-4 right-4 bg-indigo-500 h-16 w-16 material-icons mr-2 text-white hover:bg-indigo-600 transition">add</button>
                </div>


                <div>
                    <h1 class="text-2xl dark:text-gray-200"> {{ $usuarios->count() }} Usuários Cadastrados</h1>
                    <div
                        class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        @forelse ($usuarios as $usuario)
                            <div
                                class="flex items-center justify-around  hover:bg-gray-200 dark:hover:bg-gray-700 transition dark:text-gray-200">
                                <a href="{{ route('details', $livro->slug) }}" class="flex items-center w-[90%] gap-2 p-2">
                                    <div>
                                        <p class="max-w-xs"> @if ($usuario->admin == 1)
                                            <label class="bg-purple-900/30 w-min p-1 rounded-lg text-xs">Admin</label>
                                        @endif
                                            {{ $usuario->nome }}
                                        </p>
                                        <p class="italic font-thin ">Cadastrado em {{ $usuario->created_at->format('d/m/y') }}
                                        </p>
                                    </div>
                                </a>
                                <button onclick="modalUsuario({{$usuario->id}})"
                                    class="rounded-full bg-red-500 h-12 w-12 material-icons mr-2 text-white hover:bg-red-600 transition">visibility</button>
                            </div>
                            @include('admin.modalUsuario')
                        @empty
                        sem usuarios
                        @endforelse
                    </div>
                </div>



                <div>
                    <h1 class="text-2xl dark:text-gray-200">{{ $categorias->count() }} Categorias</h1>
                    <div
                        class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        @forelse ($categorias as $categoria)
                            <a href="#"
                                class="block hover:bg-gray-200 dark:hover:bg-gray-700 transition py-2 sm:py-5 dark:text-gray-200 px-2">{{ $categoria->nome }}</a>
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
                    <div
                        class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        <h1>Gráfico emprestimos realizados no tempo</h1>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl dark:text-gray-200">Livros</h1>
                    <div
                        class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        <h1>Gráfico pizza mostrando a quais categorias os livros pertencem </h1>
                    </div>

                </div>
            </div>
        </div>
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
    @else
        <div class="flex flex-col justify-center p-20 items-center">
            <h1 class="text-4xl dark:text-gray-200 text-bold">Acesso restrito</h1>
        </div>
    @endauth

@endsection

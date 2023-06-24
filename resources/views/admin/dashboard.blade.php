@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')
    @auth

        <div class="flex flex-col items-center justify-center mt-4">

            @include('admin.mensagens')
            <h1 class="text-md dark:text-gray-200 text-bold">Bem vindo, {{ auth()->user()->nome }}!</h1>
            <h1 class="text-4xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">BookLand</h1>
            <div class="flex flex-col justify-center min-w-full gap-6 m-12 lg:flex-row">
                <div>
                    <div class="flex gap-2 align-bottom ">
                        <p class="text-2xl dark:text-gray-200">{{ $livros->count() }} Items no Acervo</p>
                    </div>

                    <div id='results'
                        class="shadow-lg border  dark:border-gray-600/20   sm:min-w-[500px] min-h-full max-h-80 rounded-lg  overflow-auto ">

                        @forelse ($livros as $livro)
                            <div
                                class="flex items-center justify-around transition linkLivro hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                                <a href="{{ route('details', $livro->slug) }}" class="flex items-center w-[90%] gap-2 p-2">
                                    <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                                        alt="imagem" class="max-w-[64px] rounded">
                                    <div>
                                        <p class="max-w-xs">
                                            {{ $livro->titulo }}
                                        </p>
                                        <p class="italic font-thin ">{{ $livro->categoria->nome }} - {{ $livro->autor }} </p>
                                    </div>

                                </a>
                                <button type="button" onclick="modalLivro({{ $livro->id }})"
                                    class="w-12 h-12 mr-2 text-white transition bg-red-500 rounded-full material-icons hover:bg-red-600">edit</button>
                            </div>
                            @include('admin.modalLivro')
                        @empty
                            Não há livros no acervo
                        @endforelse
                    </div>
                    <button type="button" onclick="modalAddLivro()"
                        class="relative w-16 h-16 mr-2 text-white transition bg-indigo-500 rounded-full bottom-4 right-4 material-icons hover:bg-indigo-600">add</button>
                </div>


                <div>
                    <h1 class="text-2xl dark:text-gray-200"> {{ $usuarios->count() }} Usuários Cadastrados</h1>
                    <div
                        class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        @forelse ($usuarios as $usuario)
                            <div
                                class="flex items-center justify-around transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                                <div class="flex items-center w-[90%] gap-2 p-2">
                                    <div>
                                        <p class="max-w-xs">
                                            @if ($usuario->admin == 1)
                                                <label class="p-1 text-xs rounded-lg bg-purple-900/30 w-min">Admin</label>
                                            @endif
                                            {{ $usuario->nome }}
                                        </p>
                                        <p class="italic font-thin ">Cadastrado em {{ $usuario->created_at->format('d/m/y') }}
                                        </p>
                                    </div>
                                </div>
                                <button onclick="modalUsuario({{ $usuario->id }})"
                                    class="w-12 h-12 mr-2 text-white transition bg-red-500 rounded-full material-icons hover:bg-red-600">visibility</button>
                            </div>
                            @include('admin.modalUsuario')
                        @empty
                            sem usuarios
                        @endforelse
                    </div>
                </div>



                <div>
                    <h1 class="text-2xl dark:text-gray-200"> {{ $categorias->count() }}Categorias</h1>
                    <div
                        class="shadow-lg border  dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
                        @forelse ($categorias as $categoria)
                            <div
                                class="flex items-center justify-around transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                                <div class="flex items-center w-[90%] gap-2 p-2">
                                    <div>
                                        <p class="max-w-xs">

                                            {{ $categoria->nome }}
                                        </p>

                                    </div>
                                </div>
                                <button onclick="modalCategoria({{ $categoria->id }})"
                                    class="w-12 h-12 mr-2 text-white transition bg-red-500 rounded-full material-icons hover:bg-red-600">edit</button>
                            </div>
                            @include('admin.modalCategoria')
                        @empty
                            sem usuarios
                        @endforelse
                    </div>
                </div>



            </div>
            <h1 class="mt-4 text-2xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Gráficos</h1>
            <div class="flex flex-col items-center justify-center gap-8 sm:items-start lg:flex-row">
                {{-- grafico livros --}}
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <div>
                    <h1 class="text-2xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Livros por categoria
                    </h1>
                    <div class="relative sm:w-[450px] sm:h-[600px] border rounded-lg shadow-lg dark:border-gray-600/20 ">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div>
                    <div>
                        <h1 class="text-2xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Grafico 2</h1>
                        <div class="relative sm:w-[450px] sm:h-[200px] border rounded-lg shadow-lg dark:border-gray-600/20 ">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Grafico 3</h1>
                        <div class="relative sm:w-[450px] sm:h-[200px] border rounded-lg shadow-lg dark:border-gray-600/20 ">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const categorias = [
                @foreach ($categorias as $categoria)
                    '{{ $categoria->nome }}',
                @endforeach
            ];
            const livrosPorCategoria = [
                @foreach ($categorias as $categoria)
                    '{{ $categoria->livros->count() }}',
                @endforeach
            ];

            const datas = [
                @foreach ($usuarios as $usuario)
                    "{{ $usuario->created_at->format('Y-m-d') }}",
                @endforeach
            ];

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: categorias,
                    datasets: [{
                        label: '# de Livros',
                        data: livrosPorCategoria,
                        borderWidth: 1
                    }],

                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                }
            });
        </script>
    @else
        <div class="flex flex-col items-center justify-center p-20">
            <h1 class="text-4xl dark:text-gray-200 text-bold">Acesso restrito</h1>
        </div>
    @endauth

@endsection

<h1 class="text-4xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Livros</h1>
<div id="livrosDiv" class="flex flex-col sm:flex-row">
    <div class="sm:min-w-[800px]">
        <div class="flex gap-5 align-bottom dark:text-white">
            <p class="text-2xl dark:text-gray-200">{{ $livros->count() }} Items no Acervo</p>
            <div class="align-center gap-2 flex">
                Pesquisar:
                <input type="text" id="pesquisa" autocomplete="off" class="bg-transparent border h-min">
            </div>
        </div>

        <div id='results'
            class="shadow-lg border listaDiv dark:border-gray-600/20   sm:min-w-[500px]  min-h-full max-h-80 rounded-lg  overflow-auto ">
            @forelse ($livros->sortBy('titulo') as $livro)
                <div
                    class="flex items-center group justify-around transition item-livro hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                    <a href="{{ route('details', $livro->slug) }}" class="flex items-center w-[90%] gap-2 p-2">
                        <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                            alt="imagem" class="max-w-[64px] rounded">
                        <div>
                            <p class="max-w-xs">

                                {{ $livro->titulo }}
                                @if ($livro->disponiveis <= 0)
                                    <label
                                        class="text-xs bg-red-500/30 px-2 rounded-full">{{ $livro->disponiveis }}</label>
                                @else
                                    <label
                                        class="text-xs bg-blue-500/30 px-2 rounded-full">{{ $livro->disponiveis }}</label>
                                @endif
                                @if ($livro->clube_do_livro == 1)

                                <label
                                class="text-xs bg-blue-500/30 px-2 rounded-full">Clube da leitura</label>

                                @endif
                            </p>

                            <p class="italic font-thin">{{ $livro->categoria->nome }} || {{ $livro->autor }}
                            </p>
                        </div>

                    </a>
                    <button type="button" onclick="modalLivro({{ $livro->id }})"
                        class="w-12 h-12 invisible group-hover:visible mr-2 text-white transition bg-red-500 rounded-full sm:w-8 sm:h-8 material-icons hover:bg-red-600">edit</button>
                </div>
                @include('admin.modalLivro')
            @empty
                <p class="p-6 text-white max-w-[500px]">
                    Não há livros no acervo. Clique no botão "+" para adicionar livros! Precisará ter ao
                    menos
                    uma
                    categoria no banco de dados
                </p>
                @include('admin.modalLivro')
            @endforelse
        </div>
        <div class="flex justify-between">
            <button type="button" onclick="modalAddLivro()"
                class="relative w-16 h-16 text-white transition bg-indigo-500 rounded-full z-40 bottom-4 right-4 material-icons hover:bg-indigo-600">add</button>

        </div>
    </div>


    <div>
        <h1 class="text-2xl dark:text-gray-200 "> {{ $categorias->count() }} Categorias</h1>
        <div
            class="shadow-lg border listaDiv dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
            @forelse ($categorias as $categoria)
                <div
                    class="flex items-center group justify-around transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                    <a href="{{ Route('pesquisar', ['pesquisa' => $categoria->nome]) }}"
                        class="flex items-center w-[90%] gap-2 py-5 p-2">
                        <div>
                            <p class="max-w-xs">
                                {{ $categoria->nome }}
                            </p>

                        </div>
                    </a>
                    <button onclick="modalCategoria({{ $categoria->id }})"
                        class="w-12 h-12 mr-2 invisible group-hover:visible text-white transition bg-red-500 rounded-full material-icons hover:bg-red-600 sm:w-8 sm:h-8">edit</button>
                </div>
                @include('admin.modalCategoria')
            @empty
                <p class="p-4 text-white max-w-[300px]">Adicione categorias para começar a adicionar livros!
                </p>
                @include('admin.modalCategoria')
            @endforelse
        </div>

        <div class="flex justify-between mb-2">
            <button type="button" onclick="modalAddCategoria()"
                class="relative w-16 h-16 text-white transition bg-indigo-500 rounded-full bottom-4 right-4 material-icons hover:bg-indigo-600">add</button>
        </div>
    </div>
</div>

{{-- grafico livros --}}
<div class="mt-20">
    <h1 class="text-2xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Livros por
        categoria
    </h1>
    <div class="relative w-[300px] sm:w-[450px] sm:h-[600px] border rounded-lg shadow-lg dark:border-gray-600/20 ">
        <canvas id="myChart"></canvas>
    </div>
</div>


{{-- Script --}}
<script>
    $("#pesquisa").on('keyup', function() {
        var pesquisa = $(this).val().toLowerCase();

        $(".item-livro").each(function() {
            if ($(this).html().toLowerCase().indexOf(pesquisa) != -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
</script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var categorias = [
        @foreach ($categorias as $categoria)
            '{{ $categoria->nome }}',
        @endforeach
    ];
    var livrosPorCategoria = [
        @foreach ($categorias as $categoria)
            '{{ $categoria->livros->count() }}',
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

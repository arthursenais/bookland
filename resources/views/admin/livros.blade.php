<h1 class="text-4xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Livros</h1>
<div class="flex flex-col sm:flex-row">
    <div>
        <div class="flex gap-2 align-bottom ">
            <p class="text-2xl dark:text-gray-200">{{ $livros->count() }} Items no Acervo</p>
        </div>

        <div id='results'
            class="shadow-lg border listaDiv dark:border-gray-600/20   sm:min-w-[500px]  min-h-full max-h-80 rounded-lg  overflow-auto ">
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
                            <p class="italic font-thin">{{ $livro->categoria->nome }} - {{ $livro->autor }}
                            </p>
                        </div>

                    </a>
                    <button type="button" onclick="modalLivro({{ $livro->id }})"
                        class="w-12 h-12 mr-2 text-white transition bg-red-500 rounded-full sm:w-8 sm:h-8 material-icons hover:bg-red-600">edit</button>
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
                class="relative w-16 h-16 text-white transition bg-indigo-500 rounded-full bottom-4 right-4 material-icons hover:bg-indigo-600">add</button>
            <button type="button" id="confirmar1" onclick="confirmarApagar1()"
                class="z-0 p-3 text-sm transition bg-gray-900 border rounded border-slate-500 text-slate-500 hover:bg-gray-950 border-3 black h-min">Remover
                tudo</button>
        </div>
    </div>


    <div>
        <h1 class="text-2xl dark:text-gray-200 "> {{ $categorias->count() }} Categorias</h1>
        <div
            class="shadow-lg border listaDiv dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
            @forelse ($categorias as $categoria)
                <div
                    class="flex items-center justify-around transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                    <a href="{{ Route('pesquisar', ['pesquisa' => $categoria->nome]) }}"
                        class="flex items-center w-[90%] gap-2 py-5 p-2">
                        <div>
                            <p class="max-w-xs">
                                {{ $categoria->nome }}
                            </p>

                        </div>
                    </a>
                    <button onclick="modalCategoria({{ $categoria->id }})"
                        class="w-12 h-12 mr-2 text-white transition bg-red-500 rounded-full material-icons hover:bg-red-600 sm:w-8 sm:h-8">edit</button>
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
            <button type="button" id="confirmar2" onclick="confirmarApagar2()"
                class="z-0 p-3 text-sm transition bg-red-600 dark:bg-gray-900 border rounded dark:border-slate-500 dark:text-slate-500 text-white hover:bg-red-700 dark:hover:bg-gray-950 border-3 black h-min">Remover
                tudo</button>

        </div>
    </div>
</div>

    {{-- grafico livros --}}
    <div class="mt-20">
        <h1 class="text-2xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Livros por
            categoria
        </h1>
        <div
            class="relative w-[300px] sm:w-[450px] sm:h-[600px] border rounded-lg shadow-lg dark:border-gray-600/20 ">
            <canvas id="myChart"></canvas>
        </div>
    </div>







{{-- modais --}}


{{-- modal remover livros --}}
<div class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900/50" id="modalApagarTudo">
    <form class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[300px]"
        method="post" action="{{ route('admin.deleteAllLivros') }}">
        @method('DELETE')
        @csrf
        <div class="flex items-center justify-between w-full mb-4">
            <h1 class="max-w-xs text-xl">Remover todos os livros do banco de dados?</h1>
            <button type="button"
                class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                onclick='resetConfirmar1()'>close</button>
        </div>
        <p>Esta ação não poderá ser desfeita e não é recomendada</p>
        <button type="submit"
            class="p-2 transition bg-indigo-600 rounded w-min hover:bg-indigo-700">Confirmar</button>
    </form>
</div>
{{-- modal remover categorias --}}
<div class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900/50" id="modalApagarTudo2">
    <form class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[300px]"
        method="post" action="{{ route('admin.deleteAllCategorias') }}">
        @method('DELETE')
        @csrf
        <div class="flex items-center justify-between w-full mb-4">
            <h1 class="max-w-xs text-xl">Remover todos as categorias do banco de dados?</h1>
            <button type="button"
                class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                onclick='resetConfirmar2()'>close</button>
        </div>
        <p>Esta ação não poderá ser desfeita e não é recomendada</p>
        <button type="submit"
            class="p-2 transition bg-indigo-600 rounded w-min hover:bg-indigo-700">Confirmar</button>
    </form>

</div>


{{-- Script --}}

<script>
    var confirmar1 = document.getElementById('confirmar1');
    var confirmar2 = document.getElementById('confirmar2');

    function confirmarApagar1() {
        confirmar1.classList.add("bg-red-600", "hover:bg-red-700", "text-white");
        confirmar1.innerHTML = "Tem certeza?";
        confirmar1.setAttribute("onclick", "modalApagarTudo()");
        confirmar1.classList.remove("bg-gray-900", "border", "text-slate-500");
    }

    function confirmarApagar2() {
        confirmar2.classList.add("bg-red-600", "hover:bg-red-700", "text-white");
        confirmar2.innerHTML = "Tem certeza?";
        confirmar2.setAttribute("onclick", "modalApagarTudo2()");
        confirmar2.classList.remove("bg-gray-900", "border", "text-slate-500");
    }

    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modalApagarTudo');
        if (event.target === modal) {
            resetConfirmar1();
        }
    });

    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modalApagarTudo2');
        if (event.target === modal) {
            resetConfirmar2();
        }
    });

    function resetConfirmar1() {
        confirmar1.classList.add("bg-gray-900", "border", "text-slate-500");
        confirmar1.innerHTML = "Remover tudo";
        confirmar1.classList.remove("bg-red-600", "hover:bg-red-700", "text-white");
        confirmar1.setAttribute("onclick", "confirmarApagar1()");
        document.getElementById("modalApagarTudo").classList.add("hidden");
    }

    function resetConfirmar2() {
        confirmar2.classList.add("bg-gray-900", "border", "text-slate-500");
        confirmar2.innerHTML = "Remover tudo";
        confirmar2.classList.remove("bg-red-600", "hover:bg-red-700", "text-white");
        confirmar2.setAttribute("onclick", "confirmarApagar2()");
        document.getElementById("modalApagarTudo").classList.add("hidden");
    }

    function modalApagarTudo() {
        document.getElementById('modalApagarTudo').classList.remove("hidden");
    }

    function modalApagarTudo2() {
        document.getElementById('modalApagarTudo2').classList.remove("hidden");
    }



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

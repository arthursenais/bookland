@extends('site.layout')
@section('title', 'emprestimos')
@section('content')
    @include('user.mensagens')
    @php
        use Carbon\Carbon;
    @endphp

    @include('user.mensagens')
    <div class="flex items-center p-10 sm:items-start sm:justify-around dark:text-white sm:flex-row">
        <div class="rounded">
            <h1 class="text-4xl">Meus empréstimos</h1>
            <div class="flex flex-wrap w-full mt-5 mb-5 justify-evenly">

                @forelse ($emprestimos as $emprestimo)
                    <div class="p-2 max-w-[250px] flex items-center flex-col">
                        <div class="relative">
                            <button type="button" id="botao" onclick="mostrarDetalhes({{ $emprestimo->id }})"
                                class=" bg-black/30">
                                <img src="{{ Str::startsWith($emprestimo->livro->imagem, 'http') ? $emprestimo->livro->imagem : asset("storage/{$emprestimo->livro->imagem}") }}"
                                    class="rounded shadow-lg hover:shadow-black/30  hover:grayscale-0 grayscale-[30%] ease-out duration-300">
                                <p class="line-clamp-2 dark:text-gray-300">{{ $emprestimo->livro->titulo }}</p>
                            </button>
                            <div id="detalhes-{{$emprestimo->id}}"
                                class="absolute hidden w-full p-2 transition-all transition transform rounded-b top-full bg-black/30">
                                <p class="text-sm font-semibold">feito em
                                    {{ $emprestimo->created_at->format('d/m/Y') }}</p>
                                <p class="text-sm font-semibold">data de entrega:
                                    {{ Carbon::parse($emprestimo->data_limite)->format('d/m/Y') }}</p>
                                    <form method="post" action="{{route('user.deleteEmprestimo',$emprestimo->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button
                                            class="w-full text-red-500 transition border border-red-500 rounded bg-inherit hover:bg-red-500 hover:text-white">
                                            devolver
                                        </button>
                                    </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="mt-6 text-xl text-center md:text-2xl dark:text-gray-300">Você não tem nenhum livro alugado</h1>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function mostrarDetalhes(iid) {
            var detalhes = document.getElementById('detalhes-' + iid);
            detalhes.classList.toggle("hidden");

        }
    </script>
@endsection

<h1 class="text-4xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Empréstimos</h1>
<div class="w-full px-10">
    {{-- @if ($emprestimosAtivos->where('notificacao', 1)->count() >= 1)
    <h1 class="text-2xl dark:text-gray-200"> {{ $emprestimosAtivos->count() }} à confirmar devolução</h1>
    <div
        class="shadow-lg border listaDiv text-white max-h-80 dark:border-gray-600/20 sm:min-w-[300px]  rounded-lg  overflow-auto ">
        @forelse ($emprestimosAtivos as $emprestimo)
            <div
                class="flex items-center text-black justify-around transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                <div class="flex items-center w-[90%] gap-2 p-2">
                    <div>
                        <p>
                            {{ $emprestimo->created_at->format('d/m/Y') }}
                            -
                            {{ $emprestimo->usuario->nome }} {{ $emprestimo->usuario->sobrenome }}:
                            {{ $emprestimo->livro->titulo }}

                        </p>
                    </div>
                    @if ($emprestimo->notificacao == 1)
                        <button onclick="notificacao({{ $emprestimo->id }})"
                            class="relative flex items-center w-4 h-4">
                            <span
                                class="absolute inline-flex w-full h-full bg-yellow-300 rounded-full opacity-70 animate-ping"></span>
                            <span
                                class="relative inline-flex w-12 h-12 text-xs text-white bg-yellow-300 rounded-full material-icons hover:bg-yellow-400 sm:w-4 sm:h-4">notifications</span>
                        </button>
                    @endif
                    <div class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900/50"
                        id="notificacao-{{ $emprestimo->id }}">
                        <form
                            class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[300px]"
                            action="{{ route('admin.arquivarEmprestimo', $emprestimo) }}" method="post">
                            @csrf
                            <div class="flex items-center justify-between w-full gap-4 mb-4">
                                <h1 class="max-w-xs text-xl">Confirmar recebimento do livro</h1>
                                <button type="button"
                                    class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                                    onclick='notificacao({{ $emprestimo->id }})'>close</button>
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="p-2 transition bg-indigo-600 rounded w-min hover:bg-indigo-700">Confirmar</button>
                                <button type="button" onclick="notificacao({{ $emprestimo->id }})"
                                    class="p-2 transition bg-red-600 rounded hover:bg-red-700">Não
                                    recebido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
    @endif --}}
    <div class="flex flex-col p-10 dark:text-white gap-10">
        <h1 class="text-2xl">{{ $emprestimosAtivos->count() }} Empréstimos ativos</h1>
        <div class="rounded-lg border border-slate-600/20 shadow-lg max-h-[400px] overflow-auto">
            @forelse ($emprestimosAtivos as $emprestimo)
                @if ($loop->first)
                    <table class="table-auto w-full border-collapse ">
                        <tr class="bg-slate-900 text-white  uppercase w-full sticky top-0">
                            <td class="p-2">Feito por</td>
                            <td>Título do livro</td>
                            <td>Data de criação</td>
                            <td>Data de devolução estipulada</td>
                            <td></td>
                        </tr>
                @endif
                <tr class="capitalize">
                    <td class="border-t border-slate-700/50 p-5">{{ $emprestimo->aluno->nome_completo }}</td>
                    <td class="border-t border-slate-700/50 ">{{ $emprestimo->livro->titulo }}</td>
                    <td class="border-t border-slate-700/50">{{ $emprestimo->created_at->format('d/m/y') }}</td>
                    <td class="border-t  border-slate-700/50">{{ $emprestimo->data_limite->format('d/m/y') }}</td>
                    <td class="border-t border-slate-700/50">
                        <button onclick="modalArquivarEmprestimo(this)" type="button"
                            class="w-min bg-blue-700 hover:bg-blue-800 text-white transition py-1 px-2 rounded-lg">
                            Receber
                        </button>
                    </td>
                    <td
                        class="fixed flex modal w-full inset-0 z-40  hidden items-center justify-center bg-gray-900/50 backdrop-blur">
                        <div
                            class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
                            <div class="flex items-center justify-between w-full mb-4">
                                <h1 class=" text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">
                                    Confirmar recebimento do livro</h1>
                                <button type="button"
                                    class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                                    onclick="$(this).closest('.modal').toggleClass('hidden')">close</button>
                            </div>
                            <p>Livro: {{ $emprestimo->livro->titulo }} <br>Aluno:
                                {{ $emprestimo->aluno->nome_completo }}
                            </p>
                            <form method="POST" action="" class="arquivarEmprestimoForm">
                                @csrf
                                <input type="hidden" class="info" value="{{ $emprestimo->id }}">
                                <div class="flex gap-10">
                                    <button type="submit"
                                        class="mt-5 px-3 py-2 h-fit hover:bg-blue-600 text-sm transition w-fit bg-blue-500 text-white rounded">Recebi
                                        o livro</button>
                                    <button type="button"
                                        class="mt-5 px-3 py-2 h-fit hover:bg-red-600 text-sm transition w-fit bg-red-500 text-white rounded"
                                        onclick="$(this).closest('.modal').toggleClass('hidden')">Não recebi</button>
                                </div>
                            </form>
                        </div>
                    </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($emprestimo->data_limite)->locale('pt-BR')->translatedFormat(' l, d \de F \de Y')  }}</td>
                    <td>{{ \Carbon\Carbon::parse($emprestimo->data_limite)->locale('pt-BR')->translatedFormat(' l, d \de F \de Y') }}</td> --}}
                </tr>
                @if ($loop->last)
                    </table>
                @endif
            @empty
                <h1 class="text-xl pb-4">Não há empréstimos ativos atualmente</h1>
            @endforelse
        </div>
        <h1 class="text-2xl">{{ $emprestimosArquivados->count() }} Empréstimos arquivados</h1>


        <div class=" rounded-lg  border border-slate-600/20 shadow-lg max-h-[400px] overflow-auto">

            @forelse ($emprestimosArquivados->sortByDesc('created_at') as $emprestimo)
                @if ($loop->first)
                    <table class="table-auto w-full border-collapse ">
                        <tr class="bg-slate-900  text-white uppercase w-full sticky top-0">
                            <td class="p-2">Feito por</td>
                            <td >Título do livro</td>
                            <td >Data de criação</td>
                            <td >Data de devolução</td>

                        </tr>
                @endif
                <tr class="capitalize">
                    <td class="border-t border-slate-700/50 p-5">{{ $emprestimo->aluno->nome_completo }}</td>
                    <td class="border-t border-slate-700/50 ">{{ $emprestimo->livro->titulo }}</td>
                    <td class="border-t border-slate-700/50">{{ $emprestimo->created_at->format('d/m/y') }}</td>
                    <td class="border-t  border-slate-700/50">{{ $emprestimo->data_limite->format('d/m/y') }}</td>
                </tr>
                @if ($loop->last)
                    </table>
                @endif
            @empty
                <h2 class="text-xl pb-4">Não há empréstimos arquivados atualmente</h2>
            @endforelse
        </div>


    </div>


</div>
<script>
    function modalArquivarEmprestimo(e) {
        $(e).closest("td").next().toggleClass("hidden");
    }
    $(".modal").click(function(e) {
        if (e.target != this) {
            return;
        }
        $(this).toggleClass('hidden');
    });
    $('.arquivarEmprestimoForm').on('submit', function(e) {
        e.preventDefault();
        var host = "{{ url('') }}";
        var emprestimo = $(this).find('.info').val();
        $.ajax({
            type: "POST",
            url: host + '/admin/emprestimo/update/' + emprestimo,
            data: $(this).serialize(),
            success: function(msg) {
                console.log(msg);
                routeEmprestimos(msg);
            },
        });
    });
</script>

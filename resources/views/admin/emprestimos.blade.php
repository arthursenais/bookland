<h1 class="text-4xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Emprestimos</h1>
<div class="w-full px-10">
    @if ($emprestimosAtivos->where('notificacao',1)->count() >= 1)
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
    @endif
    <div class="flex flex-col p-10 text-white">
        @forelse ($emprestimosAtivos as $emprestimo)
            @if ($loop->first)
                <h1 class="text-4xl pb-4">Empréstimos ativos</h1>
                <table class="bg-black/20 table-auto">
                    <tr class="bg-gray-900">
                        <td class="border border-gray-700">Feito por</td>
                        <td class="border border-gray-700">Título do livro</td>
                        <td class="border border-gray-700">Data de criação</td>
                        <td class="border border-gray-700">Data de devolução estipulada</td>
                    </tr>
            @endif
            <tr>
                <td class="border border-gray-700">{{ $emprestimo->aluno->nome_completo }}</td>
                <td class="border border-gray-700">{{ $emprestimo->livro->titulo }}</td>
                <td class="border border-gray-700">{{ $emprestimo->created_at->format('d/m/y h:i:s')}}</td>
                <td class="border border-gray-700">{{ $emprestimo->data_limite->format('d/m/y h:i:s')}}</td>
            </tr>
            @if ($loop->last)
                </table>
            @endif
        @empty
            <h1 class="text-2xl pb-4">Não há empréstimos ativos atualmente</h1>
        @endforelse

        @forelse ($emprestimosArquivados as $emprestimo)
            @if ($loop->first)
                <h1 class="text-4xl pb-4">Empréstimos arquivados</h1>
                <table class="bg-black/20 table-auto">
                    <tr class="bg-gray-900">
                        <td class="border border-gray-700">Feito por</td>
                        <td class="border border-gray-700">Título do livro</td>
                        <td class="border border-gray-700">Data de criação</td>
                        <td class="border border-gray-700">Data de devolução</td>
                    </tr>
            @endif
            <tr>
                <td class="border border-gray-700">{{ $emprestimo->aluno->nome_completo }}</td>
                <td class="border border-gray-700">{{ $emprestimo->livro->titulo }}</td>
                <td class="border border-gray-700">{{ $emprestimo->created_at->format('d/m/y h:i:s')}}</td>
                <td class="border border-gray-700">{{ $emprestimo->data_limite->format('d/m/y h:i:s')}}</td>
            </tr>
            @if ($loop->last)
                </table>
            @endif
        @empty
            <h1 class="text-2xl pb-4">Não há empréstimos arquivados atualmente</h1>
        @endforelse


    </div>


</div>
<script>
    function notificacao(id) {
        elemento = document.getElementById("notificacao-" + id);
        elemento.classList.toggle("hidden");
    }
</script>

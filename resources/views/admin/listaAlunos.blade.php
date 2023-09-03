@forelse ($alunos->where('ativo',0) as $aluno)
                <div onclick="abrirModalAluno(this)"
                    class="flex items-center justify-around group transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                    <div class="flex items-center w-[90%] gap-2 p-2">
                        <div>
                            <p class="max-w-xs">
                                {{ $aluno->nome_completo }}
                            </p>
                            <p class="italic font-thin ">
                                {{ $aluno->matricula }}
                            </p>
                        </div>
                    </div>
                    <button onclick="abrirModalAluno(this)" type="button"
                        class="w-12 h-12 mr-2 text-white invisible group-hover:visible transition bg-red-500 rounded-full material-icons hover:bg-red-600 sm:w-8 sm:h-8">visibility</button>
                    <div
                        class="fixed flex modal3 w-full inset-0 z-40 hidden items-center justify-center bg-gray-900/50 backdrop-blur">
                        <div
                            class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
                            <div class="flex items-center justify-between w-full mb-4">
                                <h1 class="max-w-xs text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">
                                    {{ $aluno->nome_completo }}</h1>
                                <button type="button"
                                    class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                                    onclick="$(this).closest('.modal3').toggleClass('hidden')">close</button>
                            </div>
                            <table
                                class="hidden text-left border border-collapse sm:table border-slate-500 border-spacing-2">
                                <thead class="border border-slate-500">
                                    <tr>
                                        <th class="sm:p-4">matrícula</th>
                                        <th class="sm:p-4">nome completo</th>
                                        <th class="sm:p-4">data do cadastro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="sm:text-2xl sm:p-4">{{ $aluno->matricula }}</td>
                                        <td class="sm:text-2xl sm:p-4  max-w-[300px]">{{ $aluno->nome_completo }}</td>
                                        <td class="sm:text-2xl sm:p-4">{{ $aluno->created_at->format('d/m/y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form class="ativarAluno" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $aluno->matricula }}" class="info">
                                <button type="submit"
                                    class="mt-5 px-3 py-2 h-fit hover:bg-red-600 text-xs transition w-fit bg-red-500 text-white rounded">Re-ativar
                                    aluno</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                Sem alunos cadastrados
            @endforelse
<script>
    $('.ativarAluno').on('submit', function(e) {
        e.preventDefault();
        var host = "{{ url('') }}";
        var id = $(this).find('.info').val();
        $.ajax({
            type: "post",
            url: host + '/admin/aluno/ativar/' + id,
            data: $(this).serialize(),
            success: function(msg) {
                console.log(msg);
                routeUsuarios();
            },
        });
    });
    $(".modal3").click(function(e) {
        if (e.target == this) {
            return;
        }
        $(this).toggleClass('hidden');
    });

</script>

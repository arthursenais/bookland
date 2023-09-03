<h1 class="text-4xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Usuários e alunos</h1>
<div id="divUsuarios" class="flex gap-10">

    <div>
        <h1 class="text-2xl dark:text-gray-200"> {{ $usuarios->count() }} Usuários Cadastrados</h1>
        <div
            class="shadow-lg border listaDiv dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
            @forelse ($usuarios as $usuario)
                <div onclick="modalUsuario({{ $usuario->id }})"
                    class="flex items-center group justify-around transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
                    <div class="flex items-center w-[90%] gap-2 p-2">
                        <div>
                            <p class="max-w-xs">
                                @if ($usuario->admin == 1)
                                    <label class="p-1 text-xs rounded-lg bg-purple-900/30 w-min">Admin</label>
                                @endif
                                {{ $usuario->nome }}
                            </p>
                            <p class="italic font-thin ">Cadastrado em
                                {{ $usuario->created_at->format('d/m/y') }}
                            </p>
                        </div>
                    </div>
                    <button onclick="modalUsuario({{ $usuario->id }})"
                        class="w-12 h-12 mr-2  group-hover:visible invisible  text-white transition bg-red-500 rounded-full material-icons hover:bg-red-600 sm:w-8 sm:h-8">visibility</button>
                </div>
                @include('admin.modalUsuario')
            @empty
                sem usuarios
            @endforelse
        </div>
    </div>
    <div>
        <h1 class="text-2xl dark:text-gray-200"> {{ $alunos->where('ativo', 1)->count() }} Alunos cadastrados</h1>
        <div
            class="shadow-lg border listaDiv dark:border-gray-600/20 dark:text-white sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
            @forelse ($alunos->where('ativo',1) as $aluno)
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
                        class="fixed flex modal2 w-full inset-0 z-40 hidden items-center justify-center bg-gray-900/50 backdrop-blur">
                        <div
                            class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
                            <div class="flex items-center justify-between w-full mb-4">
                                <h1 class="max-w-xs text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">
                                    {{ $aluno->nome_completo }}</h1>
                                <button type="button"
                                    class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                                    onclick="$(this).closest('.modal2').toggleClass('hidden')">close</button>
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
                            <form action="" class="desativarAluno" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $aluno->matricula }}" class="info">
                                <button type="submit"
                                    class="mt-5 px-3 py-2 h-fit hover:bg-red-600 text-xs transition w-fit bg-red-500 text-white rounded">Desativar
                                    aluno</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                Sem alunos cadastrados
            @endforelse
        </div>
        <div class="flex justify-between mb-2">
            <button type="button" onclick="modalAddAluno()"
                class="relative w-16 h-16 text-white transition bg-indigo-500 rounded-full bottom-4 right-4 material-icons hover:bg-indigo-600">add</button>
            <button type="button" onclick="modalArquivoAlunos()"
                class="text-xs dark:text-white text-slate-700 w-fit h-min underline">ver arquivo de alunos</button>
        </div>
    </div>


    <div id="modalArquivoAlunos"
        class="fixed flex modal w-full inset-0 z-40  items-center justify-center  hidden bg-gray-900/50 backdrop-blur">
        <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:w-[500px]">
            <div class="flex items-center justify-between w-full mb-4">
                <h1 class="max-w-xs text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">Alunos arquivados</h1>
                <button class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                    onclick="$('#modalArquivoAlunos').toggleClass('hidden')">close</button>
            </div>

            <div id="listaArquivosAlunos" class=" max-h-[400px] overflow-auto"></div>

        </div>
    </div>


    <div id="modalAddAluno"
        class="fixed flex modal w-full inset-0 z-40  items-center justify-center  hidden bg-gray-900/50 backdrop-blur">
        <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:w-[500px]">
            <div class="flex items-center justify-between w-full mb-4">
                <h1 class="max-w-xs text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">Cadastrar aluno</h1>
                <button class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                    onclick="$('#modalAddAluno').toggleClass('hidden')">close</button>
            </div>

            <form id="submitAluno" action="" method="POST"
                class="flex flex-col items-center justify-center gap-4 text-left align-center">
                @csrf
                <div class="flex justify-start w-full">
                    <div class="w-full flex flex-col items-center justify-center gap-3">
                        <div class="w-full">
                            <label for="nome_completo">Nome completo:</label>
                            <input required autocomplete="off" name="nome_completo" type="text"
                                placeholder="Digite aqui" required
                                class="dark:bg-slate-800 w-full truncate  rounded p-0.5  invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </div>
                        <div class="w-full">
                            <label for="matricula">matrícula:</label>
                            <input required autocomplete="off" name="matricula" type="text" placeholder="Digite aqui"
                                required
                                class="dark:bg-slate-800 w-full truncate  rounded p-0.5  invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </div>
                    </div>

                </div>

                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-2 transition bg-indigo-600 border border-indigo-600 rounded-full button sm:bg-transparent sm:text-indigo-300 hover:bg-indigo-600 hover:text-white">Cadastrar</button>
                    <button type="button" onclick="$('#modalAddAluno').toggleClass('hidden')"
                        class="px-2 transition bg-red-600 border border-red-600 rounded-full button sm:bg-transparent sm:text-red-600 hover:bg-red-600 hover:text-white">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function modalAddAluno() {
        $("#modalAddAluno").css({
            opacity: 0
        });
        $("#modalAddAluno").toggleClass('hidden');
        $("#modalAddAluno").animate({
            opacity: 1
        }, 200);
    }

    function modalArquivoAlunos() {
        $("#modalArquivoAlunos").css({
            opacity: 0
        });
        $("#modalArquivoAlunos").toggleClass('hidden');
        $("#modalArquivoAlunos").animate({
            opacity: 1
        }, 200);
        if ($("#listaArquivosAlunos").is(':empty')) {
            // Se a lista estiver vazia, faça uma requisição AJAX para buscar os dados
            $("#listaArquivosAlunos").html('Carregando...');
            $.ajax({
                url: "{{Route('admin.alunosArquivados')}}", // Substitua pela URL correta
                method: 'GET',
                success: function(data) {
                    $("#listaArquivosAlunos").html(data);
                },
                error: function(msg) {
                    console.log(msg);
                }
            });
        }
    }
    $(".modal").click(function(e) {
        if (e.target != this) {
            return;
        }
        $(this).toggleClass('hidden');
    });
    $(".modal2").click(function(e) {
        if (e.target == this) {
            return;
        }
        $(this).toggleClass('hidden');
    });

    function abrirModalAluno(e) {
        $(e).find('button').next().toggleClass('hidden');

    }

    $('#submitAluno').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ Route('admin.storeAluno') }}",
            data: $(this).serialize(),
            success: function(msg) {
                routeUsuarios();
            },
        });
    });
    $('.desativarAluno').on('submit', function(e) {
        e.preventDefault();
        var host = "{{ url('') }}";
        var id = $(this).find('.info').val();
        $.ajax({
            type: "delete",
            url: host + '/admin/aluno/delete/' + id,
            data: $(this).serialize(),
            success: function(msg) {
                console.log(msg);
                routeUsuarios();
            },
        });
    });

</script>

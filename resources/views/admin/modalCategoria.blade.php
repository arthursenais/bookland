{{-- modal modificar categoria --}}
@isset($categoria)

<div id="modalCategoria-{{ $categoria->id }}"class="fixed inset-0 z-40 items-center justify-center hidden bg-gray-900/50">
    <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
        <div class="flex items-center justify-between w-full mb-4">
            <h1 onmouseover="displaynome(this)" class="max-w-xs text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">
                {{ $categoria->nome }}</h1>
            <button class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                onclick="fecharModalCategoria({{ $categoria->id }})">close</button>
        </div>

        <form method="POST" action="{{ route('admin.updateCategoria', $categoria->id) }}"
            class="flex flex-col items-center justify-center gap-4 text-left align-center">
            @csrf

            <table class="sm:w-full">
                <tr>
                    <th>nome:</th>
                    <th class="w-full">
                        <input name="nome" required type="text" value="{{ $categoria->nome }}"
                            class="w-full text-right truncate dark:bg-slate-800">
                    </th>
                </tr>
            </table>
                <p>Descrição:</p>

                <textarea name="descricao" class="w-full dark:bg-gray-900" rows="8">{{ $categoria->descricao }}</textarea>

                <div class="flex justify-between w-full">
                    <button type="submit"
                        class="px-2 transition bg-indigo-600 border border-indigo-600 rounded-full button sm:bg-transparent sm:text-indigo-600 hover:bg-indigo-600 hover:text-white">aplicar</button>
                    <button type="button" onclick="modalDeleteCategoria({{ $categoria->id }})"
                        class="px-2 transition bg-red-600 border border-red-600 rounded-full button sm:bg-transparent sm:text-red-600 hover:bg-red-600 hover:text-white">Apagar
                        categoria</button>
                </div>
        </form>
    </div>
</div>
{{-- modal deletar categoria --}}
<div id="modalDeleteCategoria-{{ $categoria->id }}"
    class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-900/50 backdrop-blur-sm">
    <div>
        <div class="flex flex-col p-4 bg-white rounded dark:bg-slate-800 dark:text-white ">
            <h1>deseja apagar a categoria <b class="text-red-500"> {{ $categoria->nome }}</b> ?</h1>
            <form class="flex justify-evenly" action="{{ route('admin.deleteCategoria', $categoria->id) }}"
                method="POST">
                @method('DELETE')
                @csrf
                <button type="button" class="text-blue-600 transition max-w-min hover:text-blue-800 hover:underline"
                    onclick="document.getElementById('modalDeleteCategoria-' + {{ $categoria->id }}).style.display = 'none';">Cancelar</button>
                <button type="submit" class="px-2 transition bg-red-600 rounded-full button sm:bg-transparent sm:text-red-600 hover:bg-red-600 hover:text-white">Apagar a categoria</button>
            </form>
        </div>
    </div>
</div>
@endisset


{{-- modal adicionar categoria --}}


<div id="modalAddCategoria" class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-900/50 backdrop-blur">
    <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
        <div class="flex items-center justify-between w-full mb-4">
            <h1 class="max-w-xs text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">Adicionar categoria</h1>
            <button class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                onclick="document.getElementById('modalAddCategoria').style.display = 'none';">close</button>
        </div>

        <form action="{{ route('admin.storeCategoria') }}" method="POST"
            class="flex flex-col items-center justify-center gap-4 text-left align-center">
            @csrf
            <div class="flex justify-start w-full">
                <table class="sm:w-full">
                    <tr>
                        <th>nome:</th>
                        <td class="w-full">
                            <input name="nome" type="text" placeholder="Digite aqui" required
                                class="dark:bg-slate-800 w-full truncate  rounded p-0.5  invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </td>
                    </tr>
                </table>
            </div>
            <p>Descrição:</p>

            <textarea name="descricao" required class="w-full dark:bg-gray-900" rows="8" placeholder="Digite aqui"></textarea>

            <div class="flex justify-between w-full">
                <button type="submit"
                    class="px-2 transition bg-indigo-600 border border-indigo-600 rounded-full button sm:bg-transparent sm:text-indigo-300 hover:bg-indigo-600 hover:text-white">Cadastrar</button>
                <button type="button" onclick="document.getElementById('modalAddCategoria').style.display = 'none';"
                    class="px-2 transition bg-red-600 border border-red-600 rounded-full button sm:bg-transparent sm:text-red-600 hover:bg-red-600 hover:text-white">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@isset($categoria)
    <script>

        window.addEventListener('click', function(event) {
            var modal = document.getElementById('modalCategoria-' + {{ $categoria->id }});
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
        window.addEventListener('click', function(event) {
            var modal = document.getElementById('modalDeleteCategoria-' + {{ $categoria->id }});
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
@endisset

<script>
    function modalCategoria(idCategoria) {
        document.getElementById('modalCategoria-' + idCategoria).style.display = 'flex';
    }

    function fecharModalCategoria(idCategoria) {
        document.getElementById('modalCategoria-' + idCategoria).style.display = 'none';
    }

    function modalDeleteCategoria(idCategoria) {
        document.getElementById('modalDeleteCategoria-' + idCategoria).style.display = 'flex';
    }


    function modalAddCategoria() {

        document.getElementById('modalAddCategoria').style.display = 'flex';
    }
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modalAddCategoria');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>

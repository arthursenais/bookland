{{-- modal modificar livro --}}
<div id="modalLivro-{{ $livro->id }}"
    class="hidden inset-0 flex fixed bg-gray-900/50 backdrop-blur-sm items-center justify-center z-40">
    <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
        <div class="flex justify-between w-full items-center mb-4">
            <h1 onmouseover="displayTitulo(this)"
                class="sm:text-2xl text-xl max-w-xs dark:bg-slate-800 bg-white truncate">{{ $livro->titulo }}</h1>
            <h1 onmouseout="fecharTitulo(this)" id="tituloCompleto"
                class="hidden sm:text-2xl text-xl max-w-full dark:bg-slate-800 bg-white py-3 rounded truncate">
                {{ $livro->titulo }}</h1>
            <button class="material-icons w-10 h-6 rounded-md text-white bg-red-500 hover:bg-red-600 transition"
                onclick="fecharModalLivro({{ $livro->id }})">close</button>
        </div>

        <div class="flex flex-col text-left align-center justify-center items-center gap-4">
            <div>
                <img src="{{ $livro->imagem }}" class="max-w-[100px]">
                <label for="imageupload"
                    class="material-icons button rounded-full bg-emerald-500 p-2 relative bottom-6 left-20 hover:bg-emerald-600 cursor-pointer text-white transition">edit</label>
                <input type="file" id="imageupload" class="hidden">
            </div>
            <table class="sm:w-full">
                <tr>
                    <th>titulo:</th>
                    <th class="w-full">
                        <input type="text" value="{{ $livro->titulo }}"
                            class="dark:bg-slate-800 w-full truncate text-right">
                    </th>
                </tr>
                <tr>
                    <th>autor:</th>
                    <th class="text-right">
                        <input type="text" value="{{ $livro->autor }}" class="dark:bg-slate-800 text-right truncate">
                    </th>
                </tr>
                <tr>
                    <th>categoria:</th>
                    <th class="text-right">
                        <input type="text" value="{{ $livro->categoria->nome }}"
                            class="dark:bg-slate-800 text-right truncate">
                    </th>
                </tr>
                <tr>
                    <th>criado em:</th>
                    <th class="text-right">
                        <input type="datetime" value="{{ $livro->created_at->format('d/m/y H:i') }}"
                            class="dark:bg-slate-800 text-right truncate">
                    </th>

                </tr>

                <tr>
                    <th>disponiveis:</th>
                    <th class="text-right">
                        <input type="number" min="0" max="100" value="{{ $livro->disponiveis }}"
                            class="dark:bg-slate-800 text-right w-fit">
                    </th>
                </tr>
            </table>

            <p>Descrição:</p>

            <textarea class="dark:bg-gray-900 w-full" rows="8">{{ $livro->descricao }}</textarea>

            <div class="flex justify-between w-full">
                <button type="button"
                    class="button sm:bg-transparent border border-indigo-600 sm:text-indigo-300 bg-indigo-600 px-2 rounded-full hover:bg-indigo-600 hover:text-white transition">aplicar</button>
                <button onclick="modalDelete({{ $livro->id }})"
                    class="button sm:bg-transparent border border-red-600 sm:text-red-600 bg-red-600 px-2 rounded-full hover:bg-red-600 hover:text-white transition">Apagar
                    livro</button>
            </div>
        </div>
    </div>
</div>
{{-- modal deletar livro --}}
<div id="modalDelete-{{ $livro->id }}"
    class="hidden inset-0 flex fixed bg-gray-900/50 backdrop-blur-sm items-center justify-center z-50">
    <div>
        <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white ">
            <h1>deseja apagar o livro <b class="text-red-500"> {{ $livro->titulo }}</b> ?</h1>
            <form class="flex justify-evenly" action="{{ route('admin.deleteLivro', $livro->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="button" class="max-w-min text-blue-600 hover:text-blue-800 hover:underline transition"
                    onclick="document.getElementById('modalDelete-' + {{ $livro->id }}).style.display = 'none';">Cancelar</button>
                <button type="submit"
                    class="button sm:bg-transparent  sm:text-red-600 bg-red-600 px-2 rounded-full hover:bg-red-600 hover:text-white transition">Apagar
                    o livro</button>
            </form>
        </div>
    </div>
</div>
{{-- modal adicionar livro --}}
<div id="modalAddLivro" class="hidden inset-0 flex fixed bg-gray-900/50 backdrop-blur items-center justify-center z-50">
    <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
        <div class="flex justify-between w-full items-center mb-4">
            <h1 class="sm:text-2xl text-xl max-w-xs dark:bg-slate-800 bg-white truncate">Adicionar Livro</h1>
            <button class="material-icons w-10 h-6 rounded-md text-white bg-red-500 hover:bg-red-600 transition"
                onclick="document.getElementById('modalAddLivro').style.display = 'none';">close</button>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col text-left align-center justify-center items-center gap-4">

            <div class="flex justify-start w-full">
                <table class="sm:w-full">
                    <tr>
                        <th>titulo:</th>
                        <td class="w-full">
                            <input name="titulo" type="text" placeholder="Digite aqui" required class="dark:bg-slate-800 w-full truncate  rounded p-0.5  invalid:border invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </td>
                    </tr>
                    <tr>
                        <th>autor:</th>
                        <td class="w-full">
                            <input type="text" placeholder="Digite aqui" required class="dark:bg-slate-800 w-full truncate  rounded p-0.5  invalid:border invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </td>
                    </tr>
                    <tr>
                        <th>categoria:</th>
                        <td class="w-full">
                            <select required name="categoria" class="dark:bg-slate-800 w-fit truncate  rounded p-0.5  invalid:border invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->nome}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>

                        </td>
                    </tr>

                    <tr>
                        <th>disponiveis:</th>
                        <td class="w-full">
                            <input type="number" min="0" max="100" required class="dark:bg-slate-800 max-w-min truncate  rounded p-0.5  invalid:border invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </td>
                    </tr>
                </table>
                <div class="min-w-[250px] flex flex-col items-center">
                    <label for="addImagem" class="material-icons button rounded-full bg-emerald-500 p-2 hover:bg-emerald-600 cursor-pointer text-white transition">image</label>
                <input type="file" id="addImagem" class="hidden">
                </div>
            </div>
            <p>Descrição:</p>

            <textarea class="dark:bg-gray-900 w-full" rows="8" placeholder="Digite aqui"></textarea>

            <div class="flex justify-between w-full">
                <button type="button" class="button sm:bg-transparent border border-indigo-600 sm:text-indigo-300 bg-indigo-600 px-2 rounded-full hover:bg-indigo-600 hover:text-white transition">Cadastrar</button>
                <button onclick="document.getElementById('modalAddLivro').style.display = 'none';" class="button sm:bg-transparent border border-red-600 sm:text-red-600 bg-red-600 px-2 rounded-full hover:bg-red-600 hover:text-white transition">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function modalLivro(idLivro) {
        document.getElementById('modalLivro-' + idLivro).style.display = 'flex';
    }
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modalLivro-' + {{ $livro->id }});
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    function fecharModalLivro(idLivro) {
        document.getElementById('modalLivro-' + idLivro).style.display = 'none';
    }
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modalDelete-' + {{ $livro->id }});
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    function modalDelete(idLivro) {
        document.getElementById('modalDelete-' + idLivro).style.display = 'flex';
    }


    function modalAddLivro() {
        document.getElementById('modalAddLivro').style.display = 'flex';
    }
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modalAddLivro');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>

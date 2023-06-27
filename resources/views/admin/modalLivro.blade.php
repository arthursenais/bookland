{{-- modal modificar livro --}}
@isset($livro)

<div id="modalLivro-{{ $livro->id }}"
    class="fixed inset-0 z-40 items-center justify-center hidden bg-gray-900/50">
    <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
        <div class="flex items-center justify-between w-full mb-4">
            <h1 onmouseover="displayTitulo(this)"
                class="max-w-xs text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">{{ $livro->titulo }}</h1>
            <h1 onmouseout="fecharTitulo(this)" id="tituloCompleto"
                class="hidden max-w-full py-3 text-xl truncate bg-white rounded sm:text-2xl dark:bg-slate-800">
                {{ $livro->titulo }}</h1>
            <button class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                onclick="fecharModalLivro({{ $livro->id }})">close</button>
        </div>

        <form method="POST" action="{{route('admin.updateLivro', $livro->id)}}" enctype="multipart/form-data" class="flex flex-col items-center justify-center gap-4 text-left align-center">
            @csrf
            <div>
                <img src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}" class="max-w-[100px]">
                <label for="imageupload-{{$livro->id}}"
                    class="relative p-2 text-white transition rounded-full cursor-pointer material-icons button bg-emerald-500 bottom-6 left-20 hover:bg-emerald-600">edit</label>
                <input type="file" id="imageupload-{{$livro->id}}"  name="imagem" class="hidden">
            </div>

            <table class="sm:w-full">
                <tr>
                    <th>titulo:</th>
                    <th class="w-full">
                        <input name="titulo" required type="text" value="{{ $livro->titulo }}" class="w-full text-right truncate dark:bg-slate-800">
                    </th>
                </tr>
                <tr>
                    <th>autor:</th>
                    <th class="text-right">
                        <input name="autor" required  type="text" value="{{ $livro->autor }}" class="text-right truncate dark:bg-slate-800">
                    </th>
                </tr>
                <tr>
                    <th>categoria:</th>
                    <th class="text-right">
                        <select required name="id_categoria"  class="dark:bg-slate-800 w-fit truncate  text-right rounded p-0.5 invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}" {{ $categoria->id == $livro->categoria->id ? 'selected' : '' }}>{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>

                <tr>
                    <th>disponiveis:</th>
                    <th class="text-right">
                        <input type="number" name="disponiveis" min="0" max="100" value="{{ $livro->disponiveis }}"
                            class="text-right dark:bg-slate-800 w-fit">
                    </th>
                </tr>
            </table>

            <p>Descrição:</p>

            <textarea name="descricao" required class="w-full dark:bg-gray-900" rows="8">{{ $livro->descricao }}</textarea>

            <div class="flex justify-between w-full">
                <button type="submit" class="px-2 transition bg-indigo-600 border border-indigo-600 rounded-full button sm:bg-transparent sm:text-indigo-600 hover:bg-indigo-600 hover:text-white">aplicar</button>
                <button type="button" onclick="modalDelete({{ $livro->id }})" class="px-2 transition bg-red-600 border border-red-600 rounded-full button sm:bg-transparent sm:text-red-600 hover:bg-red-600 hover:text-white">Apagar
                    livro</button>
            </div>
        </form>
    </div>
</div>
{{-- modal deletar livro --}}
<div id="modalDelete-{{ $livro->id }}"
    class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-900/50 backdrop-blur-sm">
    <div>
        <div class="flex flex-col p-4 bg-white rounded dark:bg-slate-800 dark:text-white ">
            <h1>deseja apagar o livro <b class="text-red-500"> {{ $livro->titulo }}</b> ?</h1>
            <form class="flex justify-evenly" action="{{ route('admin.deleteLivro', $livro->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="button" class="text-blue-600 transition max-w-min hover:text-blue-800 hover:underline"
                    onclick="document.getElementById('modalDelete-' + {{ $livro->id }}).style.display = 'none';">Cancelar</button>
                <button type="submit"
                    class="px-2 transition bg-red-600 rounded-full button sm:bg-transparent sm:text-red-600 hover:bg-red-600 hover:text-white">Apagar
                    o livro</button>
            </form>
        </div>
    </div>
</div>

@endisset

{{-- modal adicionar livro --}}


<div id="modalAddLivro" class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-900/50 backdrop-blur">
    <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[500px]">
        <div class="flex items-center justify-between w-full mb-4">
            <h1 class="max-w-xs text-xl truncate bg-white sm:text-2xl dark:bg-slate-800">Adicionar Livro</h1>
            <button class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                onclick="document.getElementById('modalAddLivro').style.display = 'none';">close</button>
        </div>
        @if(count( $categorias) > 0)
        <form action="{{route('admin.storeLivro')}}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center justify-center gap-4 text-left align-center">
            @csrf
            <div class="flex justify-start w-full">
                <table class="sm:w-full">
                    <tr>
                        <th>titulo:</th>
                        <td class="w-full">
                            <input name="titulo" type="text" placeholder="Digite aqui" required class="dark:bg-slate-800 w-full truncate  rounded p-0.5  invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </td>
                    </tr>
                    <tr>
                        <th>autor:</th>
                        <td class="w-full">
                            <input name="autor" type="text" placeholder="Digite aqui" required class="dark:bg-slate-800 w-full truncate  rounded p-0.5   invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </td>
                    </tr>
                    <tr>
                        <th>categoria:</th>
                        <td class="w-full">


                            <select required name="id_categoria" class="dark:bg-slate-800 w-fit truncate  rounded p-0.5   invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>

                                @endforeach

                            </select>

                        </td>
                    </tr>

                    <tr>
                        <th>disponiveis:</th>
                        <td class="w-full">
                            <input type="number" name="disponiveis" min="0" max="100" required class="dark:bg-slate-800 max-w-min truncate  rounded p-0.5 invalid:border invalid:border-red-600/20 focus:outline-none focus:ring invalid:focus:ring-red-600">
                        </td>
                    </tr>
                </table>
                <div class="min-w-[250px] flex flex-col items-center">
                    <label for="addImagem" class="p-2 text-white transition rounded-full cursor-pointer material-icons button bg-emerald-500 hover:bg-emerald-600">image</label>
                <input type="file" id="addImagem" required name="imagem" class="hidden">
                imagem
                </div>
            </div>
            <p>Descrição:</p>

            <textarea name="descricao" class="w-full dark:bg-gray-900" rows="8" placeholder="Digite aqui"></textarea>

            <div class="flex justify-between w-full">
                <button type="submit" class="px-2 transition bg-indigo-600 border border-indigo-600 rounded-full button sm:bg-transparent sm:text-indigo-300 hover:bg-indigo-600 hover:text-white">Cadastrar</button>
                <button type="button" onclick="document.getElementById('modalAddLivro').style.display = 'none';" class="px-2 transition bg-red-600 border border-red-600 rounded-full button sm:bg-transparent sm:text-red-600 hover:bg-red-600 hover:text-white">Cancelar</button>
            </div>
        </form>
        @else
        <p>Não há categorias para adicionar um livro</p>
         
        @endif
    </div>
</div>
@isset($livro)
    <script>
        window.addEventListener('click', function(event) {
            var modal = document.getElementById('modalLivro-' + {{ $livro->id }});
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
        window.addEventListener('click', function(event) {
            var modal = document.getElementById('modalDelete-' + {{ $livro->id }});
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
@endisset
<script>

    function modalLivro(idLivro) {
        document.getElementById('modalLivro-' + idLivro).style.display = 'flex';
    }

    function fecharModalLivro(idLivro) {
        document.getElementById('modalLivro-' + idLivro).style.display = 'none';
    }

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

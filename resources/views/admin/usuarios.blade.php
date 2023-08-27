<h1 class="text-4xl cursor-default dark:text-gray-200 text-bold hover:animate-pulse">Usuários e alunos</h1>
<div class="flex gap-10">

    <div>
        <h1 class="text-2xl dark:text-gray-200"> {{ $usuarios->count() }} Usuários Cadastrados</h1>
        <div
            class="shadow-lg border listaDiv dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
            @forelse ($usuarios as $usuario)
                <div
                    class="flex items-center justify-around transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
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
                        class="w-12 h-12 mr-2 text-white transition bg-red-500 rounded-full material-icons hover:bg-red-600 sm:w-8 sm:h-8">visibility</button>
                </div>
                @include('admin.modalUsuario')
            @empty
                sem usuarios
            @endforelse
        </div>
    </div>
    <div>
        <h1 class="text-2xl dark:text-gray-200"> {{ $usuarios->count() }} Alunos cadastrados</h1>
        <div
            class="shadow-lg border listaDiv dark:border-gray-600/20 sm:min-w-[300px] min-h-full max-h-80 rounded-lg  overflow-auto ">
            @forelse ($usuarios as $usuario)
                <div
                    class="flex items-center justify-around transition hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-gray-200">
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
                        class="w-12 h-12 mr-2 text-white transition bg-red-500 rounded-full material-icons hover:bg-red-600 sm:w-8 sm:h-8">visibility</button>
                </div>
                @include('admin.modalUsuario')
            @empty
                sem usuarios
            @endforelse
        </div>
    </div>
</div>

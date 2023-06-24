<div id="modalUsuario-{{ $usuario->id }}"
    class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-900/50">
    <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[300px]">
        <div class="flex items-center justify-between w-full mb-4">
            <h1 class="text-xl sm:text-4xl">Usuário</h1>
            <button class="w-10 h-6 text-white transition bg-red-500 rounded-md material-icons hover:bg-red-600"
                onclick="fecharModal({{ $usuario->id }})">close</button>
        </div>

        <table class="hidden text-left border border-collapse sm:table border-slate-500 border-spacing-2">
            <thead class="border border-slate-500">
                <tr>
                    <th class="sm:p-4">id</th>
                    <th class="sm:p-4">nome</th>
                    <th class="sm:p-4">sobrenome</th>
                    <th class="sm:p-4">email</th>
                    <th class="sm:p-4">criado_em</th>
                    <th class="sm:p-4">admin</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="sm:text-2xl sm:p-4">{{ $usuario->id }}</td>
                    <td class="sm:text-2xl sm:p-4">{{ $usuario->nome }}</td>
                    <td class="sm:text-2xl sm:p-4">{{ $usuario->sobrenome }}</td>
                    <td class="sm:text-2xl sm:p-4">{{ $usuario->email }}</td>
                    <td class="sm:text-2xl sm:p-4">{{ $usuario->created_at }}</td>
                    <td class="sm:text-2xl sm:p-4">
                        @if ($usuario->admin == 1)
                            Sim
                        @else
                            Não
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="text-left sm:hidden">
            <thead>
                <tr>
                    <th>Id</th>
                    <th class="text-right">{{ $usuario->id }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>nome</th>
                    <th class="text-right">{{ $usuario->nome }}</th>
                </tr>
                <tr>
                    <th>sobrenome</th>
                    <th class="text-right">{{ $usuario->sobrenome }}</th>
                </tr>
                <tr>
                    <th>email</th>
                    <th class="text-right">{{ $usuario->email }}</th>
                </tr>
                <tr>
                    <th>criado_em</th>
                    <th class="text-right">{{ $usuario->created_at }}</th>
                </tr>
                <tr>
                    <th>admin?</th>
                    <th class="text-right"> @if ($usuario->admin == 1)
                        Sim
                    @else
                        Não
                    @endif</th>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<script>
    function fecharModal(id) {
        document.getElementById('modalUsuario-' + id).style.display = 'none';
    }

    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modalUsuario-' + {{$usuario->id}});
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    function modalUsuario(id) {
        document.getElementById('modalUsuario-' + id).style.display = 'flex';
    }
</script>

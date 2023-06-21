<div id="modalUsuario-{{ $usuario->id }}"
    class="hidden inset-0 flex fixed bg-gray-900/50 backdrop-blur-sm items-center justify-center z-50">
    <div class="flex flex-col bg-white dark:bg-slate-800 rounded p-4 dark:text-white sm:min-w-[300px]">
        <div class="flex justify-between w-full items-center mb-4">
            <h1 class="sm:text-4xl text-xl">Usuário</h1>
            <button class="material-icons  w-10 h-6 rounded-md text-white bg-red-500 hover:bg-red-600 transition"
                onclick="fecharModal({{ $usuario->id }})">close</button>
        </div>

        <table class="hidden sm:table border-collapse border border-slate-500 text-left border-spacing-2">
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
        <table class="sm:hidden text-left">
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
        var modal = document.getElementById('modalUsuario-' + id);
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    function modalUsuario(id) {
        document.getElementById('modalUsuario-' + id).style.display = 'flex';
    }
</script>

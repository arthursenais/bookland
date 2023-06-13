<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Biblioteca - Register</title>
</head>

<body class="bg-white dark:bg-slate-800">

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="{{ route('index') }}" class="sm:w-auto"><img class="mx-auto h-10 w-auto"
                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="suabibli.on"></a>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white">Nova
                conta</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('index') }}" method="GET">
                <div>
                    <label for="nome"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Nome</label>
                    <div class="mt-2">
                        <input id="nome" name="nome" type="text" autocomplete="nome" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                        invalid:border-red-500 invalid:text-red-600
                        focus:invalid:border-red-500 focus:invalid:ring-red-500 ">
                    </div>
                </div>
                <div>
                    <label for="sobrenome"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Sobrenome</label>
                    <div class="mt-2">
                        <input id="sobrenome" name="sobrenome" type="text" autocomplete="sobrenome" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                        invalid:border-red-500 invalid:text-red-600
                        focus:invalid:border-red-500 focus:invalid:ring-red-500 ">
                    </div>
                </div>
                <div>
                    <label for="email"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                        invalid:border-red-500 invalid:text-red-600
                        focus:invalid:border-red-500 focus:invalid:ring-red-500 ">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Senha</label>

                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                invalid:border-red-500 invalid:text-red-600
                focus:invalid:border-red-500 focus:invalid:ring-red-500">
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Confirmar Senha</label>

                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                invalid:border-red-500 invalid:text-red-600
                focus:invalid:border-red-500 focus:invalid:ring-red-500">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-sky-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">Entrar</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Já tem uma conta?
                <a href="{{ route('login') }}"
                    class="font-semibold leading-6 text-sky-600 hover:text-sky-500">Login</a>
            </p>
        </div>
    </div>


</body>

</html>

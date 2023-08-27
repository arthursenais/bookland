<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script>

    <title>BookLand | Painel do administrador</title>
    <script>
        $(window).on('load', function() { //Do the code in the {}s when the window has loaded
            $("#loader").fadeOut("fast"); //Fade out the #loader div
            routeEmprestimos();
        });
    </script>
    <style>
        /* Firefox */
        div {
            scrollbar-width: thin;
            scrollbar-color: #000000;
        }

        /* Chrome, Edge and Safari */
        div::-webkit-scrollbar {
            height: 4px;
            width: 4px;
        }
        div::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }
        div::-webkit-scrollbar-track {
            background-color: #00000021;
        }

        div::-webkit-scrollbar-thumb {
            border-radius: 6px;
            background-color: #000000;
        }

        div::-webkit-scrollbar-thumb:hover {
            background-color: #00D6FD;
        }

        div::-webkit-scrollbar-thumb:active {
            background-color: #00D6FD;
        }
    </style>
</head>

<body class="bg-white dark:bg-slate-800">
    <div id="loader"
        class="fixed inset-0 dark:bg-gray-800 backdrop-blur dark:text-white flex justify-center items-center bg-white z-50 ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 animate-spin">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg>
    </div>
    @auth
        <div class="flex items-baseline">
            <div id="app"
                class="fixed flex flex-col top-0 left-0 p-5 z-40 w-64 h-screen bg-slate-800 border-r border-gray-700 sm:translate-x-0 -translate-x-full dark:text-white">
                <h1 class="text-xl text-center mb-3">BookLand</h1>
                <div class="flex flex-col gap-2">
                    <a href="#" onclick="routeLivros()"
                        class="selected py-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm ">Livros</a>
                    <a href="#" onclick="routeUsuarios()"
                        class="py-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm ">Usuários
                        e alunos</a>
                    <a href="#" onclick="routeEmprestimos()"
                        class="py-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm ">Empréstimos</a>
                </div>
                <div class="border-t border-gray-700 my-5 pt-5 w-full">
                    <a href="{{ route('index') }}"
                        class="py-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Ir
                        para o site</a>
                    <a href="{{ route('index') }}"
                        class="py-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Ajuda</a>
                </div>
            </div>
            @include('admin.mensagens')
            <div id="div" class="flex flex-col w-full items-center justify-center mt-4 sm:ml-64">

            </div>
        </div>
    @else
        <div class="flex flex-col items-center justify-center p-20">
            <h1 class="text-4xl dark:text-gray-200 text-bold">Acesso restrito</h1>
        </div>
    @endauth


    <script>
        function routeLivros() {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/painel/livros",
                type: 'get',
                data: {
                    CSRF_TOKEN
                },
                success: function(data) {
                    $('#div').html(data);
                }
            })

        }
        function routeUsuarios() {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/painel/usuarios",
                type: 'get',
                data: {
                    CSRF_TOKEN
                },
                success: function(data) {
                    $('#div').html(data);
                }
            })

        }
        function routeEmprestimos() {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/painel/emprestimos",
                type: 'get',
                data: {
                    CSRF_TOKEN
                },
                success: function(data) {
                    $('#div').html(data);
                }
            })

        }
    </script>
</body>

</html>

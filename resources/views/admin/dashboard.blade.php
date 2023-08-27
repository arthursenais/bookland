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
            routeLivros();
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
                    <a href="#" id="link1" onclick="routeLivros();"
                        class="flex items-center gap-2 py-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                          </svg>

                        Livros</a>
                    <a href="#" id="link2" onclick="routeUsuarios()"
                        class="py-2 flex items-center gap-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                          </svg>

                        Usuários
                        e alunos</a>
                    <a href="#" id="link3" onclick="routeEmprestimos()"
                        class="py-2 flex items-center gap-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                          </svg>
                          Empréstimos</a>
                </div>
                <div class="border-t border-gray-700 my-5 pt-5 w-full">
                    <a href="{{ route('index') }}"
                        class="py-2 flex items-center gap-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                          </svg>
                          Ir
                        para o site</a>
                    <a href="{{ route('index') }}"
                        class="py-2 flex items-center gap-2 block px-3 text-xs font-medium w-full text-gray-300  rounded-md hover:bg-gray-700 hover:text-white lg:text-sm"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M19.449 8.448L16.388 11a4.52 4.52 0 010 2.002l3.061 2.55a8.275 8.275 0 000-7.103zM15.552 19.45L13 16.388a4.52 4.52 0 01-2.002 0l-2.55 3.061a8.275 8.275 0 007.103 0zM4.55 15.552L7.612 13a4.52 4.52 0 010-2.002L4.551 8.45a8.275 8.275 0 000 7.103zM8.448 4.55L11 7.612a4.52 4.52 0 012.002 0l2.55-3.061a8.275 8.275 0 00-7.103 0zm8.657-.86a9.776 9.776 0 011.79 1.415 9.776 9.776 0 011.414 1.788 9.764 9.764 0 010 10.211 9.777 9.777 0 01-1.415 1.79 9.777 9.777 0 01-1.788 1.414 9.764 9.764 0 01-10.212 0 9.776 9.776 0 01-1.788-1.415 9.776 9.776 0 01-1.415-1.788 9.764 9.764 0 010-10.212 9.774 9.774 0 011.415-1.788A9.774 9.774 0 016.894 3.69a9.764 9.764 0 0110.211 0zM14.121 9.88a2.985 2.985 0 00-1.11-.704 3.015 3.015 0 00-2.022 0 2.985 2.985 0 00-1.11.704c-.326.325-.56.705-.704 1.11a3.015 3.015 0 000 2.022c.144.405.378.785.704 1.11.325.326.705.56 1.11.704.652.233 1.37.233 2.022 0a2.985 2.985 0 001.11-.704c.326-.325.56-.705.704-1.11a3.016 3.016 0 000-2.022 2.985 2.985 0 00-.704-1.11z" clip-rule="evenodd" />
                          </svg>
                          Ajuda</a>
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
                    $('#link2,#link3').removeClass("bg-slate-900");
                    $('#link1').addClass("bg-slate-900");
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
                    $('#link1,#link3').removeClass("bg-slate-900");
                    $('#link2').addClass("bg-slate-900");
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
                    $('#link1,#link2').removeClass("bg-slate-900");
                    $('#link3').addClass("bg-slate-900");
                }
            })

        }
    </script>
</body>

</html>

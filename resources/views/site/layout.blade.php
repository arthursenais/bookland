<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca - @yield('title')</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script>
    <script>
        $(window).on('load', function() {
            $("#loader").fadeOut("fast");
        });
    </script>
    <style>
        .swiper {
            user-select: none;
            -moz-user-select: none;
        }
    </style>
    @yield('header')
</head>

<body class="bg-white dark:bg-slate-800 ">
    <div id="loader"
        class="fixed inset-0 dark:bg-gray-800 backdrop-blur dark:text-white flex justify-center items-center bg-white z-50 ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 animate-spin">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg>
    </div>
    <nav class="top-0 z-40 backdrop-blur bg-gray-800/90 dark:bg-gray-900/70 sticky ">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false" onclick="menuMobile()">
                        <span class="sr-only">Abrir menu</span>
                        <!--
                                    Icon when menu is closed.

                                    Menu open: "hidden", Menu closed: "block"
                                -->
                        <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                        <!--
                                Icon when menu is open.

                                Menu open: "block", Menu closed: "hidden"
                            -->
                        <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                    <div class="flex items-center flex-shrink-0">
                        <svg viewBox="0 0 960 856.49" class="w-[30px] hover:animate-pulse dark:fill-white">
                            <path
                                d="m0,120.35c3.84-10.48,11.35-14.71,22.44-14.28,12.48.49,24.99.12,37.49.1,1.8,0,3.6-.16,6.23-.29,0-4.91,0-9.5,0-14.1.02-13.69,8.88-21.39,22.78-20.93,15.12.5,30.27.11,45.93.11.24-2.5.59-4.57.6-6.65.05-14.5.05-29,.02-43.5-.02-7.03,1.63-13.68,7.93-17.3,3.79-2.18,8.93-3.64,13.17-3.1,19.62,2.52,39.34,4.9,58.64,9.07,56.64,12.24,109.71,33.45,157.95,65.93,37.99,25.58,70.39,56.89,95.91,95.1,1,1.5,1.94,3.05,3.36,5.28-6.94.82-13.28,1.5-19.6,2.32-6.27.82-12.51,1.96-18.8,2.57-1.57.15-3.94-.7-4.85-1.91-48.38-64.11-114.34-101.49-189.69-124.18-19.38-5.84-39.45-9.4-59.22-13.95-2.08-.48-4.25-.56-7.01-.91-.12,1.93-.3,3.51-.3,5.09,0,183.66.03,367.31-.13,550.97,0,5.53,2.54,6.03,6.8,6.55,37.28,4.61,73.78,12.59,108.88,26.27.76.3,1.48.71,2.42,1.17-.34,9.62,1.01,18.93,5.62,27.53,7.97,14.88,21.43,22.34,36.88,26.91,17.6,5.2,35.74,6.06,53.93,5.69,4.98-.1,8.74,1.24,12.56,4.53,20.81,17.9,39.4,37.81,55.88,59.73.78,1.03,1.65,1.99,3.33,4.01v-74.19c13.85-3.2,27.08-6.26,41.25-9.53v82.46c.44.09.87.18,1.31.27,5.5-6.83,10.84-13.8,16.52-20.47,53.71-63.1,121.68-103.11,201.58-123.15,19.96-5.01,40.5-7.78,60.85-11.09,4.94-.81,6.6-2.28,6.59-7.4-.15-95.33-.11-190.66-.11-285.98,0-86.33,0-172.66,0-258.98,0-1.17,0-2.33,0-3.5-.03-7.09-.21-7.32-6.94-6.11-43.59,7.85-85.79,20.05-125.79,39.43-39.99,19.37-75.86,44.27-105.75,77.37-4.57,5.06-8.74,10.49-13.26,15.61-.95,1.08-2.6,2.17-3.95,2.19-14.11.16-28.23.1-44.03.1,6.83-9.33,12.51-17.66,18.76-25.54,41.47-52.29,94.56-88.84,155.73-114.28,43.13-17.94,87.99-29.36,134.36-34.87.66-.08,1.33-.09,1.99-.17,19.76-2.44,27.26,7.85,26.36,24.29-.72,13.29-.16,26.66-.14,39.99.01,6.3.25,6.54,6.38,6.54,14.5.02,29-.02,43.5.01,11.66.03,18.96,7.06,19.46,18.77.16,3.82.35,7.68.07,11.48-.29,3.88,1.36,4.83,4.92,4.79,12.33-.15,24.69.42,36.99-.2,11.15-.56,19.45,2.8,24.17,13.31v642c-4.18,11.14-12.34,15.45-23.9,14.03-1.81-.22-3.66-.18-5.49-.29-41.93-2.49-83.86-2.46-125.79-.2-48.75,2.63-97.2,7.76-145.1,17.53-44.29,9.03-87.61,21.24-128.83,40-12.67,5.77-25.09,12.33-36.92,19.66-8.74,5.41-19.13,6.31-27.4.1-2.25-1.69-4.57-3.42-7.1-4.61-18.05-8.48-35.82-17.7-54.33-25.03-49.43-19.58-101.02-30.91-153.54-38.4-41.41-5.91-83.03-9.79-124.83-10.38-34.27-.48-68.58.68-102.85,1.79-11.61.37-19.71-3.1-23.93-14.18V120.35Zm406.81,635.15c0-.94.13-1.35-.02-1.52-3.34-3.71-6.6-7.51-10.11-11.06-46.6-47.19-102.51-77.84-166.78-93.53-25.29-6.17-50.95-9.98-76.89-11.99-9.9-.77-16.19-7.09-17.17-16.92-.26-2.64-.34-5.32-.34-7.98-.02-164.83-.01-329.65-.01-494.48,0-1.67-.08-3.34,0-5,.17-3.47-1.47-4.65-4.85-4.56-6.5.17-13,.05-19.5.05-7.62,0-7.65,0-7.65,7.7,0,181.49,0,362.98.02,544.48,0,2.58.39,5.16.61,7.98,107.09,8.27,208.9,33.18,302.67,86.83Zm145.99-1.28c.31.33.63.67.94,1,1.75-.92,3.52-1.78,5.23-2.75,34.95-19.95,71.74-35.65,109.96-48.15,58.21-19.04,118-29.89,178.93-34.9,10.14-.83,8.63-.51,8.63-9.53,0-180.48,0-360.96,0-541.45,0-1.67-.1-3.34.01-5,.24-3.57-1.15-5.12-4.92-4.98-6.49.23-13,.06-19.5.06q-7.59,0-7.59,7.72c0,165.65,0,331.3,0,496.95,0,1.83.05,3.67-.02,5.5-.47,11.04-7.06,17.59-18.08,18.87-17.85,2.08-35.8,3.74-53.45,6.97-64.71,11.84-122.77,38.08-172.17,82.1-9.77,8.7-18.67,18.37-27.97,27.6Zm78.47,4.24c.13.36.26.72.39,1.07,1.47-.19,2.96-.27,4.4-.59,41.48-9.34,83.46-15.2,125.8-18.85,50.84-4.38,101.75-5.24,152.72-3.54,8.25.28,8.24.4,8.24-7.75,0-192.31,0-384.61,0-576.92,0-1.17-.09-2.34.01-3.5.26-3.07-.83-4.65-4.17-4.63-6.66.04-13.32-.06-19.98-.28-3.64-.12-4.91,1.29-4.9,4.99.09,44.49.04,88.98.04,133.47,0,131.98,0,263.96,0,395.94,0,3,.13,6,0,8.99-.44,10.96-7.24,17.73-18.17,18.67-24.7,2.14-49.5,3.58-74.05,6.86-51.45,6.87-101.59,19.35-150.09,38.04-6.77,2.61-13.49,5.34-20.24,8.01Zm-300.24,1.13c-1.03-.51-2.03-1.08-3.09-1.52-31.56-13.04-63.85-23.88-97.09-31.78-47.07-11.18-94.66-18.66-143.08-20.56-15.88-.62-21.61-7.2-21.61-22.99,0-176.63,0-353.25,0-529.88,0-1.67-.14-3.34.02-5,.32-3.37-1.41-4.41-4.44-4.37-4.66.06-9.33-.03-14,.02-10.61.1-10.33-1.46-10.33,9.96.1,192.46.05,384.91.06,577.37,0,1.77.32,3.54.56,5.93,98.7-3.81,196.32,1.91,293,22.81Z" />
                            <path
                                d="m350.36,287.43c17.3-4.49,33.38-9.39,49.78-12.68,14.34-2.88,22.5,5.08,20.89,19.97-1.32,12.21-4.04,24.28-6.43,36.35-16.35,82.6-32.82,165.17-49.08,247.79-1.67,8.46-2.63,17.13-3.1,25.75-.85,15.66,6.74,26.68,20.27,33.9,10.77,5.75,22.53,8.1,34.49,9.3,31.06,3.12,61.64,1.06,90.88-10.7,32.09-12.91,59.23-32.58,75.65-63.65,17.16-32.48,18.64-66.1-.03-98.79-10.02-17.54-26.75-27.86-45.05-34.79-16.12-6.11-32.95-10.4-49.55-15.18-2.29-.66-5.25.11-7.67.9-18.47,6.05-37.17,8.85-57.13,4.63,4.49-14.96,8.94-29.64,20.6-40.42,9.72-8.99,22.35-10.73,34.93-11.34,8.62-.41,17.3.41,25.95.46,2.19.01,4.88-.15,6.51-1.36,20.47-15.12,39.44-31.79,53.2-53.57,9.06-14.34,14.61-29.78,14.47-47.04-.18-23.51-11.73-41.13-33.54-50.28-19.79-8.3-40.68-9.6-61.77-9.31-46.5.64-90.16,12.26-131.07,34.3-1.12.61-2.3,1.12-4.37,2.12,1.79-6.24,3.3-11.62,4.87-16.99,2.63-8.94,5.12-17.92,8.07-26.75.66-1.97,2.68-4.24,4.6-4.94,41.35-14.99,84.11-22.6,128.03-24.11,25.91-.89,51.61.05,76.75,7.19,13.54,3.85,26.31,9.36,37.93,17.4,26.52,18.35,35.88,42.92,28.27,74.34-5.5,22.71-18.04,41.29-33.96,57.9-17.31,18.05-37.33,32.62-58.5,45.73-1.68,1.04-3.33,2.11-5.64,3.58,8.3,2.55,15.94,4.73,23.47,7.25,25.04,8.38,48.18,20.2,67.84,38.16,30.94,28.27,39.38,62.83,28.68,102.71-7.74,28.83-24.47,51.91-46.56,71.3-39.05,34.28-84.8,55.24-135.08,66.86-36.73,8.49-74,11.49-111.62,9.88-14.36-.61-28.46-3.07-41.76-8.97-19.59-8.69-30.41-26.2-27.1-47.42,4.93-31.56,10.76-63,16.86-94.36,12.84-66,26.16-131.9,39.16-197.87,1.45-7.34,2.29-14.81,3.09-22.25.9-8.34-.68-16.26-6.24-24.98Z" />
                            <path
                                d="m315.92,217.34c-2.14,13.12-4.28,25.87-6.29,38.65-1.27,8.05-2.26,16.13-3.58,24.17-.27,1.65-1.01,3.62-2.21,4.66-20.77,18.05-39.63,37.93-57.45,59.74-5.01-9.76-7.89-19.61-8.37-30.1-1.01-22.59,8.64-40.91,23.39-57,15.01-16.38,33.19-28.61,52.41-39.43.52-.3,1.16-.39,2.1-.69Z" />
                        </svg>
                    </div>

                    <div class="hidden sm:ml-6 sm:block ">
                        <div class="flex items-center space-x-4 ">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('index') }}"
                                class="px-3 py-2 text-xs font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Catálogo</a>
                            <a href="{{ route('categorias') }}"
                                class="px-3 py-2 text-xs font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Categorias</a>
                            <a href="{{ route('novidades') }}"
                                class="px-3 py-2 text-xs font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Recém
                                Adicionados</a>
                            <a href="{{ route('clubedolivro') }}"
                                class="px-3 py-2 text-xs font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Clube
                                da leitura</a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('pesquisar') }}" id="barraPesquisaDesktop" method="GET"
                    class="hidden sm:flex sm:items-center sm:justify-center  sm:space-x-0 sm:w-full sm:flex-1">

                    <input type="search" name="pesquisa" id="pesquisa"
                        placeholder="Pesquisar por livro, autor ou categoria"
                        class="block w-full px-3 py-2 mt-1 text-xs transition bg-white border rounded-l-full shadow-sm dark:bg-slate-800 dark:text-white border-slate-300 dark:border-slate-600 lg:text-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 sm:max-w-sm">
                    <button type="submit"
                        class="px-4 py-2 mt-1 text-xs font-medium text-white transition border rounded-r-full border-sky-800 focus:ring-1 focus:outline-none focus:ring-sky-500 focus:border-sky-500 hover:bg-sky-500 lg:text-sm">
                        Pesquisar
                    </button>
                </form>
                @auth
                    <div class="p-4 hidden sm:block">
                        <div class="relative group">
                            <button type="button"
                                class="px-3 py-2 text-sm font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white">{{ auth()->user()->nome }}</button>
                            <nav tabindex="0"
                                class="absolute left-0 invisible min-w-full font-medium transition-all bg-gray-900 border border-2 border-gray-800 rounded opacity-0 dark:text-white top-full group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
                                <ul class="py-1">
                                    @can('verDashboard')
                                        <li>
                                            <a href="{{ route('dashboard') }}"
                                                class="block px-4 py-2 text-gray-100 transition hover:bg-gray-700">
                                                Painel
                                            </a>
                                        </li>
                                    @endcan
                                    {{-- <li>
                                        <!--
                            Aqui levaria a rota emprestimos, caso o cliente queira que cada aluno tenha um cadastro como usuário
                        -->
                                        <a href="{{ route('meusEmprestimos') }}"
                                            class="block px-4 py-2 text-gray-100 transition hover:bg-gray-700">
                                            Meus empréstimos
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('login.logout') }}"
                                            class="block px-4 py-2 text-red-400 transition hover:bg-gray-700">
                                            Sair
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                @else
                    <div class="p-4">
                        <a href="{{ route('login') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white">Login</a>
                    </div>
                @endauth
            </div>
        </div>


        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                @auth
                    <a href="{{ route('login.logout') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                        aria-current="page">{{ auth()->user()->nome }} - Sair</a>

                    {{--

                        <a href="{{ route('meusEmprestimos') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                        aria-current="page">Meus empréstimos</a> --}}
                    @can('verDashboard')
                        <a href="{{ route('dashboard') }}"
                            class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                            aria-current="page">Painel</a>
                    @endcan
                @else
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                        aria-current="page">Login</a>
                @endauth
                <a href="{{ route('index') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                    aria-current="page">Catálogo</a>
                <a href="{{ route('categorias') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Categorias</a>
                <a href="{{ route('novidades') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Recém
                    Adicionados</a>
                <a href="{{ route('clubedolivro') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Clube
                    da leitura</a>
                <form class="flex sm:items-center sm:justify-center sm:space-x-0 sm:w-full sm:flex-1">
                    <input type="search" name="pesquisa" id="pesquisa"
                        placeholder="Pesquisar por livro, autor ou categoria"
                        class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-l-full shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 ">
                    <button type="submit"
                        class="px-4 py-2 mt-1 text-sm font-medium text-white transition border rounded-r-full border-sky-800 focus:ring-1 focus:outline-none focus:ring-sky-500 focus:border-sky-500 hover:bg-sky-500">
                        Pesquisar
                    </button>

                </form>
            </div>
        </div>
    </nav>

    @yield('content')
    <footer class="justify-between p-8 mt-10 border-t border-slate-200 sm:flex text-slate-500 dark:border-slate-200/5">
        <div>
            <div class="mb-6 sm:mb-0 sm:flex">
                <p class="text-xs sm:text-xs">2023 BookLand</p>

            </div>
        </div>
    </footer>
</body>
<script>
    var active = true;

    function menuMobile() {
        active = !active;

        if (active) {
            $("#mobile-menu").addClass("hidden");
            $("#mobile-menu").removeClass("block");
        } else {
            $("#mobile-menu").removeClass("hidden");
            $("#mobile-menu").addClass("block");
        }
    }
</script>

</html>

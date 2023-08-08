<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('header')
    <title>Biblioteca - @yield('title')</title>
    <style>
       
    </style>
</head>

<body class="bg-white dark:bg-slate-800">
    <nav class="top-0 z-40 backdrop-blur bg-gray-800/90 dark:bg-gray-900/70 sm:sticky ">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
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

                        <p class="block w-auto h-8 font-medium lg:hidden text-slate-300">BookLand</p>

                        <p
                            class="hidden w-auto h-8 py-1 font-medium cursor-default lg:block text-slate-300 hover:animate-pulse">
                            BookLand</p>
                    </div>

                    <div class="hidden sm:ml-6 sm:block ">
                        <div class="flex items-center space-x-4 ">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('index') }}"
                                class="px-3 py-2 text-xs font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Catálogo</a>
                            <a href="{{ route('wip') }}"
                                class="px-3 py-2 text-xs font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Mais
                                lidos</a>
                            <a href="{{ route('novidades') }}"
                                class="px-3 py-2 text-xs font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Recém
                                Adicionados</a>
                            <a href="{{ route('wip') }}"
                                class="px-3 py-2 text-xs font-medium text-gray-300 transition rounded-md hover:bg-gray-700 hover:text-white lg:text-sm">Indicações</a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('pesquisar') }}" method="GET"
                    class="hidden sm:flex sm:items-center sm:justify-center sm:ml-6 sm:space-x-0 sm:w-full sm:flex-1">

                    <input type="search" name="pesquisa" id="pesquisa"
                        placeholder="Pesquisar por livro, autor ou categoria"
                        class="block w-full px-3 py-2 mt-1 text-xs transition bg-white border rounded-l-full shadow-sm dark:bg-slate-800 dark:text-white border-slate-300 dark:border-slate-600 lg:text-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 sm:max-w-sm">
                    <button type="submit"
                        class="px-4 py-2 mt-1 text-xs font-medium text-white transition border rounded-r-full border-sky-800 focus:ring-1 focus:outline-none focus:ring-sky-500 focus:border-sky-500 hover:bg-sky-500 lg:text-sm">
                        Pesquisar
                    </button>
                    @auth
                        <div class="p-4">
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
                                                    Dashboard
                                                </a>
                                            </li>
                                        @endcan
                                        <li>
                                            <a href="{{ route('meusEmprestimos') }}"
                                                class="block px-4 py-2 text-gray-100 transition hover:bg-gray-700">
                                                Meus empréstimos
                                            </a>
                                        </li>
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
                </form>
            </div>
        </div>


        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                @auth
                    <a href="{{ route('login.logout') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                        aria-current="page">{{ auth()->user()->nome }} - Sair</a>
                @else
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                        aria-current="page">Login</a>
                @endauth
                <a href="{{ route('index') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                    aria-current="page">Catálogo</a>
                <a href="{{ route('wip') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Mais
                    vendidos</a>
                <a href="{{ route('novidades') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Recém
                    Adicionados</a>
                <a href="{{ route('wip') }}"
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Indicações</a>
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
                <p class="text-2xl sm:text-base">Copyright © 2023 BookLand.com</p>
                <p class="sm:ml-4 sm:pl-4 sm:border-l sm:border-slate-200 dark:sm:border-slate-200/5">
                    <a class="text-2xl hover:text-slate-900 dark:hover:text-slate-400 sm:text-base "
                        href="#">Voltar ao topo</a>
                </p>
            </div>
        </div>
    </footer>
</body>


</html>

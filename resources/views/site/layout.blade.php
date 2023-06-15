<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Biblioteca - @yield('title')</title>
    <style>
::-webkit-scrollbar {
  width: 2px;
}
::-webkit-scrollbar:horizontal {
  width: 2px;
 height: 3px;

}

/* Track */
::-webkit-scrollbar-track {
  background: #88888817;
  border-radius: 12px;

}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 12px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
    </style>
</head>

<body class="bg-white dark:bg-slate-800">
    <nav class="backdrop-blur bg-gray-800/90 dark:bg-gray-900/70 sm:sticky top-0 z-50 ">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Abrir menu</span>
                        <!--
                                    Icon when menu is closed.

                                    Menu open: "hidden", Menu closed: "block"
                                -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                        <!--
                                Icon when menu is open.

                                Menu open: "block", Menu closed: "hidden"
                            -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">

                        <p class="block h-8 w-auto lg:hidden text-slate-300 font-medium">Bomlivro</p>

                        <p class="hidden h-8 w-auto lg:block text-slate-300 font-medium py-1  hover:animate-pulse cursor-default">Bomlivro</p>
                    </div>

                    <div class="hidden sm:ml-6 sm:block ">
                        <div class="flex space-x-4 items-center ">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('index') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-xs lg:text-sm font-medium transition">Catálogo</a>
                            <a href="{{ route('wip') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-xs lg:text-sm font-medium transition">Mais
                                lidos</a>
                            <a href="{{ route('novidades') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-xs lg:text-sm font-medium transition">Recém
                                Adicionados</a>
                            <a href="{{ route('wip') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-xs lg:text-sm font-medium transition">Indicações</a>
                        </div>
                    </div>
                </div>
                <form action="{{route('pesquisar')}}" method="GET"
                    class="hidden sm:flex sm:items-center sm:justify-center sm:ml-6 sm:space-x-0 sm:w-full sm:flex-1">

                    <input type="search" name="pesquisa" id="pesquisa"
                        placeholder="Pesquisar por livro, autor ou categoria"
                        class="mt-1 block px-3 py-2 bg-white dark:bg-slate-800 dark:text-white border border-slate-300 dark:border-slate-600 rounded-l-full text-xs lg:text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 sm:max-w-sm w-full transition">
                    <button type="submit"
                        class="mt-1  border border-sky-800 focus:ring-1  focus:outline-none focus:ring-sky-500 focus:border-sky-500 hover:bg-sky-500 transition text-white px-4 py-2 rounded-r-full text-xs lg:text-sm font-medium">
                        Pesquisar
                    </button>
                    @auth
                    <div class="p-4">
    <div class="group relative">
        <button type="button" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium transition">{{auth()->user()->nome}}</button>
        <nav tabindex="0" class="border border-2 bg-gray-900 font-medium dark:text-white invisible border-gray-800 rounded min-w-full  absolute left-0 top-full transition-all opacity-0 group-focus-within:visible group-focus-within:opacity-100 group-focus-within:translate-y-1">
            <ul class="py-1">
                @can('verDashboard')

                <li>
                    <a href="{{route('dashboard')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        Dashboard
                    </a>
                </li>
                @endcan
                <li>
                    <a href="{{route('login.logout')}}" class="block text-red-400    px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        Sair
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

                    @else
                    <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium transition">Login</a>
                    @endauth
                </form>
            </div>
        </div>


        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                @auth
                    <a href="{{ route('login.logout') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">{{auth()->user()->nome}} - Sair</a>
                    @else
                    <a href="{{ route('login') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Login</a>
                    @endauth
                <a href="{{ route('index') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Catálogo</a>
                <a href="{{ route('wip') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Mais
                    vendidos</a>
                <a href="{{ route('novidades') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Recém
                    Adicionados</a>
                <a href="{{ route('wip') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Indicações</a>
                <form class=" flex sm:items-center sm:justify-center sm:space-x-0 sm:w-full sm:flex-1">
                    <input type="search" name="pesquisa" id="pesquisa"
                        placeholder="Pesquisar por livro, autor ou categoria"
                        class="mt-1 block px-3 py-2 bg-white border border-slate-300 rounded-l-full text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500  w-full ">
                    <button type="submit"
                        class="mt-1  border border-sky-800 focus:ring-1  focus:outline-none focus:ring-sky-500 focus:border-sky-500 hover:bg-sky-500 transition text-white px-4 py-2 rounded-r-full text-sm font-medium">
                        Pesquisar
                    </button>

                </form>
            </div>
        </div>
    </nav>

    @yield('content')
    <footer class="mt-10 p-8 border-t border-slate-200 sm:flex justify-between text-slate-500 dark:border-slate-200/5">
        <div>
            <div class="mb-6 sm:mb-0 sm:flex">
                <p class="sm:text-base text-2xl">Copyright © 2023 Bomlivro.com</p>
                <p class="sm:ml-4 sm:pl-4 sm:border-l sm:border-slate-200 dark:sm:border-slate-200/5">
                    <a class="hover:text-slate-900 dark:hover:text-slate-400 text-2xl sm:text-base "
                        href="#">Voltar ao topo</a>
                </p>
            </div>
        </div>
    </footer>
</body>


</html>

@extends('site.layout')
@section('title', 'Fazer empréstimo')

@section('content')
    @include('user.mensagens')
    <div class="flex flex-col-reverse items-center p-10 sm:items-start sm:justify-around dark:text-white sm:flex-row ">
        <div>
            @can('verDashboard')
            <h1 class="text-4xl">Fazer empréstimo</h1>
            <p>
                @if ($livro->disponiveis >= 1)
                {{ $livro->disponiveis }}
                @if ($livro->disponiveis == 1)
                    exemplar disponível
                @else
                    exemplares disponíveis
                @endif
            @else
            Nenhum exemplar disponível
            @endif
            </p>
                <form method="POST" action="{{ route('storeEmprestimo') }}" class="flex flex-col mt-8 max-w-fit">
                    @csrf
                    <label for="data" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quando o livro
                        será levado?</label>

                    <input name="data_emprestimo" min="{{ $hoje }}" type="date" autocomplete="nome" required
                        class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm dark:text-black border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-red-500 invalid:text-red-600 focus:invalid:border-red-500 focus:invalid:ring-red-500 ">


                    <label for="semanas" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quantas
                        semanas livro estará com a pessoa que o pegará emprestado?</label>

                    <input min="1" max="4" value="1" name="semanas" type="number" autocomplete="nome"
                        required
                        class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm dark:text-black border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-red-500 invalid:text-red-600 focus:invalid:border-red-500 focus:invalid:ring-red-500">
                    <label for="id_aluno" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Quem
                        levará o livro? obs: se o aluno não consta na lista, você deverá cadastrá-lo</label>
                    <select name="id_aluno"
                        class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm dark:text-black border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-red-500 invalid:text-red-600 focus:invalid:border-red-500 focus:invalid:ring-red-500">
                        @foreach ($alunos as $aluno)
                            <option value="{{ $aluno->id }}">{{$aluno->matricula}}: {{ $aluno->nome_completo }}</option>
                        @endforeach

                    </select>
                    <input type="hidden" name="id_livro" value="{{ $livro->id }}">
                    <button type="submit"
                        class=" w-full rounded-md bg-sky-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600 mt-4">Alugar</button>
                </form>
            @else
                <p>Você não está habilitado para fazer um empréstimo</p>

            @endcan
        </div>
        <div>
            <h1 class="text-xl max-w-fit">{{ $livro->titulo }}</h1>
            <img class="shadow-lg max-w-sm shadow-black/50 hover:shadow-black/70 dark:shadow-black/30 dark:hover:shadow-black/50 hover:grayscale-0 grayscale-[30%] ease-out duration-300"
                src="{{ Str::startsWith($livro->imagem, 'http') ? $livro->imagem : asset("storage/{$livro->imagem}") }}"
                alt="Imagem">
        </div>
    </div>

@endsection

@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')
    <div class="flex flex-col mt-12 p-10 text-white">
        @forelse ($emprestimosAtivos as $emprestimo)
            @if ($loop->first)
                <h1 class="text-4xl pb-4">Empréstimos ativos</h1>
                <table class="bg-black/20 table-auto">
                    <tr class="text-xl bg-gray-900">
                        <td class="border border-gray-700">Feito por</td>
                        <td class="border border-gray-700">Título do livro</td>
                        <td class="border border-gray-700">Data de criação</td>
                        <td class="border border-gray-700">Data de devolução estipulada</td>
                    </tr>
            @endif
            <tr>
                <td class="border border-gray-700">{{ $emprestimo->usuario->nome }}</td>
                <td class="border border-gray-700">{{ $emprestimo->livro->titulo }}</td>
                <td class="border border-gray-700">{{ $emprestimo->created_at }}</td>
                <td class="border border-gray-700">{{ $emprestimo->data_limite }}</td>
            </tr>
            @if ($loop->last)
                </table>
            @endif
        @empty
            <h1 class="text-2xl pb-4">Não há empréstimos ativos atualmente</h1>
        @endforelse

        @forelse ($emprestimosArquivados as $emprestimo)
            @if ($loop->first)
                <h1 class="text-4xl pb-4">Empréstimos arquivados</h1>
                <table class="bg-black/20 table-auto">
                    <tr class="text-xl bg-gray-900">
                        <td class="border border-gray-700">Feito por</td>
                        <td class="border border-gray-700">Título do livro</td>
                        <td class="border border-gray-700">Data de criação</td>
                        <td class="border border-gray-700">Data de devolução</td>
                    </tr>
            @endif
            <tr>
                <td class="border border-gray-700">{{ $emprestimo->usuario->nome }}</td>
                <td class="border border-gray-700">{{ $emprestimo->livro->titulo }}</td>
                <td class="border border-gray-700">{{ $emprestimo->created_at }}</td>
                <td class="border border-gray-700">{{ $emprestimo->data_limite }}</td>
            </tr>
            @if ($loop->last)
                </table>
            @endif
        @empty
            <h1 class="text-2xl pb-4">Não há empréstimos arquivados atualmente</h1>
        @endforelse


    </div>
@endsection

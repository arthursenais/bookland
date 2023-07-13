@extends('site.layout')
@section('title', 'Bem-vindo!')

@section('content')
<div class="flex flex-col mt-12 text-white">
  <h1>Empréstimos arquivados</h1>
  <table>
      @forelse ($emprestimos as $emprestimo)
    <tr>
      <td>{{$emprestimo->livro->titulo}}</td>
      <td>cell2_1</td>
      <td>cell3_1</td>
      <td>cell4_1</td>
    </tr>
    @empty
  @endforelse
  </table>


</div>
@endsection

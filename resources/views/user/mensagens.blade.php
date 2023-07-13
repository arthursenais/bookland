@if ($mensagem = Session::get('erro'))
<div class="fixed flex justify-center p-4 text-white rounded max-w-fit top-20 left-20 bg-red-500/30 backdrop-blur">
    <p>{{$mensagem}}</p>
 </div>

@endif
@if ($mensagem = Session::get('sucesso'))
<div class="fixed flex justify-center p-4 text-white rounded max-w-fit top-20 left-20 bg-green-500/30 backdrop-blur">
    <p>{{$mensagem}}</p>
 </div>

@endif

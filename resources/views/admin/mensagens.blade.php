@if ($mensagem = Session::get('sucesso'))
<div class="mensagem text-white max-w-fit fixed top-20 left-20 flex justify-center p-4 bg-green-500/30 rounded backdrop-blur">
    <p>{{$mensagem}}</p>
 </div>
<script>
    $('.mensagem').on("click",function () {
        $(this).remove();
    })
</script>
@endif

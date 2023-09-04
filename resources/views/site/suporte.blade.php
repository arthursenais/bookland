@extends('site.layout')
@section('title', 'Suporte')

@section('content')

    <h1 class="md:text-4xl text-center mt-6 text-2xl dark:text-gray-300">Suporte</h1>

    <div class="flex flex-col items-center sm:px-32 mt-5 ">
        <form action="mailto:arthur_sa@estudante.sesisenai.org.br" class="flex flex-col gap-5" method="get" enctype="text/plain">
            <input type="hidden" name="subject" value="Suporte Bookland">
            <div class="flex flex-col">
                <label for="email" class="dark:text-white">Email:</label>

                <input class="p-1" type="email" name="email" placeholder="Digite seu email" id="email">
            </div>

            <div class="flex flex-col">
                <label for="body" class="dark:text-white">Como podemos ajudar?</label>

                <textarea class="p-1" name="body" id="body" cols="30" rows="10" placeholder="Digite aqui"></textarea>
            </div>

            <input type="submit" class="p-2 bg-sky-500 rounded-md text-white hover:bg-sky-600 transition hover:cursor-pointer" value="Enviar">
        </form>


    </div>

@endsection

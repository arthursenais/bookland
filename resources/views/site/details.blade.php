@extends('site.layout')
@section('title', 'Bem-vindo!')
@section('content')

<div class="flex flex-col sm:px-32 px-0">
<div class="flex mt-10 flex-col sm:flex-row sm:items-start items-center">

        <div class="max-w-xs mb-12 sm:mr-12 ">
            <h1 class="sm:hidden text-2xl">{{$livro->titulo}}</h1>
           <img src="{{$livro->imagem}}">
        </div>
        <div class="max-w-xs sm:max-w-none">
            <h1 class="sm:text-4xl text-2xl"> {{$livro->titulo}} </h1>
            <a href="" class=" text-gray-600 hover:text-gray-950 hover:underline transition-all">{{$livro->autor}}</a>
            <br>
            <a href="" class="text-gray-600 hover:text-gray-950 hover:underline transition-all">{{$livro->categoria->nome}}</a>
            <p>{{$livro->descricao}}</p>

           <div class="flex">
            <button class="sm:bg-inherit border-l  border-t border-b border-sky-600 hover:bg-sky-600 hover:text-white bg-sky-600 sm:p-0 sm:px-2 p-2 sm:text-sky-600 text-white sm:rounded-l-full rounded  transition">Empréstimo</button>
            <button class="sm:bg-inherit border-r  border-t border-b border-red-500 hover:bg-red-500 hover:text-white bg-red-500 sm:p-0 sm:px-2 p-2 sm:text-red-500 text-white sm:rounded-r-full rounded transition">Reserva</button>

           </div>
        </div>
    </div>
</div>
@endsection

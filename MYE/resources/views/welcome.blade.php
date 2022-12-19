@extends('layouts.main')
@section('title','Make Your Event')
@section('content')

    <h1>Algum titulo</h1>
    @if(2 > 5)
        <p>A condição é true</p>
    @endif

    <p>{{$nome}}</p>
    @if($nome == "pedro")
        <p>Bem vindo Pedro</p>
    @else
        <p>acesso não autorizado</p>
    @endif

    @for(;$i<10;$i += 1)
        @if($i % 3 == 0)
            {{$i}}
        @endif
    @endfor

@endsection

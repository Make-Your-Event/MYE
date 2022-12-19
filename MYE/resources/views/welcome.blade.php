@extends('layouts.main')
@section('title','Make Your Event')
@section('content')

<h1>Crie seu Evento</h1>

    @foreach($events as $item)

        <p>{{$item->nome}} -- {{$item->descricao}}</p>
        
    @endforeach
@endsection

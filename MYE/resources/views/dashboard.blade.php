@extends('layouts.main')
@section('title','Perfil')
@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events)>0)
        @else
            <p>Você ainda não criou nenhum evento 😢</p>
            <a href="/events/create">Que tal criar um?</a>
        @endif
    </div>

@endsection

@extends('layouts.main')
@section('title','Make Your Event')
@section('content')

    <div id="search-container" class="col-md-12">

        <h1>Busque um evento</h1>
        <form action="/" method="GET" class="input-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar evento">
            <input type="submit" class="btn btn-primary" value="🔎" id="search-button">
        </form>

    </div>

    <div id="events-container" class="col-md-12">
        @if($search)
            <h2>Resultados para '{{$search}}'</h2>
        @else
            <h2>Próximos eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach($events as $event)
                <div class="card col-md-3">
                    <img src="/img/event_2.jpg" alt="{{$event->nome}}">
                    <div class="card-body">
                        <p class="card-date">{{date('d/m/y',strtotime($event->inicio))}}</p>
                        <h5 class="card-title">{{$event->nome}}</h5>
                        <p class="card-participants">X participantes</p>
                        <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($events) == 0 && $search)
                <p>Nenhum evento encontrado</p>
            @endif
        </div>
    </div>
@endsection

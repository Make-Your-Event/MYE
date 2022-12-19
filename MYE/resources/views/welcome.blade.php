@extends('layouts.main')
@section('title','Make Your Event')
@section('content')

    <div id="search-container" class="col-md-12">

        <h1>Busque um evento</h1>
        <form action="" class="input-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar evento">
        </form>

    </div>

    <div id="events-container" class="col-md-12">
        <h2>Próximos eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach($events as $event)
                <div class="card col-md-3">
                    <img src="/img/event_2.jpg" alt="{{$event->nome}}">
                    <div class="card-body">
                        <p class="card-date">2022/10/09</p>
                        <h5 class="card-title">{{$event->nome}}</h5>
                        <p class="card-participants">X participantes</p>
                        <a href="#" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

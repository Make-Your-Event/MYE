@extends('layouts.main')
@section('title',$event->nome)
@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/event_2.jpg" alt="{{$event->nome}}" class="img-fluid">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$event->nome}}</h1>
                <hr>
                <p class="events-participants" >
                    <ion-icon name="people-outline"></ion-icon>
                    X participantes
                </p>
                <p class="event-owner" tool title="Criador do evento">
                    <ion-icon name="person-circle" ></ion-icon>
                    {{$eventOwner['name']}}
                </p>
                <p class="event-period">
                    Período📅<br>Início: {{ date('d/m/y - H:i', strtotime($event->inicio)) }}    <br>Fim: {{ date('d/m/y - H:i', strtotime($event->fim)) }}
                </p>
                <a href="" class="btn btn-primary" id="event-submit">Participar</a>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Descrição</h3>
                <p class="event-description">{{$event->descricao}}</p>
            </div>
        </div>
    </div>
@endsection

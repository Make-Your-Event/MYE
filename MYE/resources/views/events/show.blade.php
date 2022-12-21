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
                    {{count($event->users)}} Participantes
                </p>
                <p class="event-owner" tool title="Criador do evento">
                    <ion-icon name="person-circle" ></ion-icon>
                    {{$eventOwner['name']}}
                </p>
                <p class="event-period">
                    Período📅<br>Início: {{ date('d/m/y - H:i', strtotime($event->inicio)) }}    <br>Fim: {{ date('d/m/y - H:i', strtotime($event->fim)) }}
                </p>
                <p class="ingresso-disponivel">
                    Faltam {{$ingressos_faltando}} ingressos!<br>
                </p>
                <p>
                    Preço: {{$preco_ingresso}} R$
                </p>
                @if($userIsParticipant)
                    <p>Sua participação foi confirmada!</p>
                @else
                    <form action="/events/join/{{$event->id}}" method="POST">
                        @csrf
                        <a href="/events/join/{{$event->id}}" class="btn btn-primary" id="event-submit"
                           onclick="event.preventDefault();
                            this.closest('form').submit();
                    "
                        >Participar</a>
                    </form>
                @endif

            </div>
            <div class="col-md-6" id="description-container">
                <h3>Localidade</h3>
                <p class="event-description">{{$localidade->descricao}}</p>
                <p>
                    Endereço: {{$localidade->endereco}}
                </p>
                <p>
                    CEP: {{$localidade->CEP}}
                </p>
            </div>
            <div class="col-md-6" id="description-container">
                <h3>Descrição</h3>
                <p class="event-description">{{$event->descricao}}</p>
            </div>
        </div>
    </div>
@endsection

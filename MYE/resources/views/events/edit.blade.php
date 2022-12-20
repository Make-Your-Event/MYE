@extends('layouts.main')
@section('title','Editar evento')
@section('content')

    <div id="event-create-container" class="col-md6">
        <h1>Editando evento</h1>
        <form action="/events/update/{{$event->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">

                <label for="title">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{$event->nome}}">

            </div>

            <div class="form-group">

                <label for="title">Assunto</label>
                <input type="text" class="form-control" id="assunto" name="assunto" value="{{$event->assunto}}">

            </div>

            <div class="form-group">

                <label for="title">Descrição</label>
                <textarea type="text" class="form-control" id="descricao" name="descricao" >{{$event->descricao}}</textarea>

            </div>

            <div class="form-group">

                <label for="title">Data de Inicio</label>
                <input type="datetime-local" class="form-control" id="inicio" name="inicio" value="{{$event->inicio}}">

            </div>

            <div class="form-group">

                <label for="title">Data de término</label>
                <input type="datetime-local" class="form-control" id="fim" name="fim" value="{{$event->fim}}">

            </div>
            <input type="submit" value="Confirmar" class="btn btn-primary">
        </form>
    </div>
@endsection

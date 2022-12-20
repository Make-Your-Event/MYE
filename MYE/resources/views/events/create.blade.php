@extends('layouts.main')
@section('title','Criar evento')
@section('content')

    <div id="event-create-container" class="col-md6">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="post">
            @csrf
            <div class="form-group">

                <label for="title">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">

            </div>

            <div class="form-group">

                <label for="title">Assunto</label>
                <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto">

            </div>

            <div class="form-group">

                <label for="title">Descrição</label>
                <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"></textarea>

            </div>

            <div class="form-group">

                <label for="title">Data de Inicio</label>
                <input type="datetime-local" class="form-control" id="inicio" name="inicio" >

            </div>

            <div class="form-group">

                <label for="title">Data de término</label>
                <input type="datetime-local" class="form-control" id="fim" name="fim">

            </div>
            <input type="submit" value="Criar" class="btn btn-primary">
        </form>
    </div>
@endsection

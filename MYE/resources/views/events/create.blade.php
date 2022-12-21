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
            {{--Ingressos-------------------------------------------------------}}
            <hr>
            <h3>Ingresso</h3>

            <div class="form-group">
                <label for="ingressoTitulo">Titulo do ingresso</label>
                <input type="text" class="form-control" id="ingressoTitulo" name="ingressoTitulo">
            </div>
            <div class="form-group">
                <label for="ingressoQuantidade">Quantidade disponivel</label>
                <input type="number" min="0" max="999999" class="form-control" id="ingressoQuantidade" name="ingressoQuantidade">
            </div>
            <div class="form-group">
                <label for="ingressoPreco">Preço por unidade</label>
                <input type="number" min="0" max="999999" step="0.01" class="form-control" id="ingressoPreco" name="ingressoPreco">
            </div>
            <div class="form-group">
                <label for="ingressoDescricao">Descrição</label>
                <textarea type="text" class="form-control" id="ingressoDescricao" name="ingressoDescricao" placeholder="Descrição"></textarea>
            </div>
            <div class="form-group">
                <label for="ingressoData_inicio_venda">Data de início de vendas</label>
                <input type="date" class="form-control" id="ingressoData_inicio_venda" name="ingressoData_inicio_venda">
            </div>
            <div class="form-group">
                <label for="ingressoData_termino_venda">Data de término de vendas</label>
                <input type="date" class="form-control" id="ingressoData_termino_venda" name="ingressoData_termino_venda">
            </div>

            {{--Localidade-------------------------------------------------------}}
            <hr>
            <h3>Localidade</h3>

            <div class="form-group">
                <label for="localidadeEndereco">Endereço</label>
                <input type="text" class="form-control" id="localidadeEndereco" name="localidadeEndereco">
            </div>
            <div class="form-group">
                <label for="localidadeCEP">CEP</label>
                <input type="text" class="form-control" id="localidadeCEP" name="localidadeCEP">
            </div>
            <div class="form-group">
                <label for="localidadeDescricao">Descrição</label>
                <textarea type="text" class="form-control" id="localidadeDescricao" name="localidadeDescricao" placeholder="Descrição"></textarea>
            </div>

            <input type="submit" value="Criar" class="btn btn-primary">
        </form>
    </div>
@endsection

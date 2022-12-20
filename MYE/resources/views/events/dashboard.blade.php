@extends('layouts.main')
@section('title','Perfil')
@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events)>0)
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td scope="row">{{$loop->index + 1}}</td>
                            <td>
                                <a href="/events/{{$event->id}}">
                                    {{$event->nome}}
                                </a>
                            </td>
                            <td>0</td>
                            <td id="form-container">
                                <a href="/events/edit/{{$event->id}}" class="btn btn-info edit-btn">Editar</a>
                                <form action="/events/{{$event->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não criou nenhum evento 😢</p>
            <a href="/events/create" class="dark-link">Que tal criar um?</a>
        @endif
    </div>

@endsection

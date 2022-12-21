<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ingresso;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
class EventController extends Controller
{
    public function index(){
        $search = request("search");
        if($search){
            $events = Event::where([
                ['nome','like','%' .$search. '%']
            ])->get();
        }else{
            $events = Event::all();
        }


        return view('welcome', ['events'=>$events,'search'=>$search]);
    }

    public function createEvent(){
        return view('events.create');
    }

    public function store(Request $request){

//      populando evento
        $event = new Event;
        $event->nome = $request->nome;
        $event->assunto = $request->assunto;
        $event->descricao = $request->descricao;
        $event->inicio = $request->inicio;
        $event->fim = $request->fim;


        $user = auth()->user();
        $event->user_id = $user->id;
//        salvando usuario
        $event->save();



//        populando ingresso
        $ingresso = new Ingresso;
        $ingresso->titulo = $request->ingressoTitulo;
        $ingresso->quantidade = $request->ingressoQuantidade;
        $ingresso->preco = $request->ingressoPreco;
        $ingresso->descricao = $request->ingressoDescricao;
        $ingresso->data_inicio_venda = $request->ingressoData_inicio_venda;
        $ingresso->data_termino_venda = $request->ingressoData_termino_venda;
        $ingresso->event_id = $event->id;

        $ingresso->save();



        return redirect('/');

    }

    public function show($id){
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id',$event->user_id)->first()->toArray();

        $collectionOfParticipants = $event->users()->get();
        $concatenatedStringOfParticipantsIds = $collectionOfParticipants->implode('id','-');
        $arrayOfParticipantsIds = explode("-",$concatenatedStringOfParticipantsIds);
        $user = auth()->user();

        $userIsParticipant = ($user != null && in_array($user->id, $arrayOfParticipantsIds));

        $ingresso = Ingresso::where('event_id',$id)->first();

        return view('events.show',['event'=>$event,
            'eventOwner' => $eventOwner,
            'userIsParticipant' => $userIsParticipant,
            'ingressos_faltando'=>$ingresso->quantidade,
            'preco_ingresso'=>$ingresso->preco
        ]);
    }

    public function dashboard(){
        $user = auth()->user();

        $userName = User::findOrFail($user->getAuthIdentifier());
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant()->get();



        return view('events.dashboard', ['events' => $events,
            'eventsAsParticipant' => $eventsAsParticipant,
            'userName'=>$userName->name
        ]);
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        $users = $event->users;

        foreach($users as $user){
            $event->users()->detach($user->id);
        }

        $event->delete();
        return redirect('/dashboard');
    }

    public function edit($id){
        $event = Event::findOrFail($id);

        $user = auth()->user();

        if($user->id != $event->user_id){
            return redirect('/dashboard');
        }

        return view('events.edit', ['event'=>$event]);
    }

    public function update(Request $request){
        Event::findOrFail($request->id)->update($request->all());
        return redirect('/dashboard');
    }

    public function joinEvent($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);

        $arrayOfParticipants = $event->users()->get();
        $concatenatedStringOfParticipantsIds = $arrayOfParticipants->implode('id','-');
        $arrayOfParticipantsIds = explode("-",$concatenatedStringOfParticipantsIds);

        $participants = explode("-",$event->users()->get()->implode('id','-'));

//        não permite entrar no evento se ja estiver cadastrado
        if(in_array($user->id,$arrayOfParticipantsIds)){
            return redirect('/');
        }

        $user->eventsAsParticipant()->attach($id);


        $ingresso = Ingresso::where('event_id',$id)->first();
//        não permite entrar no evento se não houverem ingressos disponiveis
        if($ingresso->quantidade <= 0){
            return redirect('/');
        }

//        decrementando o numero de ingressos disponiveis
        $ingresso->quantidade -= 1;
        $ingresso->save();

        return redirect('/events/'.$event->id);
    }

    public function leaveEvent($id){
        $user = auth()->user();

        $event = Event::findOrFail($id);

        $user->eventsAsParticipant()->detach($id);

        //incrementa o numero de ingressos disponiveis
        $ingresso = Ingresso::where('event_id',$id)->first();
        $ingresso->quantidade += 1;
        $ingresso->save();


        return redirect('/dashboard');
    }
}

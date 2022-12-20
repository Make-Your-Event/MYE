<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $event = new Event;

        $event->nome = $request->nome;
        $event->assunto = $request->assunto;
        $event->descricao = $request->descricao;
        $event->inicio = $request->inicio;
        $event->fim = $request->fim;


        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/');

    }

    public function show($id){
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id',$event->user_id)->first()->toArray();
        return view('events.show',['event'=>$event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard(){
        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant()->get();

        return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();
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

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/events/'.$event->id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){

        $nome = "pedro";

        return view('welcome', ['nome'=>$nome, 'i'=>0]);
    }

    public function createEvent(){
        return view('events.create');
    }

}

<?php

namespace App\Http\Controllers;

use Faker\Core\Color;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Session;

class EstudoController extends Controller
{
    public function index(){

        
        return view('welcome');
    }

    public function create(){
        
        return view('/eventos/create');
    }

    public function entrar(){
        return view('/eventos/entrar');
    }

    public function cadastrar(){
        return view('/eventos/cadastrar');
    }

    public function sobre(){
        return view('/eventos.sobre');
    }











public function store(Request $request)
{
    $event = new Event;
    $event->title = $request->title;
    $event->date = $request->date;
    $event->hora = $request->hora; 
    $event->private = $request->private;
    $event->description = $request->description;
    $event->items = $request->items;

    $user = auth()->user();
    $event->user_id = $user->id;

    $event->save();

    return redirect()->route('eventos.show', $event->id)
    ->with('success', 'Evento criado com sucesso!')
    ->with('whatsapp', true); // ativa auto-disparo pro WhatsApp
}


public function show($id) {
    $event = Event::findOrFail($id); // Busca o evento pelo ID

    return view('eventos.show', ['event' => $event]); // Passa para a view
}
public function dashboard(){
    $user=auth()->user();
    $events=$user->events;

    return view('eventos.dashboard',['events' => $events]);
}

public function destroy($id) {
    Event::findOrFail($id)->delete();
    return redirect('/dashboard')->with('success','evento excluído com sucesso!');
}
public function edit($id) {

    $event = Event::findOrFail($id);
    return view('eventos.edit',['event'=> $event ]);

    if($user->id != $event->user_id){
        return redirect('/dashboard');
    }
}

public function update(Request $request) {

    Event::findOrFail($request->id)->update($request->all());
    return redirect('/dashboard')->with('success','evento editado com sucesso!');
}
}

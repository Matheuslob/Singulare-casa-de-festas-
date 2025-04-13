@extends('layout.main')

@section('title', 'editando: ' . $event->title )

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editando: {{ $event->title }}</h1>
  <form action="/eventos/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
    <div class="form-group mb-2">
      <label for="title">Evento:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
    </div>
    <div class="form-group mb-2">
      <label for="date">Data do evento:</label>
      <input type="date" class="form-control" id="date" name="date" value="{{date('Y-m-d', strtotime($event->date));}}">
    </div>
    <div class="form-group mb-2">
      <label for="hora">Hora do evento:</label>
      <input type="time" class="form-control" id="hora" name="hora" value="{{ $event->hora }}">
  </div>
    <div class="form-group mb-2">
      <label for="title">O evento é privado?</label>
      <select name="private" id="private" class="form-control">
        <option value="0">Não</option>
        <option value="1" {{ $event->private==1?"selecte='selected":"" }}>Sim</option>
      </select>
    </div>
    <div class="form-group mb-2">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
    </div>
    <div class="form-group mb-2">
      <label for="title">Adicionando itens de infraestrutura:</label>
    </div>
    <div class="form-group mb-1">
      <input type="checkbox" name="items[]" value="Cadeira"> Cadeiras
    </div>
    <div class="form-group mb-1">
      <input type="checkbox" name="items[]" value="palco"> Palco
    </div>
    <div class="form-group mb-1">
      <input type="checkbox" name="items[]" value="iluminação"> Iluminação
    </div>
    <div class="form-group mb-1">
      <input type="checkbox" name="items[]" value="open bar"> Open bar
    </div>
    <div class="form-group mb-1">
      <input type="checkbox" name="items[]" value="open food"> Open food
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Evento">
  </form>
</div>
@endsection

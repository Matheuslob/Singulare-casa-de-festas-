@extends('layout.main')
@section('title', $event -> title)
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">  
    <div class="row">
        <div id="info-container" class="col-md-6">
            <h1>{{ $event->title }}</h1>
            <p> -- Data do evento: {{date('d/m/Y', strtotime($event->date))}} </p>
            <p> -- Horário do evento: {{ $event->hora }}</p>
            @if ($event->private == 0)
                <p> -- O evento é:  Privado</p>
            @else
                <p> -- O evento é:  Público</p>
            @endif
            
            <p> -- Descrição do evento: {{ $event->description }}</p>
            <h4>O evento conta com:</h4>
            <ul id="items-list">
                @foreach($event->items as $item)
                    <li>
                        <ion-icon name="play-outline"></ion-icon> {{ $item}}
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
@endsection

@php
    $mensagem = "*Novo Evento Criado!*%0A";
    $mensagem .= "*Nome:* {$event->title}%0A";
    $mensagem .= "*Data:* " . \Carbon\Carbon::parse($event->date)->format('d/m/Y') . "%0A";
    $mensagem .= "*Hora:* " . \Carbon\Carbon::parse($event->hora)->format('H:i') . "%0A";
    $mensagem .= "*Privado:* " . ($event->private ? 'Sim' : 'Não') . "%0A";
    $mensagem .= "*Descrição:* {$event->description}%0A";
    if (is_array($event->items)) {
        $mensagem .= "*Infraestrutura:*%0A";
        foreach ($event->items as $item) {
            $mensagem .= "- " . ucfirst($item) . "%0A";
        }
    }
    $numero = "5599981089014";
    $urlWhatsapp = "https://wa.me/{$numero}?text={$mensagem}";
@endphp

<!-- Botão opcional -->
<a href="{{ $urlWhatsapp }}" class="btn btn-success mt-3" target="_blank">
  <i class="fab fa-whatsapp"></i> Enviar para WhatsApp
</a>

<!-- Script para abrir automaticamente -->
@if(session('whatsapp'))
<script>
  window.onload = function() {
    window.open("{{ $urlWhatsapp }}", "_blank");
  }
</script>
@endif
@extends('layout.main')

@section('title', 'Meus eventos')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1><div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nome</th>
                        <th scope="col">outras ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td scropt="row">{{ $loop->index+1 }}</td>
                        <td><a href="/eventos/{{ $event->id }}">{{ $event->title }}</a></td>
                        <td><a href="/eventos/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline">editar</ion-icon></a>
                        <form action="/eventos/{{ $event->id}}"method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline">excluír<ion-icon</button>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
        <p id="event">você ainda não tem eventos, <a href="/eventos/create">criar evento</a></p>
        @endif
    </div>
    </div>
    
@endsection
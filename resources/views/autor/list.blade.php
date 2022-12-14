@extends('layout')

@section('title', 'Llistat d\'autors')

@section('stylesheets')
@parent
@endsection

@section('content')
<h1>Llistat d'autors</h1>
@if (Auth::user())
<a href="{{ route('autor_new') }}">+ Nou Autor</a>
@endif

@if (session('status'))
<div>
    <strong>Success!</strong> {{ session('status') }}
</div>
@endif

<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Imatge</th>
            <th>QTT llibres</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($autors as $autor)
        <tr>
            <td>{{ $autor->nom }}</td>
            <td>{{ $autor->cognoms }}</td>
            <td><img src="{{ asset(env('RUTA_IMATGES', false) . $autor->imatge) }}" alt="" style="width: 100px;"></td>
            <td style="text-align: center">{{ count($autor->llibres) }}</td>
            @if (Auth::user())
            <td>
                <a href="{{ route('autor_delete', ['id' => $autor->id]) }}">Eliminar</a> / <a href="{{ route('autor_edit', ['id' => $autor->id]) }}">Editar</a>
            </td>
            @endif
            
        </tr>
        @endforeach
    </tbody>
</table>

<br>
@endsection
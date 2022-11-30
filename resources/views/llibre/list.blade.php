@extends('layout')

@section('title', 'Llistat de llibres')

@section('stylesheets')
@parent
@endsection

@section('content')
<h1>Llistat de llibres</h1>
@if (Auth::user())
<a href="{{ route('llibre_new') }}">+ Nou llibre</a>
@endif

@if (session('status'))
<div>
    <strong>Success!</strong> {{ session('status') }}
</div>
@endif

<table style="margin-top: 20px;margin-bottom: 10px;">
    <thead>
        <tr>
            <th>Títol</th>
            <th>Data de publicació</th>
            <th>Vendes</th>
            <th>Autor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($llibres as $llibre)
        <tr>
            <td>{{ $llibre->titol }}</td>
            <td>{{ date('d-m-Y', strtotime($llibre->dataP)) }}</td>
            <td>{{ $llibre->vendes }}</td>
            @if(isset($llibre->autor))
            <td>{{ $llibre->autor->nomCognoms()}} </td>
            @else
            <td> </td>
            @endif
            @if (Auth::user())
            <td>
                <a href="{{ route('llibre_delete', ['id' => $llibre->id]) }}">Eliminar /
                    <a href="{{ route('llibre_edit', ['id' => $llibre->id]) }}">Editar</a></a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

<br>
@endsection
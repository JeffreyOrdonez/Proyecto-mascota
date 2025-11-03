@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Refugios</h1>
    <ul>
        @foreach($refugios as $refugio)
        <li>
            <strong>{{ $refugio->nombre_refugio }}</strong><br>
            {{ $refugio->descripcion }}<br>
            <small>Contacto: {{ $refugio->correo_contacto }} | Tel: {{ $refugio->telefono_contacto }}</small>
        </li>
        @endforeach
    </ul>
</div>
@endsection
@extends('layout.template')

@section('title', 'Alumnos | School')

@section('contenido')
<main>
    <div class="container py-4">
        <h2>{{ $msg }}</h2>

        <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
    </div>
</main>
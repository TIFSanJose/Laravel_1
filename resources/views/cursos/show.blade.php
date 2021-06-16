@extends('layouts.plantillas')

@section('title', 'Cursos '.$curso->name)

@section('contenido')
    <h1>bienvenido al curso de {{ $curso->name }}</h1>
    <p><strong>Categoria:</strong>{{ $curso->category }}</p>
    </br>
    <p><a href={{ route('curso.index') }}>Volver</a></p>
@endsection




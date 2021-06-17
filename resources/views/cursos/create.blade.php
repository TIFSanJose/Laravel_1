@extends('layouts.plantillas')

@section('title', 'Cursos - Craar Curso')

@section('contenido')
    <h1>aqui puedes crear un curso</h1>
    <form action={{ route('curso.store') }} method='POST'>

        @csrf

        <label for="">
            Nombre:
            <br>
            <input type="text" name="nombre">
        </label>
        <br>
        <label for="">
            Categoria:
            <br> 
            <input type="text" name="categoria">
        </label>
        <br>
        <label for="">
            Descripcion:
            <br>
            <textarea name="descripcion" cols="30" rows="10"></textarea>
        </label>
        <br>
        <button type="submit">Enviar</button>
    </form>
@endsection

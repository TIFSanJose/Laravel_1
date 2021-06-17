@extends('layouts.plantillas')

@section('title', 'Cursos - Editar Curso:' . $curso->name)

@section('contenido')
    <h1>aqui puedes Editar este curso</h1>
    <form action={{ route('curso.update', compact('curso')) }} method='POST'>

        @csrf
        @method('put')

        <label for="">
            Nombre:
            <br>
            <input type="text" name="nombre" value="{{ $curso->name }}">
        </label>
        <br>
        <label for="">
            Categoria:
            <br> 
            <input type="text" name="categoria" value="{{ $curso->category }}">
        </label>
        <br>
        <label for="">
            Descripcion:
            <br>
            <textarea name="descripcion" cols="30" rows="10">{{ $curso->descripcion }}</textarea>
        </label>
        <br>
        <button type="submit">Actualizar Curso</button>
    </form>
@endsection

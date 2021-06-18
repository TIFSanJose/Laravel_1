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
            <input type="text" name="nombre" value="{{ old('nombre', $curso->name) }}">
        </label>

        <br>
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <label for="">
            Categoria:
            <br> 
            <input type="text" name="categoria" value="{{ old('categoria', $curso->category) }}">
        </label>

        <br>
        @error('categoria')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <label for="">
            Descripcion:
            <br>
            <textarea name="descripcion" cols="30" rows="10">{{ old('descripcion' ,$curso->descripcion) }}</textarea>
        </label>

        <br>
        @error('descripcion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <button type="submit">Actualizar Curso</button>
    </form>
@endsection

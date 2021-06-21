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
            <input type="text" name="name" value="{{ old('name', $curso->name) }}">
        </label>

        <br>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <label for="">
            Categoria:
            <br> 
            <input type="text" name="category" value="{{ old('category', $curso->category) }}">
        </label>

        <br>
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <label for="">
            Descripcion:
            <br>
            <textarea name="description" cols="30" rows="10">{{ old('description' ,$curso->description) }}</textarea>
        </label>

        <br>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <button type="submit">Actualizar Curso</button>
    </form>
@endsection

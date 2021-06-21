@extends('layouts.plantillas')

@section('title', 'Cursos - Craar Curso')

@section('contenido')
    <h1>aqui puedes crear un curso</h1>
    <form action={{ route('curso.store') }} method='POST'>

        @csrf

        <label for="">
            Nombre:
            <br>
            <input type="text" name="name" value="{{ old('name') }}">
        </label>

        <br>
        @error('name')
            <div class="alert alert-danger"><small>*{{ $message }}</small></div>
        @enderror

        <br>
        <label for="">
            Categoria:
            <br> 
            <input type="text" name="category" value="{{ old('category') }}">
        </label>

        <br>
        @error('category')
            <div class="alert alert-danger"><small>*{{ $message }}</small></div>
        @enderror

        <br>
        <label for="">
            Descripcion:
            <br>
            <textarea name="description" cols="30" rows="10" >{{ old('description') }}</textarea>
        </label>

        <br>
        @error('description')
            <div class="alert alert-danger"><small>*{{ $message }}</small></div>
        @enderror

        <br>
        <button type="submit">Enviar</button>
    </form>
@endsection

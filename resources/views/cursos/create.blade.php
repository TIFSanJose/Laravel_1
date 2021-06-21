@extends('layouts.plantillas')

@section('title', 'Cursos - Craar Curso')

@section('contenido')
    <h1>aqui puedes crear un curso</h1>
    <form action={{ route('curso.store') }} method='POST'>

        @csrf

        <label for="">
            Nombre:
            <br>
            <input type="text" name="nombre" value="{{ old('nombre') }}">
        </label>

        <br>
        @error('nombre')
            <div class="alert alert-danger"><small>*{{ $message }}</small></div>
        @enderror

        <br>
        <label for="">
            Categoria:
            <br> 
            <input type="text" name="categoria" value="{{ old('categoria') }}">
        </label>

        <br>
        @error('categoria')
            <div class="alert alert-danger"><small>*{{ $message }}</small></div>
        @enderror

        <br>
        <label for="">
            Descripcion:
            <br>
            <textarea name="descripcion" cols="30" rows="10" >{{ old('descripcion') }}</textarea>
        </label>

        <br>
        @error('descripcion')
            <div class="alert alert-danger"><small>*{{ $message }}</small></div>
        @enderror

        <br>
        <button type="submit">Enviar</button>
    </form>
@endsection

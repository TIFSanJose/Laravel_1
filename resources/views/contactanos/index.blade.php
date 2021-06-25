@extends('layouts.plantillas')

@section('title', 'Contactanos')

@section('contenido')
    <h1>Dejanos un Mensaje</h1>
    <br>
    <form action={{ route('contactanos.store') }} method="POST">

        @csrf

        <label >
            Nombre:
            <br>
            <input type="text" name="nombre">
        </label>
        <br>
        @error('nombre')
            <strong><small>*{{ $message }}</small></strong>
        @enderror
        <br>
        <label >
            Correo:
            <br>
            <input type="text" name="correo">
        </label>
        <br>
        @error('correo')
            <strong><small>*{{ $message }}</small></strong>
        @enderror
        <br>
        <label >
            Mensaje:
            <br>
            <textarea name="mensaje" rows="4"></textarea>
        </label>
        <br>
        @error('mensaje')
            <strong><small>*{{ $message }}</small></strong>
        @enderror
        <br>
        <button type="submit">Enviar Mensaje</button>
        <br>
    </form>
@endsection
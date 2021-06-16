@extends('layouts.plantillas')

@section('title', 'Cursos - Index')

@section('contenido')
    <h1>Bienvenido a cursos index</h1>
    <h3>
    {{-- llamo por la ruta --}}
        {{-- <a href="curso/crear"> --}}
    {{-- llamo por el nombre --}}
        <a href={{ route('curso.crear') }}>
            Crear Curso
        </a>
    </h3>
    <ul>
        @foreach($cursos as $curso)
            <li>
                <a href={{ route('curso.show', $curso->id) }}>
                    {{ $curso->name }}
                </a>
            </li>
        @endforeach
    </ul>
    
    {{ $cursos->links() }}
@endsection

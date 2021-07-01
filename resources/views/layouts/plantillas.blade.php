<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- favicon --}}
    {{-- estilos --}}
    {{--  <style>
        .active {
            color:red;
            font-weigth: bold
        }
    </style>  --}}
    {{-- <link rel="stylesheet" href={{ asset('css/app.css') }}>  --}}
    {{-- cdn talwin  --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<body>
    {{-- nav --}}
        @include('layouts.partials.head')
    {{-- body --}}
        @yield('contenido')
        
    {{-- footer --}}
        @include('layouts.partials.footer') 
    {{-- script --}}

    @php
        $color='blue';
    @endphp
    
    <div class="container">
{{-- Instnaciando un componente color default rojo. ver clase asociada --}}
        <x-alert/>

{{-- Pasando parametros al componente atributo='valor' --}}
        <x-alert color='blue'/>

{{-- Pasando parametros al componente por variable slot  --}}
        <x-alert class="mb-4" color='green'>
            Pasando parametros al componente por variable slot 
        </x-alert>

{{-- Pasando parametros al componente por variable slot con nombre  --}}
        <x-alert class="mb-4" color='yellow'>
            <x-slot name='title'>
                Pasando parametros al componente por variable slot con nombre
            </x-slot>
        </x-alert>

{{-- Pasando parametros al componente atributo='valor' desde un valor externo  --}}
        <x-alert :color='$color'/>


    </div>
</body>
</html>
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
        $margin='mb-4';
    @endphp
    
    <div class="container">
        <x-alert2/>

        <x-alert2 color='red'/>

        <x-alert2 color='blue'>
            soy el contenido de la variable slot
        </x-alert2>

        <x-alert2 class="mb-4">
            ejemplo de merge atributos 'class' pasado por variable attributes
        </x-alert2>

        <x-alert2 :class="$margin" :color="$color">
            ejemplo de merge atributos 'class' pasado por variable attributes. valores pasados desde una variable externa.
        </x-alert2>

        <x-alert2 color='green'>
            <x-slot name='alerta'>
                soy el contenido de la variable alerta
            </x-slot>
            soy el contenido de la variable slot
        </x-alert2>

        <x-alert2 color='gray'>
            <x-slot name='alerta'>
                soy el contenido de la variable alerta
            </x-slot>
            soy el contenido de la variable slot
        </x-alert2>


    </div>
</body>
</html>
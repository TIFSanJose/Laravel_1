<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- favicon --}}
    {{-- estilos --}}
    <style>
        .active {
            color:red;
            font-weigth: bold
        }
    </style>
    {{-- cdn talwin  --}}
    {{--  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">  --}}
</head>
<body>
    {{-- nav --}}
        @include('layouts.partials.head')
    {{-- body --}}
        @yield('contenido')
        
    {{-- footer --}}
        @include('layouts.partials.footer')
    {{-- script --}}
</body>
</html>
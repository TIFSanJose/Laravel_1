<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1{
            color: blue
        }
    </style>
</head>
<body>
    <h1>Gracias por Contactarnos</h1>

    <p>De: <strong>{{ $contacto['correo'] }}</strong></p>
    <br>
    <p>Nombre: <strong>{{ $contacto['nombre'] }}</strong></p>
    <br>
    <p>Mensaje: <strong>{{ $contacto['mensaje'] }}</strong></p>

</body>
</html>
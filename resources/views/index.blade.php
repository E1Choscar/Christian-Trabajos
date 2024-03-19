<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("cifrartexto") }}" method="post">
        <h2>Texto a Cifrar</h2>
        <input type="text" name="textocifrar">
        <h2>Numero de Desplazamientos</h2>
        <input type="number" name="numerodes">
        <input type="submit" value="Enviar">
        @csrf
    </form>
    @if (session("textocifrado"))
    <h2>texto cifrado: {{session("textocifrado")}}</h2>
    @endif

    <form action="{{ route("descifrartexto") }}" method="post">
    <h2>Texto a Descifrar</h2>
    <input type="text" name="textodescifrar">
    <h2>Número de Desplazamientos</h2>
    <input type="number" name="numerodes">
    <input type="submit" value="Enviar">
    @csrf
</form>

@if (session("textodescifrado"))
    <h2>Texto descifrado: {{ session("textodescifrado") }}</h2>
@endif

</body>
</html>

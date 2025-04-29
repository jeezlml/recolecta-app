<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Recolecciones</title>
    <link rel="stylesheet" href="{{ asset('css/historial.css') }}">
</head>
<body>
<nav>
    <a href="{{ url('/registro') }}">Registro</a> |
    <a href="{{ url('/programar') }}">Programar Recolección</a> |
    <a href="{{ url('/historial') }}">Historial</a>
    <hr>
</nav>
    <h1>Historial de Recolecciones</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Residuo</th>
                <th>Fecha de Recolección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recolecciones as $recoleccion)
                <tr>
                    <td>{{ $recoleccion->id }}</td>
                    <td>{{ $recoleccion->tipo }}</td>
                    <td>{{ $recoleccion->fecha }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

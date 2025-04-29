<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programar Recolección</title>
    <link rel="stylesheet" href="{{ asset('css/programar.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>
@if (session('registro_exitoso'))
<script>
    Swal.fire({
        title: '¡Registro exitoso!',
        text: '{{ session('registro_exitoso') }}',
        icon: 'success',
        confirmButtonText: '¡Vamos allá!',
        confirmButtonColor: '#2e7d32'
    });
</script>
@endif
<nav>
    <a href="{{ url('/registro') }}">Registro</a> |
    <a href="{{ url('/programar') }}">Programar Recolección</a> |
    <a href="{{ url('/historial') }}">Historial</a>
    <hr>
</nav>
    <h1>Programar Recolección</h1>
    <form method="POST" action="{{ route('programar.recoleccion') }}">
        @csrf
        <label>Tipo de Residuo:</label>
        <select name="tipo" required>
            <option value="Inorgánicos reciclables">Inorgánicos reciclables</option>
            <option value="Peligrosos">Peligrosos</option>
        </select><br><br>

        <label>Fecha de Recolección:</label>
        <input type="date" name="fecha" required><br><br>

        <button type="submit" onclick="programarRecoleccion()">Programar</button>
    </form>
</body>
<script>
        function programarRecoleccion() {
            Swal.fire({
                title: '¡Genial!',
                text: 'Ya has programado tu recolección.',
                icon: 'success',
                confirmButtonText: '¡Entendido!',
                confirmButtonColor: '#2e7d32'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('programar-form').submit();
                }
            });
        }
    </script>
</html>

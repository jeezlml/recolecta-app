<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Regístrate</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container">
    <div class="left-side">
        <h1 class="logo">
            Reco<span class="material-icons" style="font-size: 40px; vertical-align: middle;">eco</span>lecta
        </h1>
        <p class="slogan">Únete a la recolección inteligente.</p>
    </div>
    <div class="right-side">
        <h2>Crear cuenta</h2>
        <form id="registroForm" method="POST" action="{{ route('registrar.usuario') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre completo" required>
            </div>

            <div class="form-group">
                <input type="text" name="telefono" placeholder="Teléfono" required>
            </div>

            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>

            <button type="submit" class="btn-signin">Registrarse</button>
        </form>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('registroForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que envíe el formulario de inmediato

    const form = this;

    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (response.redirected) {
            // Si Laravel responde con una redirección
            Swal.fire({
                title: '¡Registro exitoso!',
                text: '¡Genial! Tu usuario ha sido registrado.',
                icon: 'success',
                confirmButtonText: '¡Vamos a programar!',
                confirmButtonColor: '#2e7d32'
            }).then(() => {
                window.location.href = response.url; // Ahora sí lo redirigimos
            });
        } else {
            Swal.fire({
                title: 'Algo falló',
                text: 'Intenta nuevamente',
                icon: 'error'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error de servidor',
            text: 'Por favor intenta más tarde',
            icon: 'error'
        });
    });
});
</script>

</html>

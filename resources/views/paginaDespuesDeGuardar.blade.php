<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>        
        <title>MUSEO DE HISTORIA NATURAL DE VALPARAISO</title>
        <style>
        body {
            background-image: url('{{ asset('images/fondo33.jpg') }}');
            background-size: cover;
            background-position: center;
            margin: 0; /* Asegura que no haya márgenes alrededor del cuerpo */
            padding: 0; /* Asegura que no haya relleno alrededor del cuerpo */
        }
    </style>
</head>
    <header class="align-items-center bg-white">
        <div class="bg-primary" data-bs-theme="white">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <img src="{{ asset('images/MHNV.png') }}" alt="Descripción de la imagen">
                    <div class="ml-auto">
                        @if (Auth::check())
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Desconectar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- IMAGEN Y BUSCAR -->

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mostrarCalendarioDiasHabiles') }}" onclick="volverPaginaAnterior()">Planifica tu visita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Login Administrativo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Barra de navegación -->
    </header>
<body>

<div class="container mt-5 mb-5 mx-auto">
    <h5>Gracias. Tu reserva ha sido recibida.</h5>
    <ul style="list-style-type: disc;">
        <li>Código de la Reserva: {{$ultimaReserva}}</li>
        <li>Fecha de la Reserva: {{$fecha}}</li>
        <li>Bloque de la Reserva: {{$horaBloque}}</li>
        <li>Actividad de la Reserva: {{$actividad}}</li>
    </ul>
</div>

<div class="container mt-5 mb-5">
    <h2>Detalles de la reserva</h2>
    <table class="table mt-5 mb-5">
        <tr>
            <td class="mx-2" style="background-color: rgba(173, 216, 230, 0.5); width: 30%;">Guía del Grupo:</td>
            <td class="p-3 mx-2" style="background-color: rgba(255, 255, 255, 0.5);">{{$guia}}</td>
        </tr>
        <tr>
            <td class="mx-2" style="background-color: rgba(173, 216, 230, 0.5);">Encargado del Grupo:</td>
            <td class="p-3 my-2" style="background-color: rgba(255, 255, 255, 0.5);">{{$encargado}}</td>
        </tr>
        <tr>
            <td class="mx-2" style="background-color: rgba(173, 216, 230, 0.5);">Institución del Grupo:</td>
            <td class="p-3 my-2" style="background-color: rgba(255, 255, 255, 0.5);">{{$institucion}}</td>
        </tr>
        <tr>
            <td class="mx-2" style="background-color: rgba(173, 216, 230, 0.5);">Cantidad de Niños/Niñas:</td>
            <td class="p-3 my-2" style="background-color: rgba(255, 255, 255, 0.5);">{{$ultimoCantidadNinosNinas}}</td>
        </tr>
        <tr>
            <td class="mx-2" style="background-color: rgba(173, 216, 230, 0.5);">Cantidad de Adultos/Adultas:</td>
            <td class="p-3 my-2" style="background-color: rgba(255, 255, 255, 0.5);">{{$ultimoCantidadAdultosAdultas}}</td>
        </tr>
    </table>
<div class="text-center">
  <a class="btn btn-primary w-25 mb-3 mt-3" href="{{ route('mostrarCalendarioDiasHabiles') }}" onclick="volverPaginaAnterior()">Volver</a>
</div>
</div>




{{--}}

    <script>
        // Deshabilitar el botón de retroceso
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
{{--}}
</body>

<footer class="bg-dark text-info pt-4 pb-4">
    
    <div class="d-flex justify-content-center">
        <div class="d-flex align-items-center ">
            <img src="{{ asset('images/Footer.png') }}" alt="Descripción de la imagen" class="img-fluid">
        <div class="column-footer text-white">
            <ul>
                <li><i class=""></i> Dirección: Condell 1546, Valparaíso, Chile.</li>
                <li><i class=""></i> Tel: +56322175380 | E-mail: mhnv@museoschile.gob.cl</li>
                <li><i class=""></i> Atención Ciudadana | Términos y condiciones de uso</li>
                <li> Servicio Nacional del Patrimonio Cultural</li>
            </ul>
        </div>
    </div>
</footer>
</html>





{{--<script>
    // Muestra un popup al cargar la página
    window.onload = function() {
        alert('Formulario enviado con éxito. ¡Muchas gracias!');
        var redireccionar = confirm('¿Desea ser redirigido a otra vista?');
        if (redireccionar) {
            window.location.href = 'mostrarCalendarioDiasHabiles'; // Reemplaza '/nueva-vista' con la ruta de tu nueva vista
        }
        //redirect()->route('mostrarCalendarioDiasHabiles')
    }
</script>
--}}
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
            background-image: url('{{ asset('images/fondo.jpg') }}');
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
<div class="container mt-5 text-center" style="background-color: rgba(0, 0, 0, 0.5); padding: 20px;">
    <h3 style="color: white;">Actividades disponibles {{$fechaFormateada}}</h3>
    <h6 style="color: white;">(Debido a la falta de personal y a las limitaciones del museo, solo se puede realizar una actividad al día por reserva)</h6>
</div>

<div class="container mb-5">
    <div class="row">
        @foreach ($fecha_cod as $index => $cod_actividad)
            <div class="col-md-6">
                @php
                    $actividadActual = $actividades->where('cod_actividad', $cod_actividad)->first();
                    $puedeMostrar = !in_array($actividadActual->cod_actividad, $actividadesAsociadas);
                @endphp
                @if ($puedeMostrar)
                <div class="card mt-3 mb-5" style="background-color: rgba(0, 0, 0, 0.5);">
                    @if (isset($descripcion[$index]))
                            <div class="card-body">
                                <div class="mx-auto text-justify mb-3" >
                                    <h4 style="color: white; text-decoration: underline;">{{ $titulo[$index] }}</h4>
                                </div>
                                <div class="mb-3 d-flex justify-content-between align-items-center" >
                                    <p style="color: white;">Descripción de la actividad: {{ $descripcion[$index] }}</p>
                                </div>
                                <div class="mx-auto text-center">
                                    <p style="color: white;">Horarios Disponibles</p>
                                </div>
                                <div class="mb-3 pb-3 d-flex justify-content-between align-items-center">
                                    <a href="{{ route('reserva', ['cod_bloque' => 1,'cod_actividad' => $fecha_cod[$index], 'fecha' => $fecha]) }}" class="btn btn-primary align-items-center @if ($horaBloqueRojo == 1 && $cod_actividad_rojo == $fecha_cod[$index] && $ultimaFecha == $fecha) btn-danger" style="pointer-events: none; @endif">09:00-10:00</a>
                                    <a href="{{ route('reserva', ['cod_bloque' => 2,'cod_actividad' => $fecha_cod[$index], 'fecha' => $fecha]) }}" class="btn btn-primary align-items-center @if ($horaBloqueRojo == 2 && $cod_actividad_rojo == $fecha_cod[$index] && $ultimaFecha == $fecha) btn-danger" style="pointer-events: none; @endif">10:30-11:30</a>
                                    <a href="{{ route('reserva', ['cod_bloque' => 3,'cod_actividad' => $fecha_cod[$index], 'fecha' => $fecha]) }}" class="btn btn-primary align-items-center @if ($horaBloqueRojo == 3 && $cod_actividad_rojo == $fecha_cod[$index] && $ultimaFecha == $fecha) btn-danger" style="pointer-events: none; @endif">13:30-14:30</a>
                                    <a href="{{ route('reserva', ['cod_bloque' => 4,'cod_actividad' => $fecha_cod[$index], 'fecha' => $fecha]) }}" class="btn btn-primary align-items-center @if ($horaBloqueRojo == 4 && $cod_actividad_rojo == $fecha_cod[$index] && $ultimaFecha == $fecha) btn-danger" style="pointer-events: none; @endif">15:00-16:00</a>
                                </div>
                            </div>
                    @endif
                </div>
                @endif
            </div>
        @endforeach
    </div>
</div>






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


<script>
    function volverPaginaAnterior() {
      // Volver a la página anterior
      history.back();
    }
  </script>
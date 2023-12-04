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
</head>
        <div class="bg-primary" data-bs-theme="white">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <img src="{{ asset('images/MHNV.png') }}" alt="Descripción de la imagen">
                    <div class="ml-auto">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                        </form>
                    </div>
                </div>
            </nav>
        </div>
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
                        <a class="nav-link" href="">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Barra de navegación -->
    </header>
<body>
    <div class="container mt-5 mx-auto text-center">
    <h1>Actividades disponibles del día {{$fecha}}</h1>
    </div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    @foreach ($fecha_cod as $index => $cod_actividad)
                        @if (isset($descripcion[$index]))
                            @php
                            $actividadActual = $actividadesFiltradas->where('cod_actividad', $cod_actividad)->first();
                            @endphp
                            @if($actividadActual)
                                <div class="mx auto text-center">
                                    <h4>Actividad: {{ $fecha_cod[$index] }}</h4>
                                </div>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <p>Descripción: {{ $descripcion[$index] }}</p>
                                </div>
                                <div class="mx auto text-center">
                                    <p>Horarios Disponibles</p>
                                </div>
                                <div class="mb-3 pb-3 d-flex justify-content-between align-items-center">
                                    <a href="{{ route('reserva', ['cod_bloque' => 1,'cod_actividad' => $fecha_cod[$index], 'fecha' => $fecha]) }}" class="btn btn-primary align-items-center">{{$bloques->get($index)->hora_bloque}}</a>
                                    <a href="{{ route('reserva', ['cod_bloque' => 2,'cod_actividad' => $fecha_cod[$index], 'fecha' => $fecha]) }}" class="btn btn-primary align-items-center">10:30-11:30</a>
                                    <a href="{{ route('reserva', ['cod_bloque' => 3,'cod_actividad' => $fecha_cod[$index], 'fecha' => $fecha]) }}" class="btn btn-primary align-items-center">13:30-14:30</a>
                                    <a href="{{ route('reserva', ['cod_bloque' => 4,'cod_actividad' => $fecha_cod[$index], 'fecha' => $fecha]) }}" class="btn btn-primary align-items-center">15:00-16:00</a>
                                </div>

                                <div class="mb-3" style="border-bottom: 5px solid #000000">
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
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
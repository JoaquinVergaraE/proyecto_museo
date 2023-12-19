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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
        <title>MUSEO DE HISTORIA NATURAL DE VALPARAISO</title>

            <style>
        .calendario-dias {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }
        .dia-habil {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        .cuadrado-numero {
            width: 30px;
            height: 30px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
        }
        footer{
            border-top: 1px solid transparent;
        }
        .dflex{
            margin: 0;
        }
    </style>
    </head>

    <!-- IMAGEN Y BUSCAR -->
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
                        <a class="nav-link" href="{{ route('mostrarCalendarioDiasHabiles')}}">Planifica tu visita</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Barra de navegación -->
    </header>

    <div class="container mt-5 mx-auto text-center">
        <h5>Seleccione la tabla a administrar</h5>
    </div>
<div class="container mb-5">
        <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-light">
                        <a class="nav-link" href="{{ route('instituciones')}}">Instituciones</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-light">
                        <a class="nav-link" href="{{ route('encargados')}}">Encargados</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-light">
                        <a class="nav-link" href="{{ route('fechasActividad')}}">Fechas_actividad</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-light">
                        <a class="nav-link" href="{{ route('actividades')}}">Actividades</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-light">
                        <a class="nav-link" href="{{ route('bloques')}}">Bloques</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-light">
                        <a class="nav-link" href="{{ route('guias')}}">Guias</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body bg-light">
                        <a class="nav-link" href="{{ route('grupos')}}">Grupos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body bg-light">
                        <a class="nav-link" href="{{ route('reservas')}}">Reservas</a>
                        </div>
            </div>
        </div>
    </body>

    
<footer class="bg-dark text-info pt-4 pb-4">
    <div class="d-flex justify-content-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/Footer.png') }}" alt="Descripción de la imagen" class="img-fluid">
        </div>
        <div class="column-footer text-white">
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> Dirección: Condell 1546, Valparaíso, Chile.</li>
                <li><i class="fas fa-phone"></i> Tel: +56322175380 | E-mail: mhnv@museoschile.gob.cl</li>
                <li><i class="fas fa-info-circle"></i> Atención Ciudadana | Términos y condiciones de uso</li>
                <li> Servicio Nacional del Patrimonio Cultural</li>
            </ul>
        </div>
    </div>
</footer>


</html>

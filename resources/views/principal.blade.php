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

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="recargarPagina()">Planifica tu visita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login')}}">Login administrativo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Barra de navegación -->
    </header>

    <body>
    @if(session('success'))
        <div class="container mt-5 mx-auto text-center">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- POPUP -->
    <script>
        $(document).ready(function () {
            $('#bienvenidaModal').modal('show');
        });
    </script>
    <!-- POPUP -->
 <div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <h5> El Museo de Historia Natural de Valparaíso invita al público a visitar sus dependencias, exposiciones y biblioteca, de lunes a viernes. Destacando el desarrollo de recorridos guiados para delegaciones de cualquier tipo (previa reserva) y recorridos libres y gratuitos para público general.
        </h5>
        <div class="mt-3 mb-3" style="border-bottom: 3px solid #000000">
        </div>
        <img src="{{ asset('images/planifica.jpg') }}" alt="Descripción de la imagen" class="img-fluid">
    </div>
</div>
            
</div>
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <h2>HORARIO PÚBLICO GENERAL</h2>
            <h6 class="mt-3" style= "color: gray;">**En cuatro bloques de horario: 09:00 a 10:00, 10:30 a 11:30, 13:30 a 14:30 y 15:00 a 16:00** </h6>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center text-center mb-3">
            <h2>PLANIFICA TU VISITA GRUPAL GUIADA</h2>
        </div>
    </div>
    
<div class="container">
    <div class="row justify-content-center text-center">
        <h6>Disponibilidad diciembre de 2023</h6>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @php
                        $contadorDias = 4;
                    @endphp
                    @for ($i = 0; $i < 4; $i++)
                        <td></td>
                    @endfor
                    @foreach ($diasHabiles as $dia)
                        @if ($contadorDias % 5 == 0)
                            </tr><tr>
                        @endif
                        <td>
                            @if (!$dia['ocultar'])
                                <a href="{{ route('accion-dia', ['fecha' => $dia['fecha']]) }}" class="nav-link mt-2 mb-2 text-center" style="border: 1px solid #4CAF50; border-radius: 10px; padding: 10px; display: block; color: white; background-color: #4CAF50;">{{ $dia['numeroDia'] }}</a>
                            @else
                                <div class="alert alert-danger mt-2 mb-2 text-center" style="border: 1px solid #d32f2f; border-radius: 10px; padding: 10px; display: block; background-color: #d32f2f; color: white;">{{ $dia['numeroDia'] }}
                                </div>                            
                            @endif
                        </td>
                        @php
                            $contadorDias++;
                        @endphp
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>






<div class="container mx-auto text-center mt-2 mb-5">
        <h6>**Reserva válida solo para grupos de 10 o más personas**</h6>
    
</div>

    <script src="{{ asset('js/app.js') }}" defer></script>


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

<!-- Modal de Bienvenida -->
<div class="modal fade" id="bienvenidaModal" tabindex="-1" aria-labelledby="bienvenidaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bienvenidaModalLabel">¡Bienvenido!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¡Hola! Gracias por visitar la seccion "Planifica tu visita". ¡Recuerda que los recorridos son libres y gratuitos para publico general!. Si deseas reservar una visita guiada para un grupo de personas, por favor, sigue las instrucciones.</p>
        <!-- Puedes personalizar el contenido del modal según tus necesidades -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>

<script>
    function recargarPagina() {
      // Recargar la página
      location.reload();
    }
</script>



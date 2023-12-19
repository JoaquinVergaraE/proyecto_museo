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
<div class="container mt-5 mb-5 mx-auto text-center" style="margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
    <h2>Formulario de registro para grupos</h2>
    <h6 class="" style="color: #FF6666;">*obligatorio</h6>
</div>

    <div class="container mt-5 mb-5 mx-auto text-left" style="margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <form id="formulario" action="{{ url('/formulario/enviar/' . $cod_bloque . '/' . $cod_actividad . '/' . $fecha) }}" method="post">
                @csrf
                <input type="hidden" name="cod_bloque" value="{{ $cod_bloque }}">
                <input type="hidden" name="cod_actividad" value="{{ $cod_actividad }}">
                <input type="hidden" name="fecha" value="{{ $fecha }}">
                <div class="form-group">
                    <label for="rut_encargado">Rut del encargado del grupo: (SIN PUNTOS Y CON GUION)
                        @if ($errors->has('rut_encargado'))
                            <span class="text-danger">{{ $errors->first('rut_encargado') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" id="rut_encargado" name="rut_encargado" value="{{ old('rut_encargado') }}" required string>
                </div>

                <div class="form-group">
                    <label for="nom_encargado">Nombre del encargado del grupo:
                    @if ($errors->has('nom_encargado'))
                            <span class="text-danger">{{ $errors->first('nom_encargado') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                        </label>
                    <input type="text" class="form-control" id="nom_encargado" name="nom_encargado" value="{{ old('nom_encargado') }}" required alpha string>
                </div>
                <div class="form-group">
                    <label for="telefono_encargado">Teléfono del encargado del grupo: (ejemplo: 912345678)
                    @if ($errors->has('telefono_encargado'))
                        <span class="text-danger">{{ $errors->first('telefono_encargado') }}</span>
                    @endif
                    </label>
                    <input type="text" class="form-control" id="telefono_encargado" name="telefono_encargado" value="{{ old('telefono_encargado') }}" required|numeric>        
                </div>
                <div class="form-group">
                    <label for="correo_encargado">Correo del encargado del grupo: (ejemplo: correo@ejemplo.com)
                    @if ($errors->has('correo_encargado'))
                            <span class="text-danger">{{ $errors->first('correo_encargado') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                        </label>
                    <input type="text" class="form-control" id="correo_encargado" name="correo_encargado" value="{{ old('correo_encargado') }}" required email>
                    
                </div>
                <div class="form-group">
                    <label for="nom_institucion">Nombre de la institución del grupo:
                    @if ($errors->has('nom_institucion'))
                            <span class="text-danger">{{ $errors->first('nom_institucion') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                        </label>
                    <input type="text" class="form-control" id="nom_institucion" name="nom_institucion" value="{{ old('nom_institucion') }}" required alpha string>
                    
                </div>
                <div class="form-group">
                    <label for="direccion_institucion">Dirección de la institución del grupo:
                    @if ($errors->has('direccion_institucion'))
                            <span class="text-danger">{{ $errors->first('direccion_institucion') }}</span>
                    @endif
                    <span style="color: red;">*</span>
                    </label>
                    <input type="text" class="form-control" id="direccion_institucion" name="direccion_institucion" value="{{ old('direccion_institucion') }}" required string>
                     
                </div>
                <div class="form-group">
                    <label for="comuna_institucion">Comuna de la institución del grupo:
                    @if ($errors->has('comuna_institucion'))
                            <span class="text-danger">{{ $errors->first('comuna_institucion') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                        </label>
                    <input type="text" class="form-control" id="comuna_institucion" name="comuna_institucion" value="{{ old('comuna_institucion') }}" required alpha string>
                    
                </div>
                <div class="form-group">
                    <label for="region_institucion">Región de la institución del grupo:
                     @if ($errors->has('region_institucion'))
                            <span class="text-danger">{{ $errors->first('region_institucion') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                        </label>
                    <input type="text" class="form-control" id="region_institucion" name="region_institucion" value="{{ old('region_institucion') }}" required alpha string>
                   
                </div>
                <div class="form-group">
                    <label for="telefono_institucion">Teléfono de la institución: (ejemplo: 332123456)
                    @if ($errors->has('telefono_institucion'))
                            <span class="text-danger">{{ $errors->first('telefono_institucion') }}</span>
                        @endif</label>
                    <input type="text" class="form-control" id="telefono_institucion" name="telefono_institucion"  value="{{ old('telefono_institucion') }}" numeric>
                    
                </div>
                <div class="form-group">
                    <label for="correo_institucion">Correo de la institución: (ejemplo: correo@ejemplo.com)
                    @if ($errors->has('correo_institucion'))
                            <span class="text-danger">{{ $errors->first('correo_institucion') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                        </label> 
                    <input type="text" class="form-control" id="correo_institucion" name="correo_institucion" value="{{ old('correo_institucion') }}" email>
                    
                </div>
                <div class="form-group">
                    <label for="cantidad_niños">Cantidad de niños y niñas del grupo:
                    @if ($errors->has('cantidad_ninos_ninas'))
                            <span class="text-danger">{{ $errors->first('cantidad_ninos_ninas') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                        </label>
                    <input type="text" class="form-control" id="cantidad_ninos_ninas" name="cantidad_ninos_ninas" value="{{ old('cantidad_ninos_ninas') }}"  required integer>
                     
                </div>
                <div class="form-group">
                    <label for="cantidad_adultos">Cantidad de adultos y adultas del grupo:
                    @if ($errors->has('cantidad_adultos_adultas'))
                            <span class="text-danger">{{ $errors->first('cantidad_adultos_adultas') }}</span>
                        @endif
                        <span style="color: red;">*</span>
                        </label>
                    <input type="text" class="form-control" id="cantidad_adultos_adultas" name="cantidad_adultos_adultas" value="{{ old('cantidad_adultos_adultas') }}"required integer>
                    
                </div>
                <button type="submit" class="btn btn-primary w-100 d-block mb-3 mt-3">Enviar</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
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

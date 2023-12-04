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
    <body>
<div class="container mt-5 mx-auto text-center">
    <h5>Grupos</h5>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>cod_grupo</th>
                        <th>cod_institucion</th>
                        <th>rut_encargado</th>
                        <th>cantidad_niños</th>
                        <th>cantidad_niñas</th>
                        <th>cantidad_adultos</th>
                        <th>cantidad_adultas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->cod_grupo }}</td>
                        <td>{{ $grupo->cod_institucion }}</td>
                        <td>{{ $grupo->rut_encargado }}</td>
                        <td>{{ $grupo->cantidad_niños }}</td>
                        <td>{{ $grupo->cantidad_niñas }}</td>
                        <td>{{ $grupo->cantidad_adultos }}</td>
                        <td>{{ $grupo->cantidad_adultas }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
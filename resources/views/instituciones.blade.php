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
    <h5>Instituciones</h5>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>cod_institucion</th>
                        <th>nom_institucion</th>
                        <th>direccion</th>
                        <th>comuna</th>
                        <th>region</th>
                        <th>telefono</th>
                        <th>correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instituciones as $institucion)
                    <tr>
                        <td>{{ $institucion->cod_institucion }}</td>
                        <td>{{ $institucion->nom_institucion }}</td>
                        <td>{{ $institucion->direccion }}</td>
                        <td>{{ $institucion->comuna }}</td>
                        <td>{{ $institucion->region }}</td>
                        <td>{{ $institucion->telefono }}</td>
                        <td>{{ $institucion->correo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
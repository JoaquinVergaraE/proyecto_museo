<!-- En tu vista 'paginaDespuesDeGuardar' -->
<!DOCTYPE html>
<html>
<head>
    <title>Página Después de Guardar</title>
</head>
<body>

<!-- Contenido de tu página -->

<!-- En tu vista o plantilla -->
<script>
    // Deshabilitar el botón de retroceso
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
</script>

<script>
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

</body>
</html>

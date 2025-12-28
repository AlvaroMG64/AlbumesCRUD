<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Álbum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validarFormulario() {
            const canciones = document.getElementById("num_canciones").value;
            if (canciones <= 0) {
                alert("El número de canciones debe ser mayor que 0");
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2>➕ Crear Álbum</h2>

    <form method="POST" action="index.php?action=create" onsubmit="return validarFormulario();">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Artista</label>
            <input type="text" name="artista" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Género</label>
            <input type="text" name="genero" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha lanzamiento</label>
            <input type="date" name="fecha_lanzamiento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número de canciones</label>
            <input type="number" id="num_canciones" name="num_canciones" class="form-control" min="1" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="es_explicit" class="form-check-input">
            <label class="form-check-label">Contenido explícito</label>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="index.php?action=index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
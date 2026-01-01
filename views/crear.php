<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Álbum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">

            <h3 class="card-title mb-4">Nuevo Álbum</h3>

            <form method="POST" class="needs-validation" novalidate>

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
                    <input type="text" name="genero" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de lanzamiento</label>
                    <input type="date" name="fecha_lanzamiento" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Número de canciones</label>
                    <input type="number" name="num_canciones" class="form-control" min="1" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="es_explicit" value="1" class="form-check-input" id="explicit">
                    <label class="form-check-label" for="explicit">Contenido explícito</label>
                </div>

                <button class="btn btn-primary">Guardar</button>
                <a href="index.php?action=index" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>
</div>

<script>
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})();
</script>
</body>
</html>
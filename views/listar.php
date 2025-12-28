<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Álbumes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2>🎵 Álbumes</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?= ($_GET['message'] == 'created') ? 'Álbum creado correctamente.' :
                (($_GET['message'] == 'updated') ? 'Álbum actualizado correctamente.' :
                'Álbum eliminado correctamente.'); ?>
        </div>
    <?php endif; ?>

    <a href="index.php?action=create" class="btn btn-primary mb-3">➕ Nuevo Álbum</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Título</th><th>Artista</th><th>Género</th>
                    <th>Fecha</th><th>Canciones</th><th>Explicit</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($albumes as $album): ?>
                <tr>
                    <td><?= $album['idAlbum']; ?></td>
                    <td><?= htmlspecialchars($album['titulo']); ?></td>
                    <td><?= htmlspecialchars($album['artista']); ?></td>
                    <td><?= htmlspecialchars($album['genero']); ?></td>
                    <td><?= date("d/m/Y", strtotime($album['fecha_lanzamiento'])); ?></td>
                    <td><?= $album['num_canciones']; ?></td>
                    <td class="text-center">
                        <input type="checkbox" disabled <?= $album['es_explicit'] ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <a href="index.php?action=edit&id=<?= $album['idAlbum']; ?>" class="btn btn-warning btn-sm">✏️</a>
                        <a href="index.php?action=delete&id=<?= $album['idAlbum']; ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Eliminar álbum?');">🗑️</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
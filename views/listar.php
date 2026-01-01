<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Álbumes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Listado de Álbumes</h2>

<a href="index.php?action=create" class="btn btn-primary mb-3">Nuevo Álbum</a>

<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>Título</th>
            <th>Artista</th>
            <th>Género</th>
            <th>Fecha</th>
            <th>Canciones</th>
            <th>Explícito</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($albumes as $album): ?>
        <tr>
            <td><?= htmlspecialchars($album['titulo']) ?></td>
            <td><?= htmlspecialchars($album['artista']) ?></td>
            <td><?= htmlspecialchars($album['genero']) ?></td>
            <td><?= date("d/m/Y", strtotime($album['fecha_lanzamiento'])) ?></td>
            <td><?= $album['num_canciones'] ?></td>
            <td><?= $album['es_explicit'] ? 'Sí' : 'No' ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="index.php?action=edit&id=<?= $album['idAlbum'] ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="index.php?action=delete&id=<?= $album['idAlbum'] ?>" onclick="return confirm('¿Eliminar álbum?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
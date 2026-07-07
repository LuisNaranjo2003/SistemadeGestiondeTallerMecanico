<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mecánicos</title>
</head>

<body>

    <h1>Listado de Mecánicos</h1>

    <p><a href="index.php?url=mecanicos/crearForm">Crear Mecánico</a></p>

    <table border="1" cellpadding="6">

        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Especialidad</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($mecanicos as $m): ?>
            <tr>
                <td><?= $m["id_mecanico"] ?></td>
                <td><?= $m["nombres"] ?></td>
                <td><?= $m["apellidos"] ?></td>
                <td><?= $m["especialidad"] ?></td>
                <td><?= $m["telefono"] ?></td>
                <td><?= $m["correo"] ?></td>
                <td>
                    <a href="index.php?url=mecanicos/editarForm&id=<?= $m["id_mecanico"] ?>">Editar</a>
                    <a href="index.php?url=mecanicos/eliminar&id=<?= $m["id_mecanico"] ?>"
                       onclick="return confirm('¿Eliminar mecánico?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>
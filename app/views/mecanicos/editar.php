<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mecánico</title>
</head>

<body>
    <h1>Editar Mecánico</h1>

    <?php if (!$mecanico): ?>
        <p>
            No existe el mecánico
        </p>

        <p>
            <a href="index.php?url=mecanicos/listar">Volver</a>
        </p>
    <?php else: ?>
        
        <form method="POST" action="index.php?url=mecanicos/actualizar">

            <input type="hidden" name="id_mecanico" value="<?= $mecanico["id_mecanico"] ?>">

            <label>Nombres:</label><br>
            <input type="text" name="nombres" value="<?= $mecanico["nombres"] ?>" required><br><br>

            <label>Apellidos:</label><br>
            <input type="text" name="apellidos" value="<?= $mecanico["apellidos"] ?>" required><br><br>

            <label>Especialidad:</label><br>
            <input type="text" name="especialidad" value="<?= $mecanico["especialidad"] ?>" required><br><br>

            <label>Teléfono:</label><br>
            <input type="text" name="telefono" value="<?= $mecanico["telefono"] ?>" required><br><br>

            <label>Correo electrónico:</label><br>
            <input type="email" name="correo" value="<?= $mecanico["correo"] ?>" required><br><br>

            <button type="submit">Actualizar</button>

        </form>

        <p><a href="index.php?url=mecanicos/listar">Volver</a></p>

    <?php endif; ?>
</body>

</html>
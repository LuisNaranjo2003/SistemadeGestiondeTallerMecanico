<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mecánico</title>
</head>

<body>
    <h1>Crear Mecánico</h1>

    <form method="POST" action="index.php?url=mecanicos/crear">

        <label>Nombres:</label><br>
        <input name="nombres" required><br><br>

        <label>Apellidos:</label><br>
        <input name="apellidos" required><br><br>

        <label>Especialidad:</label><br>
        <input name="especialidad" required><br><br>

        <label>Teléfono Celular:</label><br>
        <input name="telefono" required><br><br>

        <label>Correo electrónico:</label><br>
        <input name="correo" required><br><br>

        <button type="submit">Guardar Mecánico</button>

        <p><a href="index.php?url=mecanicos/listar">Volver</a></p>

    </form>

</body>

</html>

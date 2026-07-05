<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Vehículo</title>
</head>

<body>

    <h1>Crear Vehículo</h1>

    <form method="POST" action="index.php?url=vehiculos/crear">

        <label>Placa:</label><br>
        <input type="text" name="placa" required><br><br>

        <label>Marca:</label><br>
        <input type="text" name="marca" required><br><br>

        <label>Modelo:</label><br>
        <input type="text" name="modelo" required><br><br>

        <label>Año:</label><br>
        <input type="number" name="anio" min="1980" max="<?= date('Y'); ?>" required><br><br>

        <label>Color:</label><br>
        <input type="text" name="color" required><br><br>

        <label>Cliente:</label><br>

        <select name="cliente_id" required>

            <option value="">Seleccione un cliente</option>

            <?php foreach ($clientes as $cliente): ?>

                <option value="<?= htmlspecialchars($cliente['id_cliente']) ?>">
                    <?= htmlspecialchars($cliente['cliente']) ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <button type="submit">Guardar</button>

        <p>
            <a href="index.php?url=vehiculos/listar">
                Volver
            </a>
        </p>

    </form>

</body>

</html>
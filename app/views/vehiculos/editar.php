<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo</title>
</head>

<body>

    <h1>Editar Vehículo</h1>

    <?php if (!$vehiculo): ?>

        <p>No existe el vehículo.</p>

        <p>
            <a href="index.php?url=vehiculos/listar">Volver</a>
        </p>

    <?php else: ?>

        <form method="POST" action="index.php?url=vehiculos/actualizar">

            <input type="hidden"
                   name="id_vehiculo"
                   value="<?= htmlspecialchars($vehiculo["id_vehiculo"]) ?>">

            <label>Placa:</label><br>
            <input type="text"
                   name="placa"
                   value="<?= htmlspecialchars($vehiculo["placa"]) ?>"
                   required><br><br>

            <label>Marca:</label><br>
            <input type="text"
                   name="marca"
                   value="<?= htmlspecialchars($vehiculo["marca"]) ?>"
                   required><br><br>

            <label>Modelo:</label><br>
            <input type="text"
                   name="modelo"
                   value="<?= htmlspecialchars($vehiculo["modelo"]) ?>"
                   required><br><br>

            <label>Año:</label><br>
            <input type="number"
                   name="anio"
                   value="<?= htmlspecialchars($vehiculo["anio"]) ?>"
                   required><br><br>

            <label>Color:</label><br>
            <input type="text"
                   name="color"
                   value="<?= htmlspecialchars($vehiculo["color"]) ?>"
                   required><br><br>

            <label>Cliente:</label><br>

            <select name="cliente_id" required>

                <?php foreach ($clientes as $cliente): ?>

                    <option
                        value="<?= htmlspecialchars($cliente["id_cliente"]) ?>"
                        <?= ($cliente["id_cliente"] == $vehiculo["cliente_id"]) ? "selected" : "" ?>>

                        <?= htmlspecialchars($cliente["cliente"]) ?>

                    </option>

                <?php endforeach; ?>

            </select>

            <br><br>

            <button type="submit">Actualizar</button>

        </form>

        <p>
            <a href="index.php?url=vehiculos/listar">Volver</a>
        </p>

    <?php endif; ?>

</body>

</html>
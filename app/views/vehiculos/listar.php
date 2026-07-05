<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos</title>
</head>

<body>

    <h1>Listado de Vehículos</h1>

    <p>
        <a href="index.php?url=vehiculos/crearForm">
            Registrar Vehículo
        </a>
    </p>

    <table border="1" cellpadding="6">

        <tr>
            <th>ID</th>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Color</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($vehiculos as $v): ?>

            <tr>

                <td><?= htmlspecialchars($v["id_vehiculo"]) ?></td>

                <td><?= htmlspecialchars($v["placa"]) ?></td>

                <td><?= htmlspecialchars($v["marca"]) ?></td>

                <td><?= htmlspecialchars($v["modelo"]) ?></td>

                <td><?= htmlspecialchars($v["anio"]) ?></td>

                <td><?= htmlspecialchars($v["color"]) ?></td>

                <td><?= htmlspecialchars($v["cliente"]) ?></td>

                <td>

                    <a href="index.php?url=vehiculos/editarForm&id=<?= $v["id_vehiculo"] ?>">
                        Editar
                    </a>

                    |

                    <a href="index.php?url=vehiculos/eliminar&id=<?= $v["id_vehiculo"] ?>"
                       onclick="return confirm('¿Eliminar vehículo?')">
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</body>

</html>
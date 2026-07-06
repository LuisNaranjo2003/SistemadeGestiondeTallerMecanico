<?php
$vehiculos = $vehiculos ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Vehículos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">
                <i class="bi bi-car-front-fill"></i>
                Gestión de Vehículos
            </h3>

            <a href="index.php?url=vehiculos/crearForm" class="btn btn-light">
                <i class="bi bi-plus-circle"></i>
                Registrar Vehículo
            </a>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Color</th>
                        <th>Cliente</th>
                        <th width="180">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                <?php if(count($vehiculos)>0): ?>

                    <?php foreach($vehiculos as $v): ?>

                        <tr>

                            <td><?= htmlspecialchars($v["id_vehiculo"]) ?></td>

                            <td><?= htmlspecialchars($v["placa"]) ?></td>

                            <td><?= htmlspecialchars($v["marca"]) ?></td>

                            <td><?= htmlspecialchars($v["modelo"]) ?></td>

                            <td><?= htmlspecialchars($v["anio"]) ?></td>

                            <td><?= htmlspecialchars($v["color"]) ?></td>

                            <td><?= htmlspecialchars($v["cliente"]) ?></td>

                            <td>

                                <a href="index.php?url=vehiculos/editarForm&id=<?= $v["id_vehiculo"] ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <a href="index.php?url=vehiculos/eliminar&id=<?= $v["id_vehiculo"] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Desea eliminar este vehículo?')">

                                    <i class="bi bi-trash"></i>

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="8" class="text-center text-danger">

                            <i class="bi bi-exclamation-circle"></i>

                            No existen vehículos registrados.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
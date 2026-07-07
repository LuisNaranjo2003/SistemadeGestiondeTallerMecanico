<?php
$servicios = $servicios ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Servicios</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">
                <i class="bi bi-tools"></i>
                Gestión de Servicios
            </h3>

            <div>

                <a href="index.php"
                   class="btn btn-secondary me-2">

                    <i class="bi bi-arrow-left"></i>
                    Menú

                </a>

                <a href="index.php?url=servicios/crearForm"
                   class="btn btn-light">

                    <i class="bi bi-plus-circle"></i>
                    Nuevo Servicio

                </a>

            </div>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Servicio</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th width="170">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                <?php if(count($servicios) > 0): ?>

                    <?php foreach($servicios as $servicio): ?>

                        <tr>

                            <td><?= htmlspecialchars($servicio["id_servicio"]) ?></td>

                            <td><?= htmlspecialchars($servicio["nombre_servicio"]) ?></td>

                            <td><?= htmlspecialchars($servicio["descripcion"]) ?></td>

                            <td>
                                <strong>
                                    $<?= number_format($servicio["precio"],2) ?>
                                </strong>
                            </td>

                            <td>

                                <a href="index.php?url=servicios/editarForm&id=<?= $servicio["id_servicio"] ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <a href="index.php?url=servicios/eliminar&id=<?= $servicio["id_servicio"] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Desea eliminar este servicio?')">

                                    <i class="bi bi-trash"></i>

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="5" class="text-center text-danger">

                            <i class="bi bi-exclamation-circle"></i>

                            No existen servicios registrados.

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
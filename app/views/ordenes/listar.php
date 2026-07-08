<?php
$ordenes = $ordenes ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Órdenes de Trabajo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">

                <i class="bi bi-clipboard-check-fill"></i>
                Gestión de Órdenes de Trabajo

            </h3>

            <div>

                <a href="index.php"
                   class="btn btn-secondary me-2">

                    <i class="bi bi-house-door-fill"></i>
                    Volver al Menú

                </a>

                <a href="index.php?url=ordenes/crearForm"
                   class="btn btn-light">

                    <i class="bi bi-plus-circle"></i>
                    Nueva Orden

                </a>

            </div>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Vehículo</th>
                        <th>Mecánico</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th width="170">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                <?php if (!empty($ordenes)): ?>

                    <?php foreach ($ordenes as $orden): ?>

                        <tr>

                            <td>

                                <strong>#<?= htmlspecialchars($orden["id_orden"]) ?></strong>

                            </td>

                            <td>

                                <strong><?= htmlspecialchars($orden["marca"]) ?></strong><br>

                                <?= htmlspecialchars($orden["modelo"]) ?><br>

                                <span class="text-muted">

                                    <i class="bi bi-credit-card-2-front"></i>

                                    <?= htmlspecialchars($orden["placa"]) ?>

                                </span>

                            </td>

                            <td>

                                <i class="bi bi-person-fill text-primary"></i>

                                <?= htmlspecialchars($orden["nombre_mecanico"]) ?>

                            </td>

                            <td>

                                <?= htmlspecialchars($orden["fecha"]) ?>

                            </td>

                            <td>

                                <?php if ($orden["estado"] == "pendiente"): ?>

                                    <span class="badge bg-warning text-dark">
                                        Pendiente
                                    </span>

                                <?php elseif ($orden["estado"] == "en proceso"): ?>

                                    <span class="badge bg-primary">
                                        En Proceso
                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-success">
                                        Finalizado
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a href="index.php?url=ordenes/editarForm&id=<?= $orden["id_orden"] ?>"
                                   class="btn btn-warning btn-sm"
                                   title="Editar">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <a href="index.php?url=ordenes/eliminar&id=<?= $orden["id_orden"] ?>"
                                   class="btn btn-danger btn-sm"
                                   title="Eliminar"
                                   onclick="return confirm('¿Desea eliminar esta orden de trabajo?');">

                                    <i class="bi bi-trash"></i>

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="6" class="text-center">

                            <div class="alert alert-warning mb-0">

                                <i class="bi bi-exclamation-circle-fill"></i>

                                No existen órdenes de trabajo registradas.

                            </div>

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
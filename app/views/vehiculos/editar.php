<?php
$vehiculo = $vehiculo ?? null;
$clientes = $clientes ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-warning">

                    <h3 class="mb-0">
                        <i class="bi bi-pencil-square"></i>
                        Editar Vehículo
                    </h3>

                </div>

                <div class="card-body">

                    <?php if (!$vehiculo): ?>

                        <div class="alert alert-danger">

                            El vehículo no existe.

                        </div>

                        <a href="index.php?url=vehiculos/listar"
                           class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>
                            Volver

                        </a>

                    <?php else: ?>

                    <form method="POST"
                          action="index.php?url=vehiculos/actualizar">

                        <input
                            type="hidden"
                            name="id_vehiculo"
                            value="<?= htmlspecialchars($vehiculo["id_vehiculo"]) ?>">

                        <div class="mb-3">

                            <label class="form-label">Placa</label>

                            <input
                                type="text"
                                name="placa"
                                class="form-control"
                                value="<?= htmlspecialchars($vehiculo["placa"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Marca</label>

                            <input
                                type="text"
                                name="marca"
                                class="form-control"
                                value="<?= htmlspecialchars($vehiculo["marca"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Modelo</label>

                            <input
                                type="text"
                                name="modelo"
                                class="form-control"
                                value="<?= htmlspecialchars($vehiculo["modelo"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Año</label>

                            <input
                                type="number"
                                name="anio"
                                class="form-control"
                                value="<?= htmlspecialchars($vehiculo["anio"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Color</label>

                            <input
                                type="text"
                                name="color"
                                class="form-control"
                                value="<?= htmlspecialchars($vehiculo["color"]) ?>"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Cliente</label>

                            <select
                                name="cliente_id"
                                class="form-select"
                                required>

                                <?php foreach ($clientes as $cliente): ?>

                                    <option
                                        value="<?= htmlspecialchars($cliente["id_cliente"]) ?>"
                                        <?= ($cliente["id_cliente"] == $vehiculo["cliente_id"]) ? "selected" : "" ?>>

                                        <?= htmlspecialchars($cliente["cliente"]) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php?url=vehiculos/listar"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Volver

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="bi bi-save"></i>
                                Actualizar Vehículo

                            </button>

                        </div>

                    </form>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
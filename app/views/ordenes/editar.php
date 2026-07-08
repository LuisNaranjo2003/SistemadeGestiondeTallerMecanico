<?php
$orden = $orden ?? null;
$vehiculos = $vehiculos ?? [];
$mecanicos = $mecanicos ?? [];
$servicios = $servicios ?? [];
$errores = $errores ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orden de Trabajo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-header bg-warning">

                        <h3 class="mb-0">
                            <i class="bi bi-pencil-square"></i>
                            Editar Orden de Trabajo
                        </h3>

                    </div>

                    <div class="card-body">

                        <?php if (!$orden): ?>

                            <div class="alert alert-danger">
                                La orden de trabajo no existe.
                            </div>

                            <a href="index.php?url=ordenes/listar"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Volver

                            </a>

                        <?php else: ?>

                            <?php if (!empty($errores)): ?>

                                <div class="alert alert-danger">

                                    <ul class="mb-0">

                                        <?php foreach ($errores as $error): ?>

                                            <li><?= htmlspecialchars($error) ?></li>

                                        <?php endforeach; ?>

                                    </ul>

                                </div>

                            <?php endif; ?>

                            <form method="POST"
                                action="index.php?url=ordenes/actualizar">

                                <input
                                    type="hidden"
                                    name="id_orden"
                                    value="<?= htmlspecialchars($orden["id_orden"]) ?>">

                                <div class="mb-3">

                                    <label class="form-label">
                                        <i class="bi bi-car-front-fill"></i>
                                        Vehículo
                                    </label>

                                    <select
                                        name="vehiculo_id"
                                        class="form-select"
                                        required>

                                        <?php foreach ($vehiculos as $v): ?>

                                            <option
                                                value="<?= htmlspecialchars($v["id_vehiculo"]) ?>"
                                                <?= ($v["id_vehiculo"] == $orden["vehiculo_id"]) ? "selected" : "" ?>>

                                                <?= htmlspecialchars($v["vehiculo"]) ?>

                                            </option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        <i class="bi bi-person-badge-fill"></i>
                                        Mecánico
                                    </label>

                                    <select
                                        name="mecanico_id"
                                        class="form-select"
                                        required>

                                        <?php foreach ($mecanicos as $m): ?>

                                            <option
                                                value="<?= htmlspecialchars($m["id_mecanico"]) ?>"
                                                <?= ($m["id_mecanico"] == $orden["mecanico_id"]) ? "selected" : "" ?>>

                                                <?= htmlspecialchars($m["nombre"]) ?>

                                            </option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        <i class="bi bi-tools"></i>
                                        Servicio
                                    </label>

                                    <select
                                        name="servicio_id"
                                        class="form-select"
                                        required>

                                        <?php foreach ($servicios as $s): ?>

                                            <option
                                                value="<?= htmlspecialchars($s["id_servicio"]) ?>"
                                                <?= ($s["id_servicio"] == $orden["servicio_id"]) ? "selected" : "" ?>>

                                                <?= htmlspecialchars($s["nombre_servicio"]) ?>

                                            </option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        <i class="bi bi-calendar-event"></i>
                                        Fecha
                                    </label>

                                    <input
                                        type="date"
                                        name="fecha"
                                        class="form-control"
                                        value="<?= htmlspecialchars($orden["fecha"]) ?>"
                                        required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        <i class="bi bi-card-text"></i>
                                        Observaciones
                                    </label>

                                    <textarea
                                        name="observaciones"
                                        rows="4"
                                        class="form-control"><?= htmlspecialchars($orden["observaciones"]) ?></textarea>

                                </div>

                                <div class="mb-4">

                                    <div class="mb-4">

                                        <label class="form-label">
                                            <i class="bi bi-flag-fill"></i>
                                            Estado
                                        </label>

                                        <select
                                            name="estado"
                                            class="form-select"
                                            required>

                                            <option value="pendiente"
                                                <?= ($orden["estado"] == "pendiente") ? "selected" : "" ?>>
                                                Pendiente
                                            </option>

                                            <option value="en proceso"
                                                <?= ($orden["estado"] == "en proceso") ? "selected" : "" ?>>
                                                En proceso
                                            </option>

                                            <option value="finalizado"
                                                <?= ($orden["estado"] == "finalizado") ? "selected" : "" ?>>
                                                Finalizado
                                            </option>

                                            <option value="cancelado"
                                                <?= ($orden["estado"] == "cancelado") ? "selected" : "" ?>>
                                                Cancelado
                                            </option>

                                        </select>

                                    </div>

                                </div>

                                <div class="d-flex justify-content-between">

                                    <a href="index.php?url=ordenes/listar"
                                        class="btn btn-secondary">

                                        <i class="bi bi-arrow-left"></i>
                                        Volver

                                    </a>

                                    <button
                                        type="submit"
                                        class="btn btn-warning">

                                        <i class="bi bi-save"></i>
                                        Actualizar Orden

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
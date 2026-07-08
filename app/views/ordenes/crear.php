<?php
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
    <title>Registrar Orden de Trabajo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-9">

                <div class="card shadow">

                    <div class="card-header bg-success text-white">

                        <h3 class="mb-0">
                            <i class="bi bi-clipboard-check-fill"></i>
                            Registrar Orden de Trabajo
                        </h3>

                    </div>

                    <div class="card-body">

                        <?php if (!empty($errores)): ?>

                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    <?php foreach ($errores as $error): ?>

                                        <li><?= htmlspecialchars($error) ?></li>

                                    <?php endforeach; ?>

                                </ul>

                            </div>

                        <?php endif; ?>

                        <form method="POST" action="index.php?url=ordenes/crear">

                            <div class="mb-3">

                                <label class="form-label">
                                    <i class="bi bi-car-front-fill"></i>
                                    Vehículo
                                </label>

                                <select
                                    name="vehiculo_id"
                                    class="form-select"
                                    required>

                                    <option value="">Seleccione un vehículo</option>

                                    <?php foreach ($vehiculos as $v): ?>

                                        <option
                                            value="<?= htmlspecialchars($v["id_vehiculo"]) ?>"
                                            <?= (($_POST["vehiculo_id"] ?? "") == $v["id_vehiculo"]) ? "selected" : "" ?>>

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

                                    <option value="">Seleccione un mecánico</option>

                                    <?php foreach ($mecanicos as $m): ?>

                                        <option
                                            value="<?= htmlspecialchars($m["id_mecanico"]) ?>"
                                            <?= (($_POST["mecanico_id"] ?? "") == $m["id_mecanico"]) ? "selected" : "" ?>>

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

                                    <option value="">Seleccione un servicio</option>

                                    <?php foreach ($servicios as $s): ?>

                                        <option
                                            value="<?= htmlspecialchars($s["id_servicio"]) ?>"
                                            <?= (($_POST["servicio_id"] ?? "") == $s["id_servicio"]) ? "selected" : "" ?>>

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
                                    value="<?= htmlspecialchars($_POST["fecha"] ?? date("Y-m-d")) ?>"
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
                                    class="form-control"><?= htmlspecialchars($_POST["observaciones"] ?? "") ?></textarea>

                            </div>

                            <div class="mb-4">

                                <label class="form-label">
                                    <i class="bi bi-flag-fill"></i>
                                    Estado
                                </label>

                                <?php $estado = $_POST["estado"] ?? ""; ?>

                                <select
                                    name="estado"
                                    class="form-select"
                                    required>

                                    <option value="">Seleccione un estado</option>

                                    <<option value="pendiente" <?= $estado == "pendiente" ? "selected" : "" ?>>
                                        Pendiente
                                        </option>

                                        <option value="en proceso" <?= $estado == "en proceso" ? "selected" : "" ?>>
                                            En proceso
                                        </option>

                                        <option value="finalizado" <?= $estado == "finalizado" ? "selected" : "" ?>>
                                            Finalizado
                                        </option>

                                        <option value="cancelado" <?= $estado == "cancelado" ? "selected" : "" ?>>
                                            Cancelado
                                        </option>

                                </select>

                            </div>

                            <div class="d-flex justify-content-between">

                                <a href="index.php?url=ordenes/listar"
                                    class="btn btn-secondary">

                                    <i class="bi bi-arrow-left"></i>
                                    Volver

                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-success">

                                    <i class="bi bi-save"></i>
                                    Guardar Orden

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
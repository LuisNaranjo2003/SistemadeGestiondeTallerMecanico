<?php
$pago = $pago ?? [];
$facturas = $facturas ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Editar Pago</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow" style="max-width:600px;margin:auto;">

            <div class="card-header bg-warning">

                <h3>

                    <i class="bi bi-pencil-square"></i>

                    Editar Pago

                </h3>

            </div>

            <div class="card-body">

                <form action="index.php?url=pagos/actualizar" method="POST">

                    <input
                        type="hidden"
                        name="id_pago"
                        value="<?= $pago['id_pago'] ?>">

                    <div class="mb-3">

                        <label class="form-label fw-bold">

                            Factura

                        </label>

                        <select
                            name="factura_id"
                            class="form-select">

                            <?php foreach ($facturas as $f): ?>

                                <option
                                    value="<?= $f['id_factura'] ?>"
                                    <?= $f['id_factura'] == $pago['factura_id'] ? 'selected' : '' ?>>

                                    Factura #<?= $f['id_factura'] ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">

                            Método Pago

                        </label>

                        <select
                            name="metodo_pago"
                            class="form-select">

                            <option <?= $pago['metodo_pago'] == "Efectivo" ? "selected" : "" ?>>Efectivo</option>

                            <option <?= $pago['metodo_pago'] == "Tarjeta" ? "selected" : "" ?>>Tarjeta</option>

                            <option <?= $pago['metodo_pago'] == "Transferencia" ? "selected" : "" ?>>Transferencia</option>

                            <option <?= $pago['metodo_pago'] == "Depósito" ? "selected" : "" ?>>Depósito</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-bold">

                            Fecha Pago

                        </label>

                        <input
                            type="date"
                            name="fecha_pago"
                            value="<?= $pago['fecha_pago'] ?>"
                            class="form-control">

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-bold">

                            Estado

                        </label>

                        <select
                            name="estado"
                            class="form-select">

                            <option value="Pendiente" <?= $pago['estado'] == "Pendiente" ? "selected" : "" ?>>Pendiente</option>

                            <option value="Pagado" <?= $pago['estado'] == "Pagado" ? "selected" : "" ?>>Pagado</option>

                            <option value="Rechazado" <?= $pago['estado'] == "Rechazado" ? "selected" : "" ?>>Rechazado</option>

                        </select>

                    </div>

                    <div class="text-end">

                        <a
                            href="index.php?url=pagos/listar"
                            class="btn btn-secondary">

                            Cancelar

                        </a>

                        <button
                            class="btn btn-primary">

                            <i class="bi bi-arrow-repeat"></i>

                            Actualizar

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
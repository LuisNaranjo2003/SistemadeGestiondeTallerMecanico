<?php
$factura = $factura ?? null;
$ordenes = $ordenes ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Factura</title>

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
                        Editar Factura
                    </h3>

                </div>

                <div class="card-body">

                    <?php if (!$factura): ?>

                        <div class="alert alert-danger">

                            La factura no existe.

                        </div>

                        <a href="index.php?url=facturas/listar"
                           class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>
                            Volver

                        </a>

                    <?php else: ?>

                    <form method="POST"
                          action="index.php?url=facturas/actualizar">

                        <input
                            type="hidden"
                            name="id_factura"
                            value="<?= htmlspecialchars($factura["id_factura"]) ?>">

                        <div class="mb-3">

                            <label class="form-label">Orden de Trabajo</label>

                            <select
                                name="orden_id"
                                class="form-select"
                                required>

                                <?php foreach ($ordenes as $orden): ?>

                                    <option
                                        value="<?= htmlspecialchars($orden["id_orden"]) ?>"
                                        <?= ($orden["id_orden"] == $factura["orden_id"]) ? "selected" : "" ?>>

                                        Orden #<?= htmlspecialchars($orden["id_orden"]) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Fecha</label>

                            <input
                                type="date"
                                name="fecha"
                                class="form-control"
                                value="<?= htmlspecialchars($factura["fecha"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Subtotal</label>

                            <input
                                type="number"
                                step="0.01"
                                name="subtotal"
                                id="subtotal"
                                class="form-control"
                                value="<?= htmlspecialchars($factura["subtotal"]) ?>"
                                oninput="calcularValores()"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">IVA (15%)</label>

                            <input
                                type="number"
                                step="0.01"
                                name="iva"
                                id="iva"
                                class="form-control"
                                value="<?= htmlspecialchars($factura["iva"]) ?>"
                                readonly>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Total</label>

                            <input
                                type="number"
                                step="0.01"
                                name="total"
                                id="total"
                                class="form-control"
                                value="<?= htmlspecialchars($factura["total"]) ?>"
                                readonly>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php?url=facturas/listar"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Volver

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="bi bi-save"></i>
                                Actualizar Factura

                            </button>

                        </div>

                    </form>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function calcularValores(){

    let subtotal = parseFloat(document.getElementById("subtotal").value) || 0;

    let iva = subtotal * 0.15;

    let total = subtotal + iva;

    document.getElementById("iva").value = iva.toFixed(2);

    document.getElementById("total").value = total.toFixed(2);

}

window.onload = calcularValores;

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
$facturas = $facturas ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Pago</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow" style="max-width:600px;margin:auto;">

        <div class="card-header bg-success text-white">

            <h3 class="mb-0">
                <i class="bi bi-cash-coin"></i>
                Registrar Pago
            </h3>

        </div>

        <div class="card-body">

            <form action="index.php?url=pagos/crear" method="POST">

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Factura
                    </label>

                    <select name="factura_id" class="form-select" required>

                        <option value="">Seleccione una factura...</option>

                        <?php foreach($facturas as $f): ?>

                        <option value="<?= $f['id_factura'] ?>">

                            Factura #<?= $f['id_factura'] ?>

                        </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Método de Pago
                    </label>

                    <select name="metodo_pago" class="form-select" required>

                        <option>Efectivo</option>
                        <option>Tarjeta</option>
                        <option>Transferencia</option>
                        <option>Depósito</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Fecha de Pago
                    </label>

                    <input
                        type="date"
                        name="fecha_pago"
                        class="form-control"
                        required>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Estado
                    </label>

                    <select
                        name="estado"
                        class="form-select"
                        required>

                        <option value="Pendiente">Pendiente</option>
                        <option value="Pagado">Pagado</option>
                        <option value="Rechazado">Rechazado</option>

                    </select>

                </div>

                <div class="text-end">

                    <a href="index.php?url=pagos/listar"
                        class="btn btn-secondary">

                        Cancelar

                    </a>

                    <button
                        class="btn btn-success">

                        <i class="bi bi-save"></i>

                        Guardar Pago

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
<?php
$facturas = $facturas ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Facturas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">

                <h3 class="mb-0">
                    <i class="bi bi-receipt"></i>
                    Gestión de Facturas
                </h3>

                <div>

                    <a href="index.php"
                        class="btn btn-secondary me-2">

                        <i class="bi bi-house-door-fill"></i>
                        Volver al Menú

                    </a>

                    <a href="index.php?url=facturas/crearForm"
                        class="btn btn-light">

                        <i class="bi bi-plus-circle"></i>
                        Registrar Factura

                    </a>

                </div>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-striped align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>N° Factura</th>
                            <th>Orden</th>
                            <th>Fecha</th>
                            <th>Subtotal</th>
                            <th>IVA</th>
                            <th>Total</th>
                            <th width="180">Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (count($facturas) > 0): ?>

                            <?php foreach ($facturas as $f): ?>

                                <tr>

                                    <td><?= htmlspecialchars($f["id_factura"]) ?></td>

                                    <td><?= htmlspecialchars($f["orden_id"]) ?></td>

                                    <td><?= htmlspecialchars($f["fecha"]) ?></td>

                                    <td>$<?= number_format($f["subtotal"], 2) ?></td>

                                    <td>$<?= number_format($f["iva"], 2) ?></td>

                                    <td class="fw-bold text-success">
                                        $<?= number_format($f["total"], 2) ?>
                                    </td>

                                    <td>

                                        <a href="index.php?url=facturas/imprimir&id=<?= $f["id_factura"] ?>"
                                            class="btn btn-primary btn-sm"
                                            title="Imprimir Factura">

                                            <i class="bi bi-printer-fill"></i>

                                        </a>

                                        <a href="index.php?url=facturas/editarForm&id=<?= $f["id_factura"] ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="index.php?url=facturas/eliminar&id=<?= $f["id_factura"] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Desea eliminar esta factura?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="7" class="text-center text-danger">

                                    <i class="bi bi-exclamation-circle"></i>

                                    No existen facturas registradas.

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
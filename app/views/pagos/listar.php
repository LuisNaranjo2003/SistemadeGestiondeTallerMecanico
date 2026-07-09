<?php $pagos = $pagos ?? []; ?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Listado de Pagos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

                <h3 class="mb-0">

                    <i class="bi bi-cash-coin"></i>

                    Gestión de Pagos

                </h3>

                <div>

                    <a
                        href="index.php"
                        class="btn btn-secondary">

                        <i class="bi bi-house-door-fill"></i>

                        Menú

                    </a>

                    <a
                        href="index.php?url=pagos/crearForm"
                        class="btn btn-light">

                        <i class="bi bi-plus-circle"></i>

                        Nuevo Pago

                    </a>

                </div>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>Factura</th>

                            <th>Método</th>

                            <th>Fecha</th>

                            <th>Estado</th>

                            <th width="150">

                                Acciones

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (count($pagos) > 0): ?>

                            <?php foreach ($pagos as $p): ?>

                                <tr>

                                    <td><?= $p['id_pago'] ?></td>

                                    <td>

                                        Factura #<?= $p['factura_id'] ?>

                                    </td>

                                    <td>

                                        <?= $p['metodo_pago'] ?>

                                    </td>

                                    <td>

                                        <?= $p['fecha_pago'] ?>

                                    </td>

                                    <td>

                                        <?php

                                        $color = "secondary";

                                        if ($p['estado'] == "Pendiente") $color = "warning text-dark";

                                        if ($p['estado'] == "Pagado") $color = "success";

                                        if ($p['estado'] == "Rechazado") $color = "danger";

                                        ?>

                                        <span class="badge bg-<?= explode(' ', $color)[0] ?> <?= strpos($color, 'text-dark') !== false ? 'text-dark' : '' ?>">

                                            <?= $p['estado'] ?>

                                        </span>

                                    </td>

                                    <td>

                                        <a
                                            href="index.php?url=pagos/editarForm&id=<?= $p['id_pago'] ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a
                                            href="index.php?url=pagos/eliminar&id=<?= $p['id_pago'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este pago?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="6" class="text-center text-danger">

                                    <i class="bi bi-exclamation-circle"></i>

                                    No existen pagos registrados.

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>
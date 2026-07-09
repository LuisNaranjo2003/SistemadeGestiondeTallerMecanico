<?php $repuestos = $repuestos ?? []; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Repuestos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                <h3 class="mb-0">
                    <i class="bi bi-tools"></i>
                    Gestión de Repuestos
                </h3>

                <div>

                    <a href="index.php" class="btn btn-secondary me-2">
                        <i class="bi bi-house-door-fill"></i>
                        Volver al Menú
                    </a>

                    <a href="index.php?url=repuestos/crearForm" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i>
                        Nuevo Repuesto
                    </a>

                </div>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-striped align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Proveedor</th>
                            <th width="150">Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php if (count($repuestos) > 0): ?>

                            <?php foreach ($repuestos as $r): ?>

                                <tr>

                                    <td><?= htmlspecialchars($r["id_repuesto"]) ?></td>

                                    <td><?= htmlspecialchars($r["nombre"]) ?></td>

                                    <td><?= htmlspecialchars($r["marca"]) ?></td>

                                    <td>
                                        $<?= number_format($r["precio"], 2) ?>
                                    </td>

                                    <td>

                                        <?php if ($r["stock"] > 10): ?>

                                            <span class="badge bg-success">
                                                <?= $r["stock"] ?>
                                            </span>

                                        <?php elseif ($r["stock"] > 0): ?>

                                            <span class="badge bg-warning text-dark">
                                                <?= $r["stock"] ?>
                                            </span>

                                        <?php else: ?>

                                            <span class="badge bg-danger">
                                                Agotado
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td><?= htmlspecialchars($r["proveedor"]) ?></td>

                                    <td>

                                        <a href="index.php?url=repuestos/editarForm&id=<?= $r["id_repuesto"] ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="index.php?url=repuestos/eliminar&id=<?= $r["id_repuesto"] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Desea eliminar este repuesto?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="7" class="text-center text-danger">

                                    <i class="bi bi-exclamation-circle"></i>

                                    No hay repuestos registrados.

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
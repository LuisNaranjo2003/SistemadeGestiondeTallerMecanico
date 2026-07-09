<?php
$proveedores = $proveedores ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Proveedores</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                <h3 class="mb-0">
                    <i class="bi bi-truck"></i>
                    Gestión de Proveedores
                </h3>

                <div>

                    <a href="index.php"
                        class="btn btn-secondary me-2">

                        <i class="bi bi-house-door-fill"></i>
                        Volver al Menú

                    </a>

                    <a href="index.php?url=proveedores/crearForm"
                        class="btn btn-success">

                        <i class="bi bi-plus-circle"></i>
                        Nuevo Proveedor

                    </a>

                </div>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-striped align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Empresa</th>
                            <th>Contacto</th>
                            <th>RUC</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th width="180">Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php if (count($proveedores) > 0): ?>

                            <?php foreach ($proveedores as $p): ?>

                                <tr>

                                    <td><?= htmlspecialchars($p["id_proveedor"]) ?></td>

                                    <td><?= htmlspecialchars($p["nombre_empresa"]) ?></td>

                                    <td><?= htmlspecialchars($p["contacto"]) ?></td>

                                    <td><?= htmlspecialchars($p["ruc"]) ?></td>

                                    <td><?= htmlspecialchars($p["telefono"]) ?></td>

                                    <td><?= htmlspecialchars($p["correo"]) ?></td>

                                    <td><?= htmlspecialchars($p["direccion"]) ?></td>

                                    <td>

                                        <a href="index.php?url=proveedores/editarForm&id=<?= $p["id_proveedor"] ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="index.php?url=proveedores/eliminar&id=<?= $p["id_proveedor"] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Desea eliminar este proveedor?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="8" class="text-center text-danger">

                                    <i class="bi bi-exclamation-circle"></i>

                                    No existen proveedores registrados.

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

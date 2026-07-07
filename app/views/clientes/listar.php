<?php
$clientes = $clientes ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>

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
                    <i class="bi bi-people-fill"></i>
                    Gestión de Clientes
                </h3>

                <div>

                    <a href="index.php"
                        class="btn btn-secondary me-2">

                        <i class="bi bi-house-door-fill"></i>
                        Volver al Menú

                    </a>

                    <a href="index.php?url=clientes/crearForm"
                        class="btn btn-success">

                        <i class="bi bi-plus-circle"></i>
                        Nuevo Cliente

                    </a>

                </div>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-striped align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cédula</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th width="180">Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php if (count($clientes) > 0): ?>

                            <?php foreach ($clientes as $c): ?>

                                <tr>

                                    <td><?= htmlspecialchars($c["id_cliente"]) ?></td>

                                    <td><?= htmlspecialchars($c["nombres"]) ?></td>

                                    <td><?= htmlspecialchars($c["apellidos"]) ?></td>

                                    <td><?= htmlspecialchars($c["cedula"]) ?></td>

                                    <td><?= htmlspecialchars($c["telefono"]) ?></td>

                                    <td><?= htmlspecialchars($c["correo"]) ?></td>

                                    <td><?= htmlspecialchars($c["direccion"]) ?></td>

                                    <td>

                                        <a href="index.php?url=clientes/editarForm&id=<?= $c["id_cliente"] ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <a href="index.php?url=clientes/eliminar&id=<?= $c["id_cliente"] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Desea eliminar este cliente?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="8" class="text-center text-danger">

                                    <i class="bi bi-exclamation-circle"></i>

                                    No existen clientes registrados.

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
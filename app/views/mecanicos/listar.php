<?php
$mecanicos = $mecanicos ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Mecánicos</title>

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
                <i class="bi bi-person-workspace"></i>
                Gestión de Mecánicos
            </h3>

            <div>

                <a href="index.php"
                   class="btn btn-secondary me-2">

                    <i class="bi bi-house-door-fill"></i>
                    Volver al Menú

                </a>

                <a href="index.php?url=mecanicos/crearForm"
                   class="btn btn-light">

                    <i class="bi bi-plus-circle"></i>
                    Registrar Mecánico

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
                        <th>Especialidad</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th width="180">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                <?php if(count($mecanicos) > 0): ?>

                    <?php foreach($mecanicos as $m): ?>

                        <tr>

                            <td><?= htmlspecialchars($m["id_mecanico"]) ?></td>

                            <td><?= htmlspecialchars($m["nombres"]) ?></td>

                            <td><?= htmlspecialchars($m["apellidos"]) ?></td>

                            <td><?= htmlspecialchars($m["especialidad"]) ?></td>

                            <td><?= htmlspecialchars($m["telefono"]) ?></td>

                            <td><?= htmlspecialchars($m["correo"]) ?></td>

                            <td>

                                <a href="index.php?url=mecanicos/editarForm&id=<?= $m["id_mecanico"] ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <a href="index.php?url=mecanicos/eliminar&id=<?= $m["id_mecanico"] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Desea eliminar este mecánico?')">

                                    <i class="bi bi-trash"></i>

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="7" class="text-center text-danger">

                            <i class="bi bi-exclamation-circle"></i>
                            No existen mecánicos registrados.

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
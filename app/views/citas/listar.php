<?php $citas = $citas ?? []; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="bi bi-calendar-check-fill"></i> Gestión de Citas</h3>
                <div>
                    <a href="index.php" class="btn btn-secondary me-2"><i class="bi bi-house-door-fill"></i> Volver al Menú</a>
                    <a href="index.php?url=citas/crearForm" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Agendar Cita</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Vehículo (Placa)</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th width="150">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($citas) > 0): ?>
                            <?php foreach ($citas as $c): ?>
                                <tr>
                                    <td><?= htmlspecialchars($c["id_cita"]) ?></td>
                                    <td><?= htmlspecialchars($c["nombres"] . " " . $c["apellidos"]) ?></td>
                                    <td><?= htmlspecialchars($c["marca"] . " (" . $c["placa"] . ")") ?></td>
                                    <td><?= htmlspecialchars($c["fecha"]) ?></td>
                                    <td><?= htmlspecialchars($c["hora"]) ?></td>
                                    <td>
                                        <span class="badge <?= $c["estado"] == 'Pendiente' ? 'bg-warning text-dark' : ($c["estado"] == 'Confirmada' ? 'bg-primary' : ($c["estado"] == 'Atendida' ? 'bg-success' : 'bg-danger')) ?>">
                                            <?= htmlspecialchars($c["estado"]) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="index.php?url=citas/editarForm&id=<?= $c["id_cita"] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <a href="index.php?url=citas/eliminar&id=<?= $c["id_cita"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar esta cita?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7" class="text-center text-danger"><i class="bi bi-exclamation-circle"></i> No hay citas agendadas.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow" style="max-width: 600px; margin: 0 auto;">
            <div class="card-header bg-warning text-dark">
                <h3 class="mb-0"><i class="bi bi-pencil-square"></i> Editar Cita</h3>
            </div>
            <div class="card-body">
                <form action="index.php?url=citas/actualizar" method="POST">
                    <input type="hidden" name="id_cita" value="<?= $cita['id_cita'] ?>">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Cliente</label>
                        <select name="cliente_id" class="form-select" required>
                            <?php foreach ($clientes as $cl): ?>
                                <option value="<?= $cl['id_cliente'] ?>" <?= $cl['id_cliente'] == $cita['cliente_id'] ? 'selected' : '' ?>>
                                    <?= $cl['nombres'] . " " . $cl['apellidos'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Vehículo</label>
                        <select name="vehiculo_id" class="form-select" required>
                            <?php foreach ($vehiculos as $v): ?>
                                <option value="<?= $v['id_vehiculo'] ?>" <?= $v['id_vehiculo'] == $cita['vehiculo_id'] ? 'selected' : '' ?>>
                                    <?= $v['marca'] . " - " . $v['placa'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="<?= $cita['fecha'] ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Hora</label>
                            <input type="time" name="hora" class="form-control" value="<?= $cita['hora'] ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Estado</label>
                        <select name="estado" class="form-select" required>
                            <option value="Pendiente" <?= $cita['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                            <option value="Confirmada" <?= $cita['estado'] == 'Confirmada' ? 'selected' : '' ?>>Confirmada</option>
                            <option value="Atendida" <?= $cita['estado'] == 'Atendida' ? 'selected' : '' ?>>Atendida</option>
                            <option value="Cancelada" <?= $cita['estado'] == 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
                        </select>
                    </div>

                    <div class="text-end">
                        <a href="index.php?url=citas/listar" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i> Actualizar Cita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
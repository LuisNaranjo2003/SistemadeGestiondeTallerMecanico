<?php
$clientes = $clientes ?? [];
$vehiculos = $vehiculos ?? [];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow" style="max-width: 600px; margin: 0 auto;">
            <div class="card-header bg-warning text-dark">
                <h3 class="mb-0"><i class="bi bi-calendar-plus"></i> Agendar Nueva Cita</h3>
            </div>
            <div class="card-body">
                <form action="index.php?url=citas/crear" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Cliente</label>
                        <select name="cliente_id" class="form-select" required>
                            <option value="">Seleccione un cliente...</option>
                            <?php foreach ($clientes as $cl): ?>
                                <option value="<?= $cl['id_cliente'] ?>"><?= $cl['nombres'] . " " . $cl['apellidos'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Vehículo</label>
                        <select name="vehiculo_id" class="form-select" required>
                            <option value="">Seleccione un vehículo...</option>
                            <?php foreach ($vehiculos as $v): ?>
                                <option value="<?= $v['id_vehiculo'] ?>"><?= $v['marca'] . " - " . $v['placa'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Fecha</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Hora</label>
                            <input type="time" name="hora" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Estado</label>
                        <select name="estado" class="form-select" required>
                            <option value="Pendiente" selected>Pendiente</option>
                            <option value="Confirmada">Confirmada</option>
                            <option value="Atendida">Atendida</option>
                            <option value="Cancelada">Cancelada</option>
                        </select>
                    </div>

                    <div class="text-end">
                        <a href="index.php?url=citas/listar" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Cita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
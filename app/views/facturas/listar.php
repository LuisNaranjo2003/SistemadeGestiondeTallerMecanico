<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Facturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .navbar-custom {
            background-color: #007bff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-custom {
            border: none;
            border-radius: 16px;
            background: #ffffff;
        }
        .table-dark-custom th {
            background-color: #343a40 !important;
            color: white !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
        <div class="container">
            <span class="navbar-brand fw-bold fs-4">
                <i class="bi bi-tools me-2"></i> Sistema de Gestión de Taller Mecánico
            </span>
            <a href="index.php" class="btn btn-light btn-sm fw-bold">
                <i class="bi bi-house-door-fill me-1"></i> Menú Principal
            </a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card card-custom shadow p-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark m-0">
                    HISTORIAL DE FACTURAS
                </h2>
                <a href="index.php?url=facturas/crear" class="btn btn-success fw-bold px-3">
                    <i class="bi bi-plus-circle me-1"></i> Registrar Nueva Factura
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-center m-0">
                    <thead class="table-dark-custom">
                        <tr>
                            <th>N° Factura</th>
                            <th>ID Orden</th>
                            <th>Fecha</th>
                            <th>Subtotal</th>
                            <th>IVA</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($facturas)): ?>
                            <?php foreach ($facturas as $f): ?>
                                <tr>
                                    <td><strong><?php echo $f['id'] ?? $f['id_factura']; ?></strong></td>
                                    <td><span class="badge bg-secondary"><?php echo $f['orden_id']; ?></span></td>
                                    <td><?php echo $f['fecha']; ?></td>
                                    <td>$<?php echo number_format($f['subtotal'], 2); ?></td>
                                    <td>$<?php echo number_format($f['iva'], 2); ?></td>
                                    <td class="fw-bold">$<?php echo number_format($f['total'], 2); ?></td>
                                    <td>
                                        <a href="index.php?url=facturas/modificar&id=<?php echo $f['id'] ?? $f['id_factura']; ?>" class="btn btn-sm btn-primary px-3 me-1">
                                            <i class="bi bi-pencil-fill me-1"></i> Editar
                                        </a>
                                        <a href="index.php?url=facturas/eliminar&id=<?php echo $f['id'] ?? $f['id_factura']; ?>" class="btn btn-sm btn-danger px-3" onclick="return confirm('¿Seguro que deseas eliminar esta factura?');">
                                            <i class="bi bi-trash-fill me-1"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-muted py-4">No hay facturas registradas en el sistema.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>
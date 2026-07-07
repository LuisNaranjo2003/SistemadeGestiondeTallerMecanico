<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Órdenes de Trabajo</title>
    <link rel="stylesheet" href="../../../public/css/estilos.css">
</head>
<body>
<div class="contenedor-principal">

    <div class="header-container">
        <h1>Órdenes de Trabajo</h1>
        <a href="index.php?url=vehiculos/listar" class="btn-volver">← Volver al menú</a>
    </div>

    <a href="index.php?url=ordenes/crearForm" class="btn-agregar">+ Nueva Orden</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehículo</th>
                <th>Mecánico</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($ordenes)): ?>
                <?php foreach ($ordenes as $orden): ?>
                    <tr>
                        <td>#<?php echo htmlspecialchars($orden['id_orden']); ?></td>
                        <td><?php echo htmlspecialchars($orden['placa'] . ' - ' . $orden['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($orden['nombre_mecanico']); ?></td>
                        <td><?php echo htmlspecialchars($orden['fecha']); ?></td>
                        <td><?php echo htmlspecialchars(ucfirst($orden['estado'])); ?></td>
                        <td>
                            <a href="index.php?url=ordenes/detalle&id=<?php echo $orden['id_orden']; ?>" class="btn-accion btn-ver">Ver</a>
                            <a href="index.php?url=ordenes/editarForm&id=<?php echo $orden['id_orden']; ?>" class="btn-accion btn-editar">Editar</a>
                            <a href="index.php?url=ordenes/eliminar&id=<?php echo $orden['id_orden']; ?>"
                               class="btn-accion btn-eliminar"
                               onclick="return confirm('¿Está seguro de eliminar esta orden? Esta acción no se puede deshacer.');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align:center;">No hay órdenes registradas todavía.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        <strong>Sistema de Gestión Taller Mecánico</strong> — Módulo de Órdenes
    </div>
</div>
</body>
</html>

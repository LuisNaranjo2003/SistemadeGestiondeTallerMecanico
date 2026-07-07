<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Orden</title>
    <link rel="stylesheet" href="../../../public/css/estilos.css">
</head>
<body>
<div class="contenedor-principal">

    <div class="header-container">
        <h1>Detalle de la Orden #<?php echo htmlspecialchars($orden['id_orden']); ?></h1>
        <a href="index.php?url=ordenes/listar" class="btn-volver">← Volver</a>
    </div>

    <table>
        <tbody>
            <tr>
                <td style="font-weight:600; width:220px;">Vehículo</td>
                <td><?php echo htmlspecialchars($orden['placa'] . ' - ' . $orden['modelo']); ?></td>
            </tr>
            <tr>
                <td style="font-weight:600;">Mecánico asignado</td>
                <td><?php echo htmlspecialchars($orden['nombre_mecanico']); ?></td>
            </tr>
            <tr>
                <td style="font-weight:600;">Fecha</td>
                <td><?php echo htmlspecialchars($orden['fecha']); ?></td>
            </tr>
            <tr>
                <td style="font-weight:600;">Estado</td>
                <td><?php echo htmlspecialchars(ucfirst($orden['estado'])); ?></td>
            </tr>
            <tr>
                <td style="font-weight:600;">Observaciones</td>
                <td><?php echo nl2br(htmlspecialchars($orden['observaciones'] ?: 'Sin observaciones.')); ?></td>
            </tr>
        </tbody>
    </table>

    <div style="margin-top:25px;">
        <a href="index.php?url=ordenes/editarForm&id=<?php echo $orden['id_orden']; ?>" class="btn-accion btn-editar">Editar</a>
        <a href="index.php?url=ordenes/eliminar&id=<?php echo $orden['id_orden']; ?>"
           class="btn-accion btn-eliminar"
           onclick="return confirm('¿Está seguro de eliminar esta orden?');">Eliminar</a>
    </div>

    <div class="footer">
        <strong>Sistema de Gestión Taller Mecánico</strong> — Módulo de Órdenes
    </div>
</div>
</body>
</html>

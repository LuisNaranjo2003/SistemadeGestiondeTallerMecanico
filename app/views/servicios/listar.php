<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Servicios</title>
    <link rel="stylesheet" href="../public/css/estilos.css?v=4">
</head>
<body>
    
    <div class="contenedor-principal">
        <div class="header-container">
            <h1>Módulo de Servicios</h1>
            <a href="#" class="btn-volver">← Volver al Menú Principal</a>
        </div>
        
        <a href="index.php?action=crear" class="btn-agregar">+ Agregar Nuevo Servicio</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($servicios)): ?>
                    <?php foreach($servicios as $servicio): ?>
                    <tr>
                        <td><?php echo $servicio['id_servicio']; ?></td>
                        <td><?php echo $servicio['nombre_servicio']; ?></td>
                        <td><?php echo $servicio['descripcion']; ?></td>
                        <td>$<?php echo number_format($servicio['precio'], 2); ?></td>
                        <td>
                            <a href="index.php?action=detalle&id=<?php echo $servicio['id_servicio']; ?>" class="btn-accion btn-ver">Ver</a>
                            <a href="index.php?action=editar&id=<?php echo $servicio['id_servicio']; ?>" class="btn-accion btn-editar">Editar</a>
                            <a href="index.php?action=eliminar&id=<?php echo $servicio['id_servicio']; ?>" class="btn-accion btn-eliminar">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: #a1a5b7;">No hay servicios registrados en la base de datos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="footer">
            <strong>Sistema de Gestión de Taller Mecánico</strong> &copy; 2026 - Módulo de Servicios
        </div>
    </div>

</body>
</html>
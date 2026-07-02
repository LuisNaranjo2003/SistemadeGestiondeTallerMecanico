<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Servicio</title>
    <link rel="stylesheet" href="../public/css/estilos.css?v=4">
    <style>
        .detalle-info { font-size: 16px; margin-bottom: 15px; color: #3f4254; }
        .detalle-info strong { color: #181c32; display: inline-block; width: 120px; }
    </style>
</head>
<body>
    <div class="contenedor-principal">
        <div class="header-container">
            <h1>Detalle del Servicio</h1>
            <a href="index.php?action=index" class="btn-volver">← Regresar a la Lista</a>
        </div>

        <div style="padding: 20px 30px; background: #f9fbfd; border-radius: 8px; border: 1px dashed #e4e6ef;">
            <p class="detalle-info"><strong>ID:</strong> <?php echo $servicio['id_servicio']; ?></p>
            <p class="detalle-info"><strong>Servicio:</strong> <?php echo $servicio['nombre_servicio']; ?></p>
            <p class="detalle-info"><strong>Descripción:</strong> <?php echo $servicio['descripcion']; ?></p>
            <p class="detalle-info"><strong>Precio:</strong> $<?php echo number_format($servicio['precio'], 2); ?></p>
        </div>
        
        <div style="margin-top: 30px; text-align: right;">
            <a href="index.php?action=editar&id=<?php echo $servicio['id_servicio']; ?>" class="btn-accion btn-editar" style="padding: 10px 20px; font-size: 14px;">Editar Servicio</a>
        </div>
        <div class="footer">
            <strong>Sistema de Gestión de Taller Mecánico</strong> &copy; 2026 - Módulo de Servicios
        </div>
    </div>
</body>
</html>
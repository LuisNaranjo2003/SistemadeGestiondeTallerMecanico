<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Servicio</title>
    <link rel="stylesheet" href="../public/css/estilos.css?v=4">
</head>
<body>
    <div class="contenedor-principal" style="text-align: center; padding: 50px 30px;">
        <h1 style="color: #f1416c; margin-bottom: 20px; font-size: 28px;">Eliminar Servicio</h1>
        <p style="font-size: 16px; color: #3f4254; margin-bottom: 30px;">
            ¿Estás seguro de que deseas eliminar permanentemente el servicio <br>
            <strong style="color: #181c32; font-size: 20px; display: block; margin-top: 10px;"><?php echo $servicio['nombre_servicio']; ?></strong>?
        </p>
        
        <form action="index.php?action=eliminar" method="POST" style="box-shadow: none; padding: 0; border: none; background: transparent; max-width: 100%;">
            <input type="hidden" name="id_servicio" value="<?php echo $servicio['id_servicio']; ?>">
            
            <input type="submit" value="Sí, Eliminar" style="background-color: #f1416c; box-shadow: 0px 4px 10px rgba(241, 65, 108, 0.3);">
            <a href="index.php?action=index" class="btn-cancelar" style="margin-left: 20px; background: #f3f6f9; padding: 12px 24px; border-radius: 8px; border: 1px solid #d8dce6;">Cancelar</a>
        </form>
        <div class="footer">
            <strong>Sistema de Gestión de Taller Mecánico</strong> &copy; 2026 - Módulo de Servicios
        </div>
    </div>
</body>
</html>
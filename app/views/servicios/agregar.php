<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Servicio</title>
    <link rel="stylesheet" href="../public/css/estilos.css?v=4">
</head>
<body>

    <div class="contenedor-principal">
        <div class="header-container">
            <h1>Agregar Nuevo Servicio</h1>
            <a href="index.php?action=index" class="btn-volver">← Regresar a la Lista</a>
        </div>
        
        <form action="index.php?action=crear" method="POST">
            <label for="nombre_servicio">Nombre del Servicio:</label>
            <input type="text" id="nombre_servicio" name="nombre_servicio" required>
            
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            
            <label for="precio">Precio ($):</label>
            <input type="number" step="0.01" id="precio" name="precio" required>
            
            <input type="submit" value="Guardar Servicio">
            <a href="index.php?action=index" class="btn-cancelar">Cancelar</a>
        </form>
        <div class="footer">
            <strong>Sistema de Gestión de Taller Mecánico</strong> &copy; 2026 - Módulo de Servicios
        </div>
    </div>

</body>
</html>
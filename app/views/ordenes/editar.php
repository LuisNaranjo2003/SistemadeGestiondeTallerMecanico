<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Orden de Trabajo</title>
    <link rel="stylesheet" href="../../../public/css/estilos.css">
</head>
<body>
<div class="contenedor-principal">

    <div class="header-container">
        <h1>Editar Orden de Trabajo #<?php echo htmlspecialchars($orden['id_orden']); ?></h1>
        <a href="index.php?url=ordenes/listar" class="btn-volver">← Volver</a>
    </div>

    <?php if (!empty($errores)): ?>
        <div style="background:#fdecea; border:1px solid #f1416c; padding:15px; border-radius:8px; margin-bottom:20px; color:#f1416c;">
            <ul style="margin:0; padding-left:20px;">
                <?php foreach ($errores as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="index.php?url=ordenes/actualizar" method="POST" id="formOrden" novalidate>
        <input type="hidden" name="id_orden" value="<?php echo htmlspecialchars($orden['id_orden']); ?>">

        <label for="vehiculo_id">Vehículo</label>
        <select name="vehiculo_id" id="vehiculo_id" required>
            <option value="">-- Seleccione un vehículo --</option>
            <?php foreach ($vehiculos as $v): ?>
                <option value="<?php echo $v['id_vehiculo']; ?>"
                    <?php echo ($orden['vehiculo_id'] == $v['id_vehiculo']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($v['placa'] . ' - ' . $v['modelo']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="mecanico_id">Mecánico</label>
        <select name="mecanico_id" id="mecanico_id" required>
            <option value="">-- Seleccione un mecánico --</option>
            <?php foreach ($mecanicos as $m): ?>
                <option value="<?php echo $m['id_mecanico']; ?>"
                    <?php echo ($orden['mecanico_id'] == $m['id_mecanico']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($m['nombre']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo htmlspecialchars($orden['fecha']); ?>" required>

        <label for="observaciones">Observaciones</label>
        <textarea name="observaciones" id="observaciones" rows="4"><?php echo htmlspecialchars($orden['observaciones']); ?></textarea>

        <label for="estado">Estado</label>
        <select name="estado" id="estado" required>
            <option value="">-- Seleccione un estado --</option>
            <option value="pendiente" <?php echo $orden['estado'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
            <option value="en proceso" <?php echo $orden['estado'] === 'en proceso' ? 'selected' : ''; ?>>En proceso</option>
            <option value="finalizado" <?php echo $orden['estado'] === 'finalizado' ? 'selected' : ''; ?>>Finalizado</option>
        </select>

        <input type="submit" value="Actualizar Orden">
        <a href="index.php?url=ordenes/listar" class="btn-cancelar">Cancelar</a>
    </form>
</div>

<script src="../../../public/js/ordenes.js"></script>
</body>
</html>

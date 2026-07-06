<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Orden de Trabajo</title>
    <link rel="stylesheet" href="../../../public/css/estilos.css">
</head>
<body>
<div class="contenedor-principal">

    <div class="header-container">
        <h1>Nueva Orden de Trabajo</h1>
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

    <form action="index.php?url=ordenes/crear" method="POST" id="formOrden" novalidate>

        <label for="vehiculo_id">Vehículo</label>
        <select name="vehiculo_id" id="vehiculo_id" required>
            <option value="">-- Seleccione un vehículo --</option>
            <?php foreach ($vehiculos as $v): ?>
                <option value="<?php echo $v['id_vehiculo']; ?>"
                    <?php echo (isset($_POST['vehiculo_id']) && $_POST['vehiculo_id'] == $v['id_vehiculo']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($v['placa'] . ' - ' . $v['modelo']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="mecanico_id">Mecánico</label>
        <select name="mecanico_id" id="mecanico_id" required>
            <option value="">-- Seleccione un mecánico --</option>
            <?php foreach ($mecanicos as $m): ?>
                <option value="<?php echo $m['id_mecanico']; ?>"
                    <?php echo (isset($_POST['mecanico_id']) && $_POST['mecanico_id'] == $m['id_mecanico']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($m['nombre']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha"
               value="<?php echo htmlspecialchars($_POST['fecha'] ?? date('Y-m-d')); ?>" required>

        <label for="observaciones">Observaciones</label>
        <textarea name="observaciones" id="observaciones" rows="4"><?php echo htmlspecialchars($_POST['observaciones'] ?? ''); ?></textarea>

        <label for="estado">Estado</label>
        <?php $estadoActual = $_POST['estado'] ?? ''; ?>
        <select name="estado" id="estado" required>
            <option value="">-- Seleccione un estado --</option>
            <option value="pendiente" <?php echo $estadoActual === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
            <option value="en proceso" <?php echo $estadoActual === 'en proceso' ? 'selected' : ''; ?>>En proceso</option>
            <option value="finalizado" <?php echo $estadoActual === 'finalizado' ? 'selected' : ''; ?>>Finalizado</option>
        </select>

        <input type="submit" value="Guardar Orden">
        <a href="index.php?url=ordenes/listar" class="btn-cancelar">Cancelar</a>
    </form>
</div>

<script src="../../../public/js/ordenes.js"></script>
</body>
</html>

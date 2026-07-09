<?php
// 1. CONEXIÓN RÁPIDA A LA BASE DE DATOS PARA JALAR LAS ÓRDENES REALES
// (Ajusta los parámetros de tu base de datos si cambian)
$conexion = new mysqli("localhost", "root", "", "taller_mecanico");

// Buscamos las órdenes disponibles
$sql_ordenes = "SELECT id_orden FROM ordenes"; 
$resultado_ordenes = $conexion->query($sql_ordenes);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .card-custom {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        .btn-custom-save {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-custom-save:hover {
            background-color: #218838;
            transform: scale(1.02);
        }
        /* Toque rosa sutil de combinación decorativa */
        .pink-dot {
            color: #e83e8c;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card card-custom p-4">
                    
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-dark m-0">
                            🧾 Registrar Nueva Factura
                        </h2>
                        <p class="text-muted small mt-1">Campos obligatorios marcados con <span class="pink-dot">*</span></p>
                    </div>

                    <form action="index.php?url=facturas/guardar" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Seleccionar Orden de Trabajo <span class="pink-dot">*</span></label>
                            <select name="orden_id" class="form-select" required>
                                <?php if ($resultado_ordenes && $resultado_ordenes->num_rows > 0): ?>
                                    <option value="" disabled selected>-- Seleccione una Orden Activa --</option>
                                    <?php while ($orden = $resultado_ordenes->fetch_assoc()): ?>
                                        <option value="<?php echo $orden['id_orden']; ?>">Orden N° <?php echo $orden['id_orden']; ?></option>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <option value="" disabled selected>⚠️ No hay órdenes registradas en la Base de Datos</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Fecha <span class="pink-dot">*</span></label>
                            <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Subtotal ($) <span class="pink-dot">*</span></label>
                            <input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control" placeholder="0.00" required oninput="calcularValores()">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">IVA (15% automático)</label>
                            <input type="number" step="0.01" name="iva" id="iva" class="form-control text-muted" placeholder="0.00" readonly style="background-color: #f8f9fa;">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark">Total ($)</label>
                            <input type="number" step="0.01" name="total" id="total" class="form-control fw-bold text-success fs-5" placeholder="0.00" readonly style="background-color: #f8f9fa;">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-custom-save py-2">
                                <i class="bi bi-hdd-fill me-1"></i> Guardar Factura
                            </button>
                            <a href="index.php?url=facturas/listar" class="btn btn-link text-danger fw-bold text-decoration-none text-center mt-1">
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function calcularValores() {
            let subtotalInput = document.getElementById('subtotal');
            let ivaInput = document.getElementById('iva');
            let totalInput = document.getElementById('total');

            let subtotal = parseFloat(subtotalInput.value) || 0;
            
            // Calculamos el 15% de IVA basado en el subtotal introducido
            let iva = subtotal * 0.15;
            let total = subtotal + iva;

            // Renderizamos los resultados formateados a dos decimales
            ivaInput.value = iva.toFixed(2);
            totalInput.value = total.toFixed(2);
        }
    </script>

</body>
</html>
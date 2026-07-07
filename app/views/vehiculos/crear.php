<?php
$clientes = $clientes ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vehículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    <h3 class="mb-0">
                        <i class="bi bi-car-front-fill"></i>
                        Registrar Vehículo
                    </h3>

                </div>

                <div class="card-body">

                    <form method="POST" action="index.php?url=vehiculos/crear">

                        <div class="mb-3">

                            <label class="form-label">Placa</label>

                            <input
                                type="text"
                                name="placa"
                                class="form-control"
                                placeholder="Ejemplo: ABC-1234"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Marca</label>

                            <input
                                type="text"
                                name="marca"
                                class="form-control"
                                placeholder="Toyota"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Modelo</label>

                            <input
                                type="text"
                                name="modelo"
                                class="form-control"
                                placeholder="Corolla"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Año</label>

                            <input
                                type="number"
                                name="anio"
                                class="form-control"
                                min="1980"
                                max="<?= date('Y'); ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Color</label>

                            <input
                                type="text"
                                name="color"
                                class="form-control"
                                placeholder="Blanco"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Cliente</label>

                            <select
                                name="cliente_id"
                                class="form-select"
                                required>

                                <option value="">Seleccione un cliente</option>

                                <?php foreach ($clientes as $cliente): ?>

                                    <option value="<?= htmlspecialchars($cliente['id_cliente']) ?>">
                                        <?= htmlspecialchars($cliente['cliente']) ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php?url=vehiculos/listar"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Volver

                            </a>

                            <button type="submit"
                                    class="btn btn-success">

                                <i class="bi bi-save"></i>
                                Guardar Vehículo

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
$proveedores = $proveedores ?? [];
$repuesto = $repuesto ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Repuesto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow" style="max-width:700px; margin:auto;">

            <div class="card-header bg-warning text-dark">
                <h3 class="mb-0">
                    <i class="bi bi-pencil-square"></i>
                    Editar Repuesto
                </h3>
            </div>

            <div class="card-body">

                <form action="index.php?url=repuestos/actualizar" method="POST">

                    <input
                        type="hidden"
                        name="id_repuesto"
                        value="<?= $repuesto['id_repuesto'] ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Nombre
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            class="form-control"
                            value="<?= $repuesto['nombre'] ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Marca
                        </label>

                        <input
                            type="text"
                            name="marca"
                            class="form-control"
                            value="<?= $repuesto['marca'] ?>"
                            required>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">
                                Precio
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                min="0"
                                name="precio"
                                class="form-control"
                                value="<?= $repuesto['precio'] ?>"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">
                                Stock
                            </label>

                            <input
                                type="number"
                                min="0"
                                name="stock"
                                class="form-control"
                                value="<?= $repuesto['stock'] ?>"
                                required>

                        </div>

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Proveedor
                        </label>

                        <select
                            name="proveedor_id"
                            class="form-select"
                            required>

                            <?php foreach ($proveedores as $p): ?>

                                <option
                                    value="<?= $p['id_proveedor'] ?>"
                                    <?= ($p['id_proveedor'] == $repuesto['proveedor_id']) ? 'selected' : '' ?>>

                                    <?= $p['nombre'] ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="text-end">

                        <a
                            href="index.php?url=repuestos/listar"
                            class="btn btn-secondary me-2">

                            Cancelar

                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-arrow-clockwise"></i>

                            Actualizar Repuesto

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
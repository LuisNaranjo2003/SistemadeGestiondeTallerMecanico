<?php
$proveedor = $proveedor ?? null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-warning">

                    <h3 class="mb-0">
                        <i class="bi bi-pencil-square"></i>
                        Editar Proveedor
                    </h3>

                </div>

                <div class="card-body">

                    <?php if (!$proveedor): ?>

                        <div class="alert alert-danger">

                            El proveedor no existe.

                        </div>

                        <a href="index.php?url=proveedores/listar"
                           class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>
                            Volver

                        </a>

                    <?php else: ?>

                    <form method="POST"
                          action="index.php?url=proveedores/actualizar">

                        <input
                            type="hidden"
                            name="id_proveedor"
                            value="<?= htmlspecialchars($proveedor["id_proveedor"]) ?>">

                        <div class="mb-3">

                            <label class="form-label">Nombre de la Empresa</label>

                            <input
                                type="text"
                                name="nombre_empresa"
                                class="form-control"
                                value="<?= htmlspecialchars($proveedor["nombre_empresa"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Contacto</label>

                            <input
                                type="text"
                                name="contacto"
                                class="form-control"
                                value="<?= htmlspecialchars($proveedor["contacto"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">RUC</label>

                            <input
                                type="text"
                                name="ruc"
                                class="form-control"
                                maxlength="13"
                                value="<?= htmlspecialchars($proveedor["ruc"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Teléfono</label>

                            <input
                                type="text"
                                name="telefono"
                                class="form-control"
                                maxlength="10"
                                value="<?= htmlspecialchars($proveedor["telefono"]) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Correo</label>

                            <input
                                type="email"
                                name="correo"
                                class="form-control"
                                value="<?= htmlspecialchars($proveedor["correo"]) ?>"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Dirección</label>

                            <textarea
                                name="direccion"
                                class="form-control"
                                rows="3"
                                required><?= htmlspecialchars($proveedor["direccion"]) ?></textarea>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php?url=proveedores/listar"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Volver

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="bi bi-save"></i>
                                Actualizar Proveedor

                            </button>

                        </div>

                    </form>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

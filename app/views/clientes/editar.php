<?php
$cliente = $cliente ?? null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>

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
                            Editar Cliente
                        </h3>

                    </div>

                    <div class="card-body">
                        <?php if (isset($_GET["error"])): ?>

                            <?php if ($_GET["error"] == "correo"): ?>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                    El correo electrónico ya se encuentra registrado.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>

                            <?php elseif ($_GET["error"] == "cedula"): ?>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                    La cédula ya se encuentra registrada.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>

                            <?php endif; ?>

                        <?php endif; ?>

                        <?php if (!$cliente): ?>

                            <div class="alert alert-danger">

                                El cliente no existe.

                            </div>

                            <a href="index.php?url=clientes/listar"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Volver

                            </a>

                        <?php else: ?>

                            <form method="POST"
                                action="index.php?url=clientes/actualizar">

                                <input
                                    type="hidden"
                                    name="id_cliente"
                                    value="<?= htmlspecialchars($cliente["id_cliente"]) ?>">

                                <div class="mb-3">

                                    <label class="form-label">Nombres</label>

                                    <input
                                        type="text"
                                        name="nombres"
                                        class="form-control"
                                        value="<?= htmlspecialchars($cliente["nombres"]) ?>"
                                        required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Apellidos</label>

                                    <input
                                        type="text"
                                        name="apellidos"
                                        class="form-control"
                                        value="<?= htmlspecialchars($cliente["apellidos"]) ?>"
                                        required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Cédula</label>

                                    <input
                                        type="text"
                                        name="cedula"
                                        class="form-control"
                                        maxlength="10"
                                        value="<?= htmlspecialchars($cliente["cedula"]) ?>"
                                        required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Teléfono</label>

                                    <input
                                        type="text"
                                        name="telefono"
                                        class="form-control"
                                        maxlength="10"
                                        value="<?= htmlspecialchars($cliente["telefono"]) ?>"
                                        required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Correo</label>

                                    <input
                                        type="email"
                                        name="correo"
                                        class="form-control"
                                        value="<?= htmlspecialchars($cliente["correo"]) ?>"
                                        required>

                                </div>

                                <div class="mb-4">

                                    <label class="form-label">Dirección</label>

                                    <textarea
                                        name="direccion"
                                        class="form-control"
                                        rows="3"
                                        required><?= htmlspecialchars($cliente["direccion"]) ?></textarea>

                                </div>

                                <div class="d-flex justify-content-between">

                                    <a href="index.php?url=clientes/listar"
                                        class="btn btn-secondary">

                                        <i class="bi bi-arrow-left"></i>
                                        Volver

                                    </a>

                                    <button
                                        type="submit"
                                        class="btn btn-warning">

                                        <i class="bi bi-save"></i>
                                        Actualizar Cliente

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
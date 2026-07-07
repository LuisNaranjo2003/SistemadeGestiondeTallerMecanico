<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Servicio</title>

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

                        <i class="bi bi-tools"></i>

                        Registrar Servicio

                    </h3>

                </div>

                <div class="card-body">

                    <form method="POST"
                          action="index.php?url=servicios/crear">

                        <div class="mb-3">

                            <label class="form-label">
                                Nombre del Servicio
                            </label>

                            <input
                                type="text"
                                name="nombre_servicio"
                                class="form-control"
                                placeholder="Ejemplo: Cambio de aceite"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Descripción
                            </label>

                            <textarea
                                name="descripcion"
                                rows="4"
                                class="form-control"
                                placeholder="Descripción del servicio..."
                                required></textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Precio ($)
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="precio"
                                class="form-control"
                                placeholder="0.00"
                                required>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php?url=servicios/listar"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>

                                Volver

                            </a>

                            <button
                                type="submit"
                                class="btn btn-success">

                                <i class="bi bi-save"></i>

                                Guardar Servicio

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
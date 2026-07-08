<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mecánico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-danger text-white">

                    <h3 class="mb-0">
                        <i class="bi bi-person-badge-fill"></i>
                        Registrar Mecánico
                    </h3>

                </div>

                <div class="card-body">

                    <form method="POST" action="index.php?url=mecanicos/crear">

                        <div class="mb-3">

                            <label class="form-label">Nombres</label>

                            <input
                                type="text"
                                name="nombres"
                                class="form-control"
                                placeholder="Ingrese los nombres"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Apellidos</label>

                            <input
                                type="text"
                                name="apellidos"
                                class="form-control"
                                placeholder="Ingrese los apellidos"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Especialidad</label>

                            <input
                                type="text"
                                name="especialidad"
                                class="form-control"
                                placeholder="Ejemplo: Mecánica General"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Teléfono Celular</label>

                            <input
                                type="text"
                                name="telefono"
                                class="form-control"
                                placeholder="0999999999"
                                maxlength="10"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Correo Electrónico</label>

                            <input
                                type="email"
                                name="correo"
                                class="form-control"
                                placeholder="correo@ejemplo.com"
                                required>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php?url=mecanicos/listar"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Volver

                            </a>

                            <button
                                type="submit"
                                class="btn btn-danger">

                                <i class="bi bi-save"></i>
                                Guardar Mecánico

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
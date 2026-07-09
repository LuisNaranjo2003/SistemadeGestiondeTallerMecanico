<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proveedor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h3 class="mb-0">
                        <i class="bi bi-truck"></i>
                        Registrar Proveedor
                    </h3>

                </div>

                <div class="card-body">

                    <form method="POST" action="index.php?url=proveedores/crear">

                        <div class="mb-3">

                            <label class="form-label">Nombre de la Empresa</label>

                            <input
                                type="text"
                                name="nombre_empresa"
                                class="form-control"
                                placeholder="Ingrese el nombre de la empresa"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Contacto</label>

                            <input
                                type="text"
                                name="contacto"
                                class="form-control"
                                placeholder="Nombre de la persona de contacto"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">RUC</label>

                            <input
                                type="text"
                                name="ruc"
                                class="form-control"
                                placeholder="Ingrese el RUC"
                                maxlength="13"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Teléfono</label>

                            <input
                                type="text"
                                name="telefono"
                                class="form-control"
                                placeholder="09xxxxxxxx"
                                maxlength="10"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Correo</label>

                            <input
                                type="email"
                                name="correo"
                                class="form-control"
                                placeholder="correo@ejemplo.com"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">Dirección</label>

                            <textarea
                                name="direccion"
                                class="form-control"
                                rows="3"
                                placeholder="Ingrese la dirección"
                                required></textarea>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php?url=proveedores/listar"
                               class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Volver

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="bi bi-save"></i>
                                Guardar Proveedor

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

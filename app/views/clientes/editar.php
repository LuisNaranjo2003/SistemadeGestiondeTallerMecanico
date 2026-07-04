<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>
                <i class="bi bi-pencil-square"></i>
                Editar Cliente
            </h4>
        </div>

        <div class="card-body">

            <form action="index.php?controller=cliente&action=actualizar" method="POST">

                <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente']; ?>">

                <div class="mb-3">
                    <label>Nombres</label>
                    <input type="text" name="nombres" class="form-control"
                           value="<?= $cliente['nombres']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" class="form-control"
                           value="<?= $cliente['apellidos']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Cédula</label>
                    <input type="text" name="cedula" class="form-control" maxlength="10"
                           value="<?= $cliente['cedula']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control"
                           value="<?= $cliente['telefono']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control"
                           value="<?= $cliente['correo']; ?>" required>
                </div>

                <div class="d-flex justify-content-between">

                    <a href="index.php?controller=cliente&action=index" class="btn btn-secondary">
                        Volver
                    </a>

                    <button class="btn btn-primary">
                        Actualizar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
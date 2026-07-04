<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-danger">

        <div class="card-header bg-danger text-white">
            <h4>
                <i class="bi bi-trash-fill"></i>
                Eliminar Cliente
            </h4>
        </div>

        <div class="card-body">

            <div class="alert alert-warning">

                <h5>¿Estás seguro que deseas eliminar este cliente?</h5>

                <hr>

                <p><strong>Nombres:</strong> <?= $cliente['nombres']; ?></p>
                <p><strong>Apellidos:</strong> <?= $cliente['apellidos']; ?></p>
                <p><strong>Cédula:</strong> <?= $cliente['cedula']; ?></p>
                <p><strong>Teléfono:</strong> <?= $cliente['telefono']; ?></p>

            </div>

            <form action="index.php?controller=cliente&action=eliminar" method="POST">

                <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente']; ?>">

                <div class="d-flex justify-content-between">

                    <a href="index.php?controller=cliente&action=index" class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                        Eliminar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>

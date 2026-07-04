<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-info text-white">
            <h4>
                <i class="bi bi-eye-fill"></i>
                Detalle del Cliente
            </h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <td><?= $cliente['id_cliente']; ?></td>
                </tr>

                <tr>
                    <th>Nombres</th>
                    <td><?= $cliente['nombres']; ?></td>
                </tr>

                <tr>
                    <th>Apellidos</th>
                    <td><?= $cliente['apellidos']; ?></td>
                </tr>

                <tr>
                    <th>Cédula</th>
                    <td><?= $cliente['cedula']; ?></td>
                </tr>

                <tr>
                    <th>Teléfono</th>
                    <td><?= $cliente['telefono']; ?></td>
                </tr>

                <tr>
                    <th>Correo</th>
                    <td><?= $cliente['correo']; ?></td>
                </tr>

            </table>

            <div class="d-flex justify-content-between">

                <a href="index.php?controller=cliente&action=index" class="btn btn-secondary">
                    Volver
                </a>

                <div>

                    <a href="index.php?controller=cliente&action=editar&id=<?= $cliente['id_cliente']; ?>"
                       class="btn btn-warning">
                        Editar
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
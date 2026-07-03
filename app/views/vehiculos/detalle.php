<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle Vehículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-info text-white">
            <h4>
                <i class="bi bi-eye-fill"></i>
                Detalle del Vehículo
            </h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <td><?= $vehiculo['id_vehiculo']; ?></td>
                </tr>

                <tr>
                    <th>Placa</th>
                    <td><?= $vehiculo['placa']; ?></td>
                </tr>

                <tr>
                    <th>Marca</th>
                    <td><?= $vehiculo['marca']; ?></td>
                </tr>

                <tr>
                    <th>Modelo</th>
                    <td><?= $vehiculo['modelo']; ?></td>
                </tr>

                <tr>
                    <th>Año</th>
                    <td><?= $vehiculo['anio']; ?></td>
                </tr>

                <tr>
                    <th>Color</th>
                    <td><?= $vehiculo['color']; ?></td>
                </tr>

                <tr>
                    <th>Cliente</th>
                    <td><?= $vehiculo['cliente']; ?></td>
                </tr>

            </table>

            <div class="d-flex justify-content-between">

                <a href="index.php?controller=vehiculo&action=index" class="btn btn-secondary">
                    Volver
                </a>

                <div>

                    <a href="index.php?controller=vehiculo&action=editar&id=<?= $vehiculo['id_vehiculo']; ?>"
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
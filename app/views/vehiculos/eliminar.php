<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar Vehículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow border-danger">

        <div class="card-header bg-danger text-white">
            <h4>
                <i class="bi bi-trash-fill"></i>
                Eliminar Vehículo
            </h4>
        </div>

        <div class="card-body">

            <div class="alert alert-warning">

                <h5>¿Estás seguro que deseas eliminar este vehículo?</h5>

                <hr>

                <p><strong>Placa:</strong> <?= $vehiculo['placa']; ?></p>
                <p><strong>Marca:</strong> <?= $vehiculo['marca']; ?></p>
                <p><strong>Modelo:</strong> <?= $vehiculo['modelo']; ?></p>
                <p><strong>Año:</strong> <?= $vehiculo['anio']; ?></p>
                <p><strong>Color:</strong> <?= $vehiculo['color']; ?></p>

            </div>

            <form action="index.php?controller=vehiculo&action=eliminar" method="POST">

                <input type="hidden" name="id_vehiculo" value="<?= $vehiculo['id_vehiculo']; ?>">

                <div class="d-flex justify-content-between">

                    <a href="index.php?controller=vehiculo&action=index" class="btn btn-secondary">
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
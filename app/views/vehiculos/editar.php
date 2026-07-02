<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Vehículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>
                <i class="bi bi-pencil-square"></i>
                Editar Vehículo
            </h4>
        </div>

        <div class="card-body">

            <form action="index.php?controller=vehiculo&action=actualizar" method="POST">

                <input type="hidden" name="id_vehiculo" value="<?= $vehiculo['id_vehiculo']; ?>">

                <div class="mb-3">
                    <label>Placa</label>
                    <input type="text" name="placa" class="form-control"
                           value="<?= $vehiculo['placa']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Marca</label>
                    <input type="text" name="marca" class="form-control"
                           value="<?= $vehiculo['marca']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Modelo</label>
                    <input type="text" name="modelo" class="form-control"
                           value="<?= $vehiculo['modelo']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Año</label>
                    <input type="number" name="anio" class="form-control"
                           value="<?= $vehiculo['anio']; ?>"
                           min="1980" max="<?= date('Y'); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control"
                           value="<?= $vehiculo['color']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Cliente</label>
                    <select name="cliente_id" class="form-control" required>

                        <?php while($c = $clientes->fetch_assoc()){ ?>

                            <option value="<?= $c['id_cliente']; ?>"
                                <?= ($c['id_cliente'] == $vehiculo['cliente_id']) ? 'selected' : ''; ?>>

                                <?= $c['cliente']; ?>

                            </option>

                        <?php } ?>

                    </select>
                </div>

                <div class="d-flex justify-content-between">

                    <a href="index.php?controller=vehiculo&action=index" class="btn btn-secondary">
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
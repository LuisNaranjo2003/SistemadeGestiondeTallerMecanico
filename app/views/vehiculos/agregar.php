<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar Vehículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h4>
                <i class="bi bi-car-front-fill"></i>
                Agregar Vehículo
            </h4>
        </div>

        <div class="card-body">

            <form action="index.php?controller=vehiculo&action=guardar" method="POST">

                <div class="mb-3">
                    <label>Placa</label>
                    <input type="text" name="placa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Marca</label>
                    <input type="text" name="marca" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Modelo</label>
                    <input type="text" name="modelo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Año</label>
                    <input type="number" name="anio" class="form-control" min="1980" max="<?= date('Y'); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Cliente</label>
                    <select name="cliente_id" class="form-control" required>
                        <option value="">Seleccione un cliente</option>

                        <?php while($c = $clientes->fetch_assoc()){ ?>
                            <option value="<?= $c['id_cliente']; ?>">
                                <?= $c['cliente']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="d-flex justify-content-between">

                    <a href="index.php?controller=vehiculo&action=index" class="btn btn-secondary">
                        Volver
                    </a>

                    <button class="btn btn-success">
                        Guardar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
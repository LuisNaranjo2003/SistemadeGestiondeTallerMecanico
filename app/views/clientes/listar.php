<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">
                <i class="bi bi-people-fill"></i>
                Gestión de Clientes
            </h3>

            <a href="index.php?controller=cliente&action=crear" class="btn btn-success">
                <i class="bi bi-plus-circle"></i>
                Nuevo Cliente
            </a>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped text-center align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th width="180">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                <?php if($clientes->num_rows > 0){ ?>

                    <?php while($fila = $clientes->fetch_assoc()){ ?>

                    <tr>

                        <td><?= $fila['id_cliente']; ?></td>

                        <td><?= $fila['nombres']; ?></td>

                        <td><?= $fila['apellidos']; ?></td>

                        <td><?= $fila['cedula']; ?></td>

                        <td><?= $fila['telefono']; ?></td>

                        <td><?= $fila['correo']; ?></td>

                        <td>

                            <!-- Ver -->
                            <a href="index.php?controller=cliente&action=detalle&id=<?= $fila['id_cliente']; ?>"
                               class="btn btn-info btn-sm"
                               title="Ver">

                                <i class="bi bi-eye-fill"></i>

                            </a>

                            <!-- Editar -->
                            <a href="index.php?controller=cliente&action=editar&id=<?= $fila['id_cliente']; ?>"
                               class="btn btn-warning btn-sm"
                               title="Editar">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <!-- Eliminar -->
                            <a href="index.php?controller=cliente&action=eliminar&id=<?= $fila['id_cliente']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Está seguro de eliminar este cliente?')"
                               title="Eliminar">

                                <i class="bi bi-trash-fill"></i>

                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                <?php }else{ ?>

                    <tr>

                        <td colspan="7">

                            <div class="alert alert-warning mb-0">

                                <i class="bi bi-exclamation-triangle-fill"></i>

                                No existen clientes registrados.

                            </div>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/booststrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4>
                    <i class="bi bi-person-plus-fill"></i>
                    Agregar Cliente
                </h4>
            </div>
            <div class="card-body">
                <form action="index.php?controller=cliente&action=guardar" method="post">
                     <div class="mb-3">
                    <label>Nombres</label>
                    <input type="text" name="nombres" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Cédula</label>
                    <input type="text" name="cedula" class="form-control" maxlength="10" required>
                </div>

                <div class="mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">

                    <a href="index.php?controller=cliente&action=index" class="btn btn-secondary">
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
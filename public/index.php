<?php

$url = $_GET["url"] ?? "";

if ($url == "") {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Taller Mecánico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#f5f7fb;
        }

        .card-menu{
            transition:.3s;
            border:none;
            border-radius:18px;
        }

        .card-menu:hover{
            transform:translateY(-8px);
            box-shadow:0 .8rem 2rem rgba(0,0,0,.15);
        }

        .icono{
            font-size:70px;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

    <div class="container">

        <span class="navbar-brand">

            <i class="bi bi-tools"></i>

            Sistema de Gestión de Taller Mecánico

        </span>

    </div>

</nav>

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">

            Bienvenido

        </h1>

        <p class="text-muted">

            Seleccione el módulo al que desea ingresar.

        </p>

    </div>

    <div class="row g-4 justify-content-center">

        <!-- Vehículos -->

        <div class="col-md-5">

            <div class="card card-menu shadow">

                <div class="card-body text-center p-5">

                    <i class="bi bi-car-front-fill text-primary icono"></i>

                    <h3 class="mt-3">

                        Vehículos

                    </h3>

                    <p class="text-muted">

                        Registrar, editar y eliminar vehículos.

                    </p>

                    <a href="index.php?url=vehiculos/listar"
                       class="btn btn-primary">

                        <i class="bi bi-arrow-right-circle"></i>

                        Ingresar

                    </a>

                </div>

            </div>

        </div>

        <!-- Clientes -->

        <div class="col-md-5">

            <div class="card card-menu shadow">

                <div class="card-body text-center p-5">

                    <i class="bi bi-people-fill text-success icono"></i>

                    <h3 class="mt-3">

                        Clientes

                    </h3>

                    <p class="text-muted">

                        Registrar y administrar clientes.

                    </p>

                    <a href="index.php?url=clientes/listar"
                       class="btn btn-success">

                        <i class="bi bi-arrow-right-circle"></i>

                        Ingresar

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>

<?php
exit;
}

/* ===========================
   RUTAS DEL SISTEMA
===========================*/

switch($url){

    /* VEHÍCULOS */

    case "vehiculos/listar":
        require_once __DIR__."/../app/controllers/VehiculosController.php";
        (new VehiculoController())->listar();
        break;

    case "vehiculos/crearForm":
        require_once __DIR__."/../app/controllers/VehiculosController.php";
        (new VehiculoController())->crearForm();
        break;

    case "vehiculos/crear":
        require_once __DIR__."/../app/controllers/VehiculosController.php";
        (new VehiculoController())->crear();
        break;

    case "vehiculos/editarForm":
        require_once __DIR__."/../app/controllers/VehiculosController.php";
        (new VehiculoController())->editarForm();
        break;

    case "vehiculos/actualizar":
        require_once __DIR__."/../app/controllers/VehiculosController.php";
        (new VehiculoController())->actualizar();
        break;

    case "vehiculos/eliminar":
        require_once __DIR__."/../app/controllers/VehiculosController.php";
        (new VehiculoController())->eliminar();
        break;


    /* CLIENTES */

    case "clientes/listar":
        require_once __DIR__."/../app/controllers/ClientesController.php";
        (new ClienteController())->listar();
        break;

    case "clientes/crearForm":
        require_once __DIR__."/../app/controllers/ClientesController.php";
        (new ClienteController())->crearForm();
        break;

    case "clientes/crear":
        require_once __DIR__."/../app/controllers/ClientesController.php";
        (new ClienteController())->crear();
        break;

    case "clientes/editarForm":
        require_once __DIR__."/../app/controllers/ClientesController.php";
        (new ClienteController())->editarForm();
        break;

    case "clientes/actualizar":
        require_once __DIR__."/../app/controllers/ClientesController.php";
        (new ClienteController())->actualizar();
        break;

    case "clientes/eliminar":
        require_once __DIR__."/../app/controllers/ClientesController.php";
        (new ClienteController())->eliminar();
        break;

    default:

        http_response_code(404);

        echo "<h2 class='text-center mt-5'>404 - Ruta no encontrada</h2>";

}
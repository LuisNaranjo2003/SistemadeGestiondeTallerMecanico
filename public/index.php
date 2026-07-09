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
            body {
                background: #f5f7fb;
            }

            .card-menu {
                transition: .3s;
                border: none;
                border-radius: 18px;
            }

            .card-menu:hover {
                transform: translateY(-8px);
                box-shadow: 0 .8rem 2rem rgba(0, 0, 0, .15);
            }

            .icono {
                font-size: 70px;
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
                <div class="col-md-5">

                    <div class="card card-menu shadow">

                        <div class="card-body text-center p-5">

                            <i class="bi bi-tools text-warning icono"></i>

                            <h3 class="mt-3">
                                Servicios
                            </h3>

                            <p class="text-muted">
                                Registrar y administrar servicios del taller.
                            </p>

                            <a href="index.php?url=servicios/listar"
                                class="btn btn-warning text-white">

                                <i class="bi bi-arrow-right-circle"></i>

                                Ingresar

                            </a>

                        </div>

                    </div>

                </div>

                <div class="col-md-5">

                    <div class="card card-menu shadow">

                        <div class="card-body text-center p-5">

                            <i class="bi bi-person-badge-fill text-danger icono"></i>

                            <h3 class="mt-3">
                                Mecánicos
                            </h3>

                            <p class="text-muted">
                                Registrar y administrar mecánicos del taller.
                            </p>

                            <a href="index.php?url=mecanicos/listar"
                                class="btn btn-danger">

                                <i class="bi bi-arrow-right-circle"></i>

                                Ingresar

                            </a>

                        </div>

                    </div>

                </div>
                
                <div class="col-md-5">

                    <div class="card card-menu shadow">

                        <div class="card-body text-center p-5">

                            <i class="bi bi-clipboard-check-fill text-secondary icono"></i>

                            <h3 class="mt-3">
                                Órdenes de Trabajo
                            </h3>

                            <p class="text-muted">
                                Registrar y administrar órdenes de trabajo del taller.
                            </p>

                            <a href="index.php?url=ordenes/listar"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-right-circle"></i>

                                Ingresar

                            </a>

                        </div>

                    </div>

                </div>

                <div class="col-md-5">

                    <div class="card card-menu shadow">

                        <div class="card-body text-center p-5">

                            <i class="bi bi-calendar-check-fill text-info icono"></i>

                            <h3 class="mt-3">
                                Citas
                            </h3>

                            <p class="text-muted">
                                Agendar y administrar citas del taller.
                            </p>

                            <a href="index.php?url=citas/listar"
                                class="btn btn-info text-white">

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

switch ($url) {

    case "vehiculos/listar":
        require_once __DIR__ . "/../app/controllers/VehiculosController.php";
        (new VehiculoController())->listar();
        break;

    case "vehiculos/crearForm":
        require_once __DIR__ . "/../app/controllers/VehiculosController.php";
        (new VehiculoController())->crearForm();
        break;

    case "vehiculos/crear":
        require_once __DIR__ . "/../app/controllers/VehiculosController.php";
        (new VehiculoController())->crear();
        break;

    case "vehiculos/editarForm":
        require_once __DIR__ . "/../app/controllers/VehiculosController.php";
        (new VehiculoController())->editarForm();
        break;

    case "vehiculos/actualizar":
        require_once __DIR__ . "/../app/controllers/VehiculosController.php";
        (new VehiculoController())->actualizar();
        break;

    case "vehiculos/eliminar":
        require_once __DIR__ . "/../app/controllers/VehiculosController.php";
        (new VehiculoController())->eliminar();
        break;

    case "clientes/listar":
        require_once __DIR__ . "/../app/controllers/ClientesController.php";
        (new ClienteController())->listar();
        break;

    case "clientes/crearForm":
        require_once __DIR__ . "/../app/controllers/ClientesController.php";
        (new ClienteController())->crearForm();
        break;

    case "clientes/crear":
        require_once __DIR__ . "/../app/controllers/ClientesController.php";
        (new ClienteController())->crear();
        break;

    case "clientes/editarForm":
        require_once __DIR__ . "/../app/controllers/ClientesController.php";
        (new ClienteController())->editarForm();
        break;

    case "clientes/actualizar":
        require_once __DIR__ . "/../app/controllers/ClientesController.php";
        (new ClienteController())->actualizar();
        break;

    case "clientes/eliminar":
        require_once __DIR__ . "/../app/controllers/ClientesController.php";
        (new ClienteController())->eliminar();
        break;

    case "servicios/listar":
        require_once __DIR__ . "/../app/controllers/ServiciosController.php";
        (new ServicioController())->listar();
        break;

    case "servicios/crearForm":
        require_once __DIR__ . "/../app/controllers/ServiciosController.php";
        (new ServicioController())->crearForm();
        break;

    case "servicios/crear":
        require_once __DIR__ . "/../app/controllers/ServiciosController.php";
        (new ServicioController())->crear();
        break;

    case "servicios/editarForm":
        require_once __DIR__ . "/../app/controllers/ServiciosController.php";
        (new ServicioController())->editarForm();
        break;

    case "servicios/actualizar":
        require_once __DIR__ . "/../app/controllers/ServiciosController.php";
        (new ServicioController())->actualizar();
        break;

    case "servicios/eliminar":
        require_once __DIR__ . "/../app/controllers/ServiciosController.php";
        (new ServicioController())->eliminar();
        break;

    case "mecanicos/listar":
        require_once __DIR__ . "/../app/controllers/MecanicosController.php";
        (new MecanicoController())->listar();
        break;

    case "mecanicos/crearForm":
        require_once __DIR__ . "/../app/controllers/MecanicosController.php";
        (new MecanicoController())->crearForm();
        break;

    case "mecanicos/crear":
        require_once __DIR__ . "/../app/controllers/MecanicosController.php";
        (new MecanicoController())->crear();
        break;

    case "mecanicos/editarForm":
        require_once __DIR__ . "/../app/controllers/MecanicosController.php";
        (new MecanicoController())->editarForm();
        break;

    case "mecanicos/actualizar":
        require_once __DIR__ . "/../app/controllers/MecanicosController.php";
        (new MecanicoController())->actualizar();
        break;

    case "mecanicos/eliminar":
        require_once __DIR__ . "/../app/controllers/MecanicosController.php";
        (new MecanicoController())->eliminar();
        break;

    case "ordenes/listar":
        require_once __DIR__ . "/../app/controllers/OrdenesController.php";
        (new OrdenesController())->listar();
        break;

    case "ordenes/crearForm":
        require_once __DIR__ . "/../app/controllers/OrdenesController.php";
        (new OrdenesController())->crearForm();
        break;

    case "ordenes/crear":
        require_once __DIR__ . "/../app/controllers/OrdenesController.php";
        (new OrdenesController())->crear();
        break;

    case "ordenes/editarForm":
        require_once __DIR__ . "/../app/controllers/OrdenesController.php";
        (new OrdenesController())->editarForm();
        break;

    case "ordenes/actualizar":
        require_once __DIR__ . "/../app/controllers/OrdenesController.php";
        (new OrdenesController())->actualizar();
        break;

    case "ordenes/eliminar":
        require_once __DIR__ . "/../app/controllers/OrdenesController.php";
        (new OrdenesController())->eliminar();
        break;

    case "citas/listar":
        require_once __DIR__ . "/../app/controllers/CitasController.php";
        (new CitasController())->listar();
        break;

    case "citas/crearForm":
        require_once __DIR__ . "/../app/controllers/CitasController.php";
        (new CitasController())->crearForm();
        break;

    case "citas/crear":
        require_once __DIR__ . "/../app/controllers/CitasController.php";
        (new CitasController())->crear();
        break;

    case "citas/editarForm":
        require_once __DIR__ . "/../app/controllers/CitasController.php";
        (new CitasController())->editarForm();
        break;

    case "citas/actualizar":
        require_once __DIR__ . "/../app/controllers/CitasController.php";
        (new CitasController())->actualizar();
        break;

    case "citas/eliminar":
        require_once __DIR__ . "/../app/controllers/CitasController.php";
        (new CitasController())->eliminar();
        break;

    default:

        http_response_code(404);

        echo "<h2 class='text-center mt-5'>404 - Ruta no encontrada</h2>";
}
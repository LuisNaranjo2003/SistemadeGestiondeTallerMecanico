<?php

$url = $_GET["url"] ?? "vehiculos/listar";

switch ($url) {
    case "vehiculos/listar":
        require_once "../app/controllers/VehiculoController.php";
        $controller = new VehiculoController();
        $controller->index();
        break;

    case "vehiculos/crearForm":
        require_once "../app/controllers/VehiculoController.php";
        $controller = new VehiculoController();
        $controller->crear();
        break;

    case "vehiculos/crear":
        require_once "../app/controllers/VehiculoController.php";
        $controller = new VehiculoController();
        $controller->guardar();
        break;

    case "vehiculos/editarForm":
        require_once "../app/controllers/VehiculoController.php";
        $controller = new VehiculoController();
        $controller->editar();
        break;

    case "vehiculos/actualizar":
        require_once "../app/controllers/VehiculoController.php";
        $controller = new VehiculoController();
        $controller->actualizar();
        break;

    case "vehiculos/detalle":
        require_once "../app/controllers/VehiculoController.php";
        $controller = new VehiculoController();
        $controller->detalle();
        break;

    case "vehiculos/eliminar":
        require_once "../app/controllers/VehiculoController.php";
        $controller = new VehiculoController();
        $controller->eliminar();
        break;


    case "clientes/listar":
        require_once "../app/controllers/ClienteController.php";
        $controller = new ClienteController();
        $controller->index();
        break;

    case "clientes/crearForm":
        require_once "../app/controllers/ClienteController.php";
        $controller = new ClienteController();
        $controller->crear();
        break;

    case "clientes/crear":
        require_once "../app/controllers/ClienteController.php";
        $controller = new ClienteController();
        $controller->guardar();
        break;

    case "clientes/editarForm":
        require_once "../app/controllers/ClienteController.php";
        $controller = new ClienteController();
        $controller->editar();
        break;

    case "clientes/actualizar":
        require_once "../app/controllers/ClienteController.php";
        $controller = new ClienteController();
        $controller->actualizar();
        break;

    case "clientes/eliminar":
        require_once "../app/controllers/ClienteController.php";
        $controller = new ClienteController();
        $controller->eliminar();
        break;


    case "mecanicos/listar":
        require_once "../app/controllers/MecanicoController.php";
        $controller = new MecanicoController();
        $controller->index();
        break;

    case "servicios/listar":
        require_once "../app/controllers/ServicioController.php";
        $controller = new ServicioController();
        $controller->index();
        break;

    case "ordenes/listar":
        require_once "../app/controllers/OrdenController.php";
        $controller = new OrdenController();
        $controller->index();
        break;


    default:
        http_response_code(404);
        echo "<h2>404 - Ruta no encontrada</h2>";
        break;
}
<?php

require_once __DIR__ . "/../app/controllers/VehiculoController.php";

$url = $_GET["url"] ?? "vehiculos/listar";

$controller = new VehiculoController();

switch ($url) {

    case "vehiculos/listar":
        $controller->listar();
        break;

    case "vehiculos/crearForm":
        $controller->crearForm();
        break;

    case "vehiculos/crear":
        $controller->crear();
        break;

    case "vehiculos/editarForm":
        $controller->editarForm();
        break;

    case "vehiculos/actualizar":
        $controller->actualizar();
        break;

    case "vehiculos/eliminar":
        $controller->eliminar();
        break;

    default:
        http_response_code(404);
        echo "404 - Ruta no encontrada";
        break;
}
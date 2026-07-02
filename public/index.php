<?php

require_once "../app/controllers/VehiculoController.php";

$controller = new VehiculoController();

$action = $_GET["action"] ?? "index";

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Página no encontrada";
}
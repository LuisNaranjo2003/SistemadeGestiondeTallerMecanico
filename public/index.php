<?php

$controller = $_GET['controller'] ?? 'vehiculo';
$action = $_GET['action'] ?? 'index';

switch ($controller) {

    case 'vehiculo':
        require_once "../app/controllers/VehiculoController.php";
        $controller = new VehiculoController();
        break;

    case 'cliente':
        require_once "../app/controllers/ClienteController.php";
        $controller = new ClienteController();
        break;

    case 'mecanico':
        require_once "../app/controllers/MecanicoController.php";
        $controller = new MecanicoController();
        break;

    case 'servicio':
        require_once "../app/controllers/ServicioController.php";
        $controller = new ServicioController();
        break;

    case 'orden':
        require_once "../app/controllers/OrdenController.php";
        $controller = new OrdenController();
        break;

    default:
        die("Controlador no encontrado");
}

// Ejecutar acción si existe
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Acción no encontrada";
}
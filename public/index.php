<?php
require_once '../app/controllers/ServicioController.php';

$controller = new ServicioController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if (method_exists($controller, $action)) {
    $controller->{$action}();
} else {
    echo "Página no encontrada.";
}
?>
<?php
require_once __DIR__ . '/../models/Servicio.php';

class ServicioController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Servicio();
    }

    public function index() {
        $servicios = $this->modelo->obtenerTodos();
        require_once __DIR__ . '/../views/servicios/listar.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre_servicio'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];

            if ($this->modelo->registrar($nombre, $descripcion, $precio)) {
                header("Location: index.php?action=index");
            }
        } else {
            require_once __DIR__ . '/../views/servicios/agregar.php';
        }
    }

    public function detalle() {
        $id = $_GET['id'];
        $servicio = $this->modelo->obtenerPorId($id);
        require_once __DIR__ . '/../views/servicios/detalle.php';
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_servicio'];
            $nombre = $_POST['nombre_servicio'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];

            if ($this->modelo->actualizar($id, $nombre, $descripcion, $precio)) {
                header("Location: index.php?action=index");
            }
        } else {
            $id = $_GET['id'];
            $servicio = $this->modelo->obtenerPorId($id);
            require_once __DIR__ . '/../views/servicios/editar.php';
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_servicio'];
            if ($this->modelo->eliminar($id)) {
                header("Location: index.php?action=index");
            }
        } else {
            $id = $_GET['id'];
            $servicio = $this->modelo->obtenerPorId($id);
            require_once __DIR__ . '/../views/servicios/eliminar.php';
        }
    }
}
?>
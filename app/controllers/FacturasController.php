<?php

class FacturasController {

    private $modelo;

    public function __construct() {
        require_once __DIR__ . "/../models/Factura.php";
        $this->modelo = new Factura();
    }

    /**
     * Carga las facturas reales desde la base de datos y muestra la tabla
     */
    public function listar() {
        // Jalamos los registros guardados en la BD
        $facturas = $this->modelo->obtenerTodas();
        
        // Cargamos la vista de la tabla pasándole los datos
        require_once __DIR__ . "/../views/facturas/listar.php";
    }

    public function crear() {
        require_once __DIR__ . "/../views/facturas/crear.php";
    }

    /**
     * Procesa el formulario de registro de la nueva factura
     */
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orden_id = $_POST['orden_id'] ?? null;
            $fecha    = $_POST['fecha'] ?? date('Y-m-d');
            $subtotal = $_POST['subtotal'] ?? 0.0;
            $iva      = $_POST['iva'] ?? 0.0;
            $total    = $_POST['total'] ?? 0.0;

            if (!empty($orden_id)) {
                // Insertamos en la BD
                $inserto = $this->modelo->crear($orden_id, $fecha, $subtotal, $iva, $total);

                if ($inserto) {
                    header("Location: index.php?url=facturas/listar");
                    exit;
                } else {
                    echo "<script>alert('Error al intentar guardar en la base de datos.'); window.history.back();</script>";
                    exit;
                }
            } else {
                echo "<script>alert('Debe seleccionar una Orden de Trabajo.'); window.history.back();</script>";
                exit;
            }
        }
    }

    public function modificar() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            require_once __DIR__ . "/../views/facturas/modificar.php";
        }
    }

    public function actualizar() {
        header("Location: index.php?url=facturas/listar");
        exit;
    }

    public function eliminar() {
        header("Location: index.php?url=facturas/listar");
        exit;
    }
}
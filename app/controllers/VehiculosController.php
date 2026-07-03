<?php

require_once __DIR__ . "/../models/Vehiculo.php";

class VehiculoController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Vehiculo();
    }

    public function index()
    {
        $vehiculos = $this->modelo->listar();
        require_once __DIR__ . "/../views/vehiculos/listar.php";
    }

    public function crear()
    {
        $clientes = $this->modelo->listarClientes();
        require_once __DIR__ . "/../views/vehiculos/agregar.php";
    }

    public function guardar()
    {
        $this->modelo->registrar(
            $_POST["placa"],
            $_POST["marca"],
            $_POST["modelo"],
            $_POST["anio"],
            $_POST["color"],
            $_POST["cliente_id"]
        );

        header("Location: index.php?controller=vehiculo&action=index");
    }

    public function editar()
    {
        $vehiculo = $this->modelo->buscar($_GET["id"]);
        $clientes = $this->modelo->listarClientes();

        require_once __DIR__ . "/../views/vehiculos/editar.php";
    }

    public function actualizar()
    {
        $this->modelo->actualizar(
            $_POST["id_vehiculo"],
            $_POST["placa"],
            $_POST["marca"],
            $_POST["modelo"],
            $_POST["anio"],
            $_POST["color"],
            $_POST["cliente_id"]
        );

        header("Location: index.php?controller=vehiculo&action=index");
    }

    public function detalle()
    {
        $vehiculo = $this->modelo->buscar($_GET["id"]);
        require_once __DIR__ . "/../views/vehiculos/detalle.php";
    }

    public function eliminar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->modelo->eliminar($_POST["id_vehiculo"]);

            header("Location: index.php?controller=vehiculo&action=index");
        } else {

            $vehiculo = $this->modelo->buscar($_GET["id"]);
            require_once __DIR__ . "/../views/vehiculos/eliminar.php";
        }
    }
}
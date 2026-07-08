<?php

require_once __DIR__ . "/../models/Ordenes.php";

class OrdenesController
{
    private $model;

    public function __construct()
    {
        $this->model = new Ordenes();
    }

    public function listar()
    {
        $ordenes = $this->model->listarTodos();

        require __DIR__ . "/../views/ordenes/listar.php";
    }

    public function crearForm()
    {
        $errores = [];

        $vehiculos = $this->model->listarVehiculos();
        $mecanicos = $this->model->listarMecanicos();
        $servicios = $this->model->listarServicios();

        require __DIR__ . "/../views/ordenes/crear.php";
    }

    public function crear()
    {
        $datos = [

            "vehiculo_id"   => $_POST["vehiculo_id"] ?? "",
            "mecanico_id"   => $_POST["mecanico_id"] ?? "",
            "servicio_id"   => $_POST["servicio_id"] ?? "",
            "fecha"         => $_POST["fecha"] ?? "",
            "observaciones" => $_POST["observaciones"] ?? "",
            "estado"        => $_POST["estado"] ?? ""

        ];

        $this->model->crear($datos);

        header("Location: index.php?url=ordenes/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $orden = $this->model->obtenerPorId($id);

        $vehiculos = $this->model->listarVehiculos();
        $mecanicos = $this->model->listarMecanicos();
        $servicios = $this->model->listarServicios();

        require __DIR__ . "/../views/ordenes/editar.php";
    }

    public function actualizar()
    {
        $id = $_POST["id_orden"] ?? 0;

        $datos = [

            "vehiculo_id"   => $_POST["vehiculo_id"] ?? "",
            "mecanico_id"   => $_POST["mecanico_id"] ?? "",
            "servicio_id"   => $_POST["servicio_id"] ?? "",
            "fecha"         => $_POST["fecha"] ?? "",
            "observaciones" => $_POST["observaciones"] ?? "",
            "estado"        => $_POST["estado"] ?? ""

        ];

        $this->model->actualizar($id, $datos);

        header("Location: index.php?url=ordenes/listar");
        exit;
    }

    public function detalle()
    {
        $id = $_GET["id"] ?? 0;

        $orden = $this->model->obtenerDetalle($id);

        require __DIR__ . "/../views/ordenes/detalle.php";
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;

        $this->model->eliminar($id);

        header("Location: index.php?url=ordenes/listar");
        exit;
    }
}
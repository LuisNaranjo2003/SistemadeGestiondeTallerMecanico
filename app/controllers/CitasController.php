<?php
require_once __DIR__ . "/../models/Citas.php";
require_once __DIR__ . "/../models/Clientes.php";
require_once __DIR__ . "/../models/Vehiculos.php";

class CitasController
{
    public function listar()
    {
        $citas = Citas::obtenerTodos();
        require __DIR__ . "/../views/citas/listar.php";
    }

    public function crearForm()
    {
        $clientes = Clientes::obtenerTodos();
        $vehiculos = Vehiculos::obtenerTodos();
        require __DIR__ . "/../views/citas/crear.php";
    }

    public function crear()
    {
        $cliente_id  = $_POST["cliente_id"] ?? 0;
        $vehiculo_id = $_POST["vehiculo_id"] ?? 0;
        $fecha       = $_POST["fecha"] ?? "";
        $hora        = $_POST["hora"] ?? "";
        $estado      = $_POST["estado"] ?? "Pendiente";

        Citas::crear($cliente_id, $vehiculo_id, $fecha, $hora, $estado);
        header("Location: index.php?url=citas/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;
        $cita = Citas::obtenerPorId($id);
        $clientes = Clientes::obtenerTodos();
        $vehiculos = Vehiculos::obtenerTodos();
        require __DIR__ . "/../views/citas/editar.php";
    }

    public function actualizar()
    {
        $id          = $_POST["id_cita"] ?? 0;
        $cliente_id  = $_POST["cliente_id"] ?? 0;
        $vehiculo_id = $_POST["vehiculo_id"] ?? 0;
        $fecha       = $_POST["fecha"] ?? "";
        $hora        = $_POST["hora"] ?? "";
        $estado      = $_POST["estado"] ?? "Pendiente";

        Citas::actualizar($id, $cliente_id, $vehiculo_id, $fecha, $hora, $estado);
        header("Location: index.php?url=citas/listar");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;
        Citas::eliminar($id);
        header("Location: index.php?url=citas/listar");
        exit;
    }
}
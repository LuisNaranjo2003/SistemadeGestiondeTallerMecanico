<?php

require_once __DIR__ . "/../models/Vehiculo.php";

class VehiculoController
{
    public function listar()
    {
        $vehiculos = Vehiculo::obtenerTodos();
        require __DIR__ . "/../views/vehiculos/listar.php";
    }

    public function crearForm()
    {
        $clientes = Vehiculo::obtenerClientes();
        require __DIR__ . "/../views/vehiculos/crear.php";
    }

    public function crear()
    {
        $placa = $_POST["placa"] ?? "";
        $marca = $_POST["marca"] ?? "";
        $modelo = $_POST["modelo"] ?? "";
        $anio = $_POST["anio"] ?? "";
        $color = $_POST["color"] ?? "";
        $cliente_id = $_POST["cliente_id"] ?? 0;

        Vehiculo::crear(
            $placa,
            $marca,
            $modelo,
            $anio,
            $color,
            $cliente_id
        );

        header("Location: index.php?url=vehiculos/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $vehiculo = Vehiculo::obtenerPorId($id);
        $clientes = Vehiculo::obtenerClientes();

        require __DIR__ . "/../views/vehiculos/editar.php";
    }

    public function actualizar()
    {
        $id = $_POST["id_vehiculo"] ?? 0;
        $placa = $_POST["placa"] ?? "";
        $marca = $_POST["marca"] ?? "";
        $modelo = $_POST["modelo"] ?? "";
        $anio = $_POST["anio"] ?? "";
        $color = $_POST["color"] ?? "";
        $cliente_id = $_POST["cliente_id"] ?? 0;

        Vehiculo::actualizar(
            $id,
            $placa,
            $marca,
            $modelo,
            $anio,
            $color,
            $cliente_id
        );

        header("Location: index.php?url=vehiculos/listar");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;

        Vehiculo::eliminar($id);

        header("Location: index.php?url=vehiculos/listar");
        exit;
    }
}
<?php

require_once __DIR__ . "/../models/Servicios.php";

class ServicioController
{

    public function listar()
    {
        $servicios = Servicio::obtenerTodos();

        require __DIR__ . "/../views/servicios/listar.php";
    }

    public function crearForm()
    {
        require __DIR__ . "/../views/servicios/crear.php";
    }

    public function crear()
    {
        $nombre_servicio = $_POST["nombre_servicio"] ?? "";
        $descripcion     = $_POST["descripcion"] ?? "";
        $precio          = $_POST["precio"] ?? 0;

        Servicio::crear(
            $nombre_servicio,
            $descripcion,
            $precio
        );

        header("Location: index.php?url=servicios/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $servicio = Servicio::obtenerPorId($id);

        require __DIR__ . "/../views/servicios/editar.php";
    }

    public function actualizar()
    {
        $id               = $_POST["id_servicio"] ?? 0;
        $nombre_servicio  = $_POST["nombre_servicio"] ?? "";
        $descripcion      = $_POST["descripcion"] ?? "";
        $precio           = $_POST["precio"] ?? 0;

        Servicio::actualizar(
            $id,
            $nombre_servicio,
            $descripcion,
            $precio
        );

        header("Location: index.php?url=servicios/listar");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;

        Servicio::eliminar($id);

        header("Location: index.php?url=servicios/listar");
        exit;
    }

}
<?php

require_once __DIR__ . "/../models/Repuesto.php";

class RepuestoController
{
    public function listar()
    {
        $repuestos = Repuesto::obtenerTodos();
        require __DIR__ . "/../views/repuestos/listar.php";
    }

    public function crearForm()
    {
        $proveedores = Repuesto::obtenerProveedores();
        require __DIR__ . "/../views/repuestos/crear.php";
    }

    public function crear()
    {
        $nombre = $_POST["nombre"] ?? "";
        $marca = $_POST["marca"] ?? "";
        $precio = $_POST["precio"] ?? 0;
        $stock = $_POST["stock"] ?? 0;
        $proveedor_id = $_POST["proveedor_id"] ?? 0;

        Repuesto::crear(
            $nombre,
            $marca,
            $precio,
            $stock,
            $proveedor_id
        );

        header("Location: index.php?url=repuestos/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $repuesto = Repuesto::obtenerPorId($id);

        if (!$repuesto) {
            header("Location: index.php?url=repuestos/listar");
            exit;
        }

        $proveedores = Repuesto::obtenerProveedores();

        require __DIR__ . "/../views/repuestos/editar.php";
    }

    public function actualizar()
    {
        $id = $_POST["id_repuesto"] ?? 0;
        $nombre = $_POST["nombre"] ?? "";
        $marca = $_POST["marca"] ?? "";
        $precio = $_POST["precio"] ?? 0;
        $stock = $_POST["stock"] ?? 0;
        $proveedor_id = $_POST["proveedor_id"] ?? 0;

        Repuesto::actualizar(
            $id,
            $nombre,
            $marca,
            $precio,
            $stock,
            $proveedor_id
        );

        header("Location: index.php?url=repuestos/listar");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;

        $repuesto = Repuesto::obtenerPorId($id);

        if (!$repuesto) {
            header("Location: index.php?url=repuestos/listar");
            exit;
        }

        Repuesto::eliminar($id);

        header("Location: index.php?url=repuestos/listar");
        exit;
    }
}
<?php

require_once __DIR__ . "/../models/Proveedores.php";

class ProveedoresController
{
    public function listar()
    {
        $proveedores = Proveedores::obtenerTodos();
        require __DIR__ . "/../views/proveedores/listar.php";
    }

    public function crearForm()
    {
        require __DIR__ . "/../views/proveedores/crear.php";
    }

    public function crear()
    {
        $nombre_empresa = $_POST["nombre_empresa"] ?? "";
        $contacto       = $_POST["contacto"] ?? "";
        $ruc            = $_POST["ruc"] ?? "";
        $telefono       = $_POST["telefono"] ?? "";
        $correo         = $_POST["correo"] ?? "";
        $direccion      = $_POST["direccion"] ?? "";

        Proveedores::crear(
            $nombre_empresa,
            $contacto,
            $ruc,
            $telefono,
            $correo,
            $direccion
        );

        header("Location: index.php?url=proveedores/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $proveedor = Proveedores::obtenerPorId($id);

        require __DIR__ . "/../views/proveedores/editar.php";
    }

    public function actualizar()
    {
        $id             = $_POST["id_proveedor"] ?? 0;
        $nombre_empresa = $_POST["nombre_empresa"] ?? "";
        $contacto       = $_POST["contacto"] ?? "";
        $ruc            = $_POST["ruc"] ?? "";
        $telefono       = $_POST["telefono"] ?? "";
        $correo         = $_POST["correo"] ?? "";
        $direccion      = $_POST["direccion"] ?? "";

        Proveedores::actualizar(
            $id,
            $nombre_empresa,
            $contacto,
            $ruc,
            $telefono,
            $correo,
            $direccion
        );

        header("Location: index.php?url=proveedores/listar");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;

        Proveedores::eliminar($id);

        header("Location: index.php?url=proveedores/listar");
        exit;
    }
}

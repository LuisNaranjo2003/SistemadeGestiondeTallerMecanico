<?php

require_once __DIR__ . "/../models/Clientes.php";

class ClienteController
{
    public function listar()
    {
        $clientes = Clientes::obtenerTodos();
        require __DIR__ . "/../views/clientes/listar.php";
    }

    public function crearForm()
    {
        require __DIR__ . "/../views/clientes/crear.php";
    }

    public function crear()
    {
        $nombres   = $_POST["nombres"] ?? "";
        $apellidos = $_POST["apellidos"] ?? "";
        $cedula    = $_POST["cedula"] ?? "";
        $telefono  = $_POST["telefono"] ?? "";
        $correo    = $_POST["correo"] ?? "";
        $direccion = $_POST["direccion"] ?? "";

        Clientes::crear(
            $nombres,
            $apellidos,
            $cedula,
            $telefono,
            $correo,
            $direccion
        );

        header("Location: index.php?url=clientes/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $cliente = Clientes::obtenerPorId($id);

        require __DIR__ . "/../views/clientes/editar.php";
    }

    public function actualizar()
    {
        $id        = $_POST["id_cliente"] ?? 0;
        $nombres   = $_POST["nombres"] ?? "";
        $apellidos = $_POST["apellidos"] ?? "";
        $cedula    = $_POST["cedula"] ?? "";
        $telefono  = $_POST["telefono"] ?? "";
        $correo    = $_POST["correo"] ?? "";
        $direccion = $_POST["direccion"] ?? "";

        Clientes::actualizar(
            $id,
            $nombres,
            $apellidos,
            $cedula,
            $telefono,
            $correo,
            $direccion
        );

        header("Location: index.php?url=clientes/listar");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;

        Clientes::eliminar($id);

        header("Location: index.php?url=clientes/listar");
        exit;
    }
}
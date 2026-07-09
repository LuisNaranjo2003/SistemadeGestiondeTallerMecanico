<?php

require_once __DIR__ . "/../models/Clientes.php";

class ClientesController
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
        $nombres   = trim($_POST["nombres"] ?? "");
        $apellidos = trim($_POST["apellidos"] ?? "");
        $cedula    = trim($_POST["cedula"] ?? "");
        $telefono  = trim($_POST["telefono"] ?? "");
        $correo    = trim($_POST["correo"] ?? "");
        $direccion = trim($_POST["direccion"] ?? "");

        $resultado = Clientes::crear(
            $nombres,
            $apellidos,
            $cedula,
            $telefono,
            $correo,
            $direccion
        );

        if ($resultado === "correo") {
            header("Location: index.php?url=clientes/crearForm&error=correo");
            exit;
        }

        if ($resultado === "cedula") {
            header("Location: index.php?url=clientes/crearForm&error=cedula");
            exit;
        }

        header("Location: index.php?url=clientes/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $cliente = Clientes::obtenerPorId($id);

        if (!$cliente) {
            header("Location: index.php?url=clientes/listar");
            exit;
        }

        require __DIR__ . "/../views/clientes/editar.php";
    }

    public function actualizar()
    {
        $id        = $_POST["id_cliente"] ?? 0;
        $nombres   = trim($_POST["nombres"] ?? "");
        $apellidos = trim($_POST["apellidos"] ?? "");
        $cedula    = trim($_POST["cedula"] ?? "");
        $telefono  = trim($_POST["telefono"] ?? "");
        $correo    = trim($_POST["correo"] ?? "");
        $direccion = trim($_POST["direccion"] ?? "");

        $resultado = Clientes::actualizar(
            $id,
            $nombres,
            $apellidos,
            $cedula,
            $telefono,
            $correo,
            $direccion
        );

        if ($resultado === "correo") {
            header("Location: index.php?url=clientes/editarForm&id=$id&error=correo");
            exit;
        }

        if ($resultado === "cedula") {
            header("Location: index.php?url=clientes/editarForm&id=$id&error=cedula");
            exit;
        }

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
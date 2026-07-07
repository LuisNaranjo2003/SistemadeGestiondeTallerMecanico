<?php

require_once __DIR__ . "/../config/conexion.php";

class Cliente
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    id_cliente,
                    nombres,
                    apellidos,
                    cedula,
                    telefono,
                    correo,
                    direccion
                FROM clientes
                ORDER BY id_cliente DESC";

        $res = $conn->query($sql);

        $clientes = [];

        while ($fila = $res->fetch_assoc()) {
            $clientes[] = $fila;
        }

        return $clientes;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "SELECT
                    id_cliente,
                    nombres,
                    apellidos,
                    cedula,
                    telefono,
                    correo,
                    direccion
                FROM clientes
                WHERE id_cliente=$id
                LIMIT 1";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function crear($nombres, $apellidos, $cedula, $telefono, $correo, $direccion)
    {
        $conn = Conexion::conectar();

        $nombres = $conn->real_escape_string($nombres);
        $apellidos = $conn->real_escape_string($apellidos);
        $cedula = $conn->real_escape_string($cedula);
        $telefono = $conn->real_escape_string($telefono);
        $correo = $conn->real_escape_string($correo);
        $direccion = $conn->real_escape_string($direccion);

        $sql = "INSERT INTO clientes
                (nombres, apellidos, cedula, telefono, correo, direccion)
                VALUES
                ('$nombres','$apellidos','$cedula','$telefono','$correo','$direccion')";

        return $conn->query($sql);
    }

    public static function actualizar($id, $nombres, $apellidos, $cedula, $telefono, $correo, $direccion)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $nombres = $conn->real_escape_string($nombres);
        $apellidos = $conn->real_escape_string($apellidos);
        $cedula = $conn->real_escape_string($cedula);
        $telefono = $conn->real_escape_string($telefono);
        $correo = $conn->real_escape_string($correo);
        $direccion = $conn->real_escape_string($direccion);

        $sql = "UPDATE clientes SET
                    nombres='$nombres',
                    apellidos='$apellidos',
                    cedula='$cedula',
                    telefono='$telefono',
                    correo='$correo',
                    direccion='$direccion'
                WHERE id_cliente=$id";

        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "DELETE FROM clientes
                WHERE id_cliente=$id";

        return $conn->query($sql);
    }
}
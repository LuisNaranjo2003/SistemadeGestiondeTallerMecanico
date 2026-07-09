<?php

require_once __DIR__ . "/../config/conexion.php";

class Clientes
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

        // Verificar correo
        $stmt = $conn->prepare("SELECT id_cliente FROM clientes WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();

        if ($stmt->get_result()->num_rows > 0) {
            $stmt->close();
            return "correo";
        }

        $stmt->close();

        // Verificar cédula
        $stmt = $conn->prepare("SELECT id_cliente FROM clientes WHERE cedula = ?");
        $stmt->bind_param("s", $cedula);
        $stmt->execute();

        if ($stmt->get_result()->num_rows > 0) {
            $stmt->close();
            return "cedula";
        }

        $stmt->close();

        // Insertar
        $stmt = $conn->prepare("
        INSERT INTO clientes
        (nombres, apellidos, cedula, telefono, correo, direccion)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

        $stmt->bind_param(
            "ssssss",
            $nombres,
            $apellidos,
            $cedula,
            $telefono,
            $correo,
            $direccion
        );

        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }
    public static function actualizar($id, $nombres, $apellidos, $cedula, $telefono, $correo, $direccion)
    {
        $conn = Conexion::conectar();

        // Verificar si la cédula pertenece a otro cliente
        $stmt = $conn->prepare("
        SELECT id_cliente
        FROM clientes
        WHERE cedula = ?
        AND id_cliente <> ?
    ");

        $stmt->bind_param("si", $cedula, $id);
        $stmt->execute();

        if ($stmt->get_result()->num_rows > 0) {
            $stmt->close();
            return "cedula";
        }

        $stmt->close();

        // Verificar si el correo pertenece a otro cliente
        $stmt = $conn->prepare("
        SELECT id_cliente
        FROM clientes
        WHERE correo = ?
        AND id_cliente <> ?
    ");

        $stmt->bind_param("si", $correo, $id);
        $stmt->execute();

        if ($stmt->get_result()->num_rows > 0) {
            $stmt->close();
            return "correo";
        }

        $stmt->close();

        // Actualizar cliente
        $stmt = $conn->prepare("
        UPDATE clientes
        SET nombres = ?,
            apellidos = ?,
            cedula = ?,
            telefono = ?,
            correo = ?,
            direccion = ?
        WHERE id_cliente = ?
    ");

        $stmt->bind_param(
            "ssssssi",
            $nombres,
            $apellidos,
            $cedula,
            $telefono,
            $correo,
            $direccion,
            $id
        );

        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
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

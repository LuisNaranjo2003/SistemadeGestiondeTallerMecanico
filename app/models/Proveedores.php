<?php

require_once __DIR__ . "/../config/conexion.php";

class Proveedores
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    id_proveedor,
                    nombre_empresa,
                    contacto,
                    ruc,
                    telefono,
                    correo,
                    direccion
                FROM proveedores
                ORDER BY id_proveedor DESC";

        $res = $conn->query($sql);

        $proveedores = [];

        while ($fila = $res->fetch_assoc()) {
            $proveedores[] = $fila;
        }

        return $proveedores;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "SELECT
                    id_proveedor,
                    nombre_empresa,
                    contacto,
                    ruc,
                    telefono,
                    correo,
                    direccion
                FROM proveedores
                WHERE id_proveedor=$id
                LIMIT 1";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function crear($nombre_empresa, $contacto, $ruc, $telefono, $correo, $direccion)
    {
        $conn = Conexion::conectar();

        $nombre_empresa = $conn->real_escape_string($nombre_empresa);
        $contacto = $conn->real_escape_string($contacto);
        $ruc = $conn->real_escape_string($ruc);
        $telefono = $conn->real_escape_string($telefono);
        $correo = $conn->real_escape_string($correo);
        $direccion = $conn->real_escape_string($direccion);

        $sql = "INSERT INTO proveedores
                (nombre_empresa, contacto, ruc, telefono, correo, direccion)
                VALUES
                ('$nombre_empresa','$contacto','$ruc','$telefono','$correo','$direccion')";

        return $conn->query($sql);
    }

    public static function actualizar($id, $nombre_empresa, $contacto, $ruc, $telefono, $correo, $direccion)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $nombre_empresa = $conn->real_escape_string($nombre_empresa);
        $contacto = $conn->real_escape_string($contacto);
        $ruc = $conn->real_escape_string($ruc);
        $telefono = $conn->real_escape_string($telefono);
        $correo = $conn->real_escape_string($correo);
        $direccion = $conn->real_escape_string($direccion);

        $sql = "UPDATE proveedores SET
                    nombre_empresa='$nombre_empresa',
                    contacto='$contacto',
                    ruc='$ruc',
                    telefono='$telefono',
                    correo='$correo',
                    direccion='$direccion'
                WHERE id_proveedor=$id";

        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "DELETE FROM proveedores
                WHERE id_proveedor=$id";

        return $conn->query($sql);
    }
}

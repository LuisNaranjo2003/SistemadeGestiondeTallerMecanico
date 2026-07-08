<?php

require_once __DIR__ . "/../config/conexion.php";

class Servicios
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    id_servicio,
                    nombre_servicio,
                    descripcion,
                    precio
                FROM servicios
                ORDER BY id_servicio DESC";

        $res = $conn->query($sql);

        $servicios = [];

        while ($fila = $res->fetch_assoc()) {
            $servicios[] = $fila;
        }

        return $servicios;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "SELECT
                    id_servicio,
                    nombre_servicio,
                    descripcion,
                    precio
                FROM servicios
                WHERE id_servicio=$id
                LIMIT 1";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function crear($nombre_servicio, $descripcion, $precio)
    {
        $conn = Conexion::conectar();

        $nombre_servicio = $conn->real_escape_string($nombre_servicio);
        $descripcion = $conn->real_escape_string($descripcion);
        $precio = (float)$precio;

        $sql = "INSERT INTO servicios
                (nombre_servicio, descripcion, precio)
                VALUES
                ('$nombre_servicio', '$descripcion', $precio)";

        return $conn->query($sql);
    }

    public static function actualizar($id, $nombre_servicio, $descripcion, $precio)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;
        $nombre_servicio = $conn->real_escape_string($nombre_servicio);
        $descripcion = $conn->real_escape_string($descripcion);
        $precio = (float)$precio;

        $sql = "UPDATE servicios SET
                    nombre_servicio='$nombre_servicio',
                    descripcion='$descripcion',
                    precio=$precio
                WHERE id_servicio=$id";

        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "DELETE FROM servicios
                WHERE id_servicio=$id";

        return $conn->query($sql);
    }
}
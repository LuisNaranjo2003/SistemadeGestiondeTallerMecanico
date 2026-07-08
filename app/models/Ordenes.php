<?php

require_once __DIR__ . "/../config/conexion.php";

class Ordenes
{
    public static function listarTodos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    o.id_orden,
                    o.fecha,
                    o.observaciones,
                    o.estado,

                    v.id_vehiculo,
                    v.placa,
                    v.marca,
                    v.modelo,

                    m.id_mecanico,
                    CONCAT(m.nombres,' ',m.apellidos) AS nombre_mecanico

                FROM ordenes o

                INNER JOIN vehiculos v
                    ON o.vehiculo_id=v.id_vehiculo

                INNER JOIN mecanicos m
                    ON o.mecanico_id=m.id_mecanico

                ORDER BY o.id_orden DESC";

        $res = $conn->query($sql);

        $ordenes = [];

        while ($fila = $res->fetch_assoc()) {
            $ordenes[] = $fila;
        }

        return $ordenes;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "SELECT *
              FROM ordenes
              WHERE id_orden=$id";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function obtenerDetalle($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "SELECT

                o.*,

                v.placa,
                v.marca,
                v.modelo,

                CONCAT(m.nombres,' ',m.apellidos) AS nombre_mecanico

              FROM ordenes o

              INNER JOIN vehiculos v
                    ON o.vehiculo_id=v.id_vehiculo

              INNER JOIN mecanicos m
                    ON o.mecanico_id=m.id_mecanico

              WHERE o.id_orden=$id";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function crear($datos)
    {
        $conn = Conexion::conectar();

        $vehiculo = (int)$datos["vehiculo_id"];
        $mecanico = (int)$datos["mecanico_id"];

        $fecha = $conn->real_escape_string($datos["fecha"]);
        $observaciones = $conn->real_escape_string($datos["observaciones"]);
        $estado = $conn->real_escape_string($datos["estado"]);

        $sql = "INSERT INTO ordenes
              (vehiculo_id,mecanico_id,fecha,observaciones,estado)

              VALUES
              ($vehiculo,$mecanico,'$fecha','$observaciones','$estado')";

        return $conn->query($sql);
    }

    public static function actualizar($id, $datos)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $vehiculo = (int)$datos["vehiculo_id"];
        $mecanico = (int)$datos["mecanico_id"];

        $fecha = $conn->real_escape_string($datos["fecha"]);
        $observaciones = $conn->real_escape_string($datos["observaciones"]);
        $estado = $conn->real_escape_string($datos["estado"]);

        $sql = "UPDATE ordenes SET

                vehiculo_id=$vehiculo,
                mecanico_id=$mecanico,
                fecha='$fecha',
                observaciones='$observaciones',
                estado='$estado'

              WHERE id_orden=$id";

        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        return $conn->query("DELETE FROM ordenes WHERE id_orden=$id");
    }

    public static function listarVehiculos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                id_vehiculo,
                CONCAT(placa,' | ',marca,' | ',modelo) AS vehiculo
            FROM vehiculos
            ORDER BY placa";

        $res = $conn->query($sql);

        $vehiculos = [];

        while ($fila = $res->fetch_assoc()) {
            $vehiculos[] = $fila;
        }

        return $vehiculos;
    }

    public static function listarMecanicos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                id_mecanico,
                CONCAT(nombres,' ',apellidos) AS nombre
            FROM mecanicos
            ORDER BY nombres";

        $res = $conn->query($sql);

        $mecanicos = [];

        while ($fila = $res->fetch_assoc()) {
            $mecanicos[] = $fila;
        }

        return $mecanicos;
    }
}

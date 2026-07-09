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
                    CONCAT(m.nombres,' ',m.apellidos) AS nombre_mecanico,

                    s.id_servicio,
                    s.nombre_servicio

                FROM ordenes o

                INNER JOIN vehiculos v
                    ON o.vehiculo_id = v.id_vehiculo

                INNER JOIN mecanicos m
                    ON o.mecanico_id = m.id_mecanico

                INNER JOIN servicios s
                    ON o.servicio_id = s.id_servicio

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

                    CONCAT(m.nombres,' ',m.apellidos) AS nombre_mecanico,

                    s.nombre_servicio

                FROM ordenes o

                INNER JOIN vehiculos v
                    ON o.vehiculo_id=v.id_vehiculo

                INNER JOIN mecanicos m
                    ON o.mecanico_id=m.id_mecanico

                INNER JOIN servicios s
                    ON o.servicio_id=s.id_servicio

                WHERE o.id_orden=$id";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function crear($datos)
    {
        $conn = Conexion::conectar();

        $vehiculo = (int)$datos["vehiculo_id"];
        $mecanico = (int)$datos["mecanico_id"];
        $servicio = (int)$datos["servicio_id"];

        $fecha = $conn->real_escape_string($datos["fecha"]);
        $observaciones = $conn->real_escape_string($datos["observaciones"]);
        $estado = $conn->real_escape_string($datos["estado"]);

        $sql = "INSERT INTO ordenes
                (vehiculo_id,mecanico_id,servicio_id,fecha,observaciones,estado)

                VALUES
                ($vehiculo,$mecanico,$servicio,'$fecha','$observaciones','$estado')";

        return $conn->query($sql);
    }

    public static function actualizar($id, $datos)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $vehiculo = (int)$datos["vehiculo_id"];
        $mecanico = (int)$datos["mecanico_id"];
        $servicio = (int)$datos["servicio_id"];

        $fecha = $conn->real_escape_string($datos["fecha"]);
        $observaciones = $conn->real_escape_string($datos["observaciones"]);
        $estado = $conn->real_escape_string($datos["estado"]);

        $sql = "UPDATE ordenes SET

                    vehiculo_id=$vehiculo,
                    mecanico_id=$mecanico,
                    servicio_id=$servicio,
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

    public static function listarServicios()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    id_servicio,
                    nombre_servicio
                FROM servicios
                ORDER BY nombre_servicio";

        $res = $conn->query($sql);

        $servicios = [];

        while ($fila = $res->fetch_assoc()) {
            $servicios[] = $fila;
        }

        return $servicios;
    }

    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT id_orden, fecha
                FROM ordenes
                ORDER BY id_orden DESC";

        $res = $conn->query($sql);

        $ordenes = [];

        while ($fila = $res->fetch_assoc()) {
            $ordenes[] = $fila;
        }

        return $ordenes;
    }

}
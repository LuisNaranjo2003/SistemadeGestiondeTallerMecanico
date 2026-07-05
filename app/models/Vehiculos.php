<?php

require_once __DIR__ . "/../config/conexion.php";

class Vehiculo
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    v.id_vehiculo,
                    v.placa,
                    v.marca,
                    v.modelo,
                    v.anio,
                    v.color,
                    CONCAT(c.nombres,' ',c.apellidos) AS cliente
                FROM vehiculos v
                INNER JOIN clientes c
                ON v.cliente_id = c.id_cliente
                ORDER BY v.id_vehiculo DESC";

        $res = $conn->query($sql);

        $vehiculos = [];

        while($fila = $res->fetch_assoc()){
            $vehiculos[] = $fila;
        }

        return $vehiculos;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "SELECT
                    v.id_vehiculo,
                    v.placa,
                    v.marca,
                    v.modelo,
                    v.anio,
                    v.color,
                    v.cliente_id,
                    CONCAT(c.nombres,' ',c.apellidos) AS cliente
                FROM vehiculos v
                INNER JOIN clientes c
                ON v.cliente_id = c.id_cliente
                WHERE v.id_vehiculo=$id
                LIMIT 1";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function crear($placa,$marca,$modelo,$anio,$color,$cliente_id)
    {
        $conn = Conexion::conectar();

        $placa = $conn->real_escape_string($placa);
        $marca = $conn->real_escape_string($marca);
        $modelo = $conn->real_escape_string($modelo);
        $anio = (int)$anio;
        $color = $conn->real_escape_string($color);
        $cliente_id = (int)$cliente_id;

        $sql = "INSERT INTO vehiculos
                (placa,marca,modelo,anio,color,cliente_id)
                VALUES
                ('$placa','$marca','$modelo',$anio,'$color',$cliente_id)";

        return $conn->query($sql);
    }

    public static function actualizar($id,$placa,$marca,$modelo,$anio,$color,$cliente_id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;
        $placa = $conn->real_escape_string($placa);
        $marca = $conn->real_escape_string($marca);
        $modelo = $conn->real_escape_string($modelo);
        $anio = (int)$anio;
        $color = $conn->real_escape_string($color);
        $cliente_id = (int)$cliente_id;

        $sql = "UPDATE vehiculos SET
                    placa='$placa',
                    marca='$marca',
                    modelo='$modelo',
                    anio=$anio,
                    color='$color',
                    cliente_id=$cliente_id
                WHERE id_vehiculo=$id";

        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "DELETE FROM vehiculos
                WHERE id_vehiculo=$id";

        return $conn->query($sql);
    }

    public static function obtenerClientes()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    id_cliente,
                    CONCAT(nombres,' ',apellidos) AS cliente
                FROM clientes
                ORDER BY nombres";

        $res = $conn->query($sql);

        $clientes = [];

        while($fila = $res->fetch_assoc()){
            $clientes[] = $fila;
        }

        return $clientes;
    }
}
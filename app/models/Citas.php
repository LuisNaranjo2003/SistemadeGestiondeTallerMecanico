<?php
require_once __DIR__ . "/../config/conexion.php";

class Citas
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();
        $sql = "SELECT c.id_cita, c.fecha, c.hora, c.estado, 
                       cl.nombres, cl.apellidos, v.placa, v.marca 
                FROM citas c
                INNER JOIN clientes cl ON c.cliente_id = cl.id_cliente
                INNER JOIN vehiculos v ON c.vehiculo_id = v.id_vehiculo
                ORDER BY c.fecha DESC, c.hora DESC";
        $res = $conn->query($sql);
        $citas = [];
        if($res){
            while ($fila = $res->fetch_assoc()) {
                $citas[] = $fila;
            }
        }
        return $citas;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $sql = "SELECT * FROM citas WHERE id_cita = $id LIMIT 1";
        $res = $conn->query($sql);
        return $res->fetch_assoc();
    }

    public static function crear($cliente_id, $vehiculo_id, $fecha, $hora, $estado)
    {
        $conn = Conexion::conectar();
        $cliente_id = (int)$cliente_id;
        $vehiculo_id = (int)$vehiculo_id;
        $fecha = $conn->real_escape_string($fecha);
        $hora = $conn->real_escape_string($hora);
        $estado = $conn->real_escape_string($estado);

        $sql = "INSERT INTO citas (cliente_id, vehiculo_id, fecha, hora, estado) 
                VALUES ($cliente_id, $vehiculo_id, '$fecha', '$hora', '$estado')";
        return $conn->query($sql);
    }

    public static function actualizar($id, $cliente_id, $vehiculo_id, $fecha, $hora, $estado)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $cliente_id = (int)$cliente_id;
        $vehiculo_id = (int)$vehiculo_id;
        $fecha = $conn->real_escape_string($fecha);
        $hora = $conn->real_escape_string($hora);
        $estado = $conn->real_escape_string($estado);

        $sql = "UPDATE citas SET 
                    cliente_id = $cliente_id, 
                    vehiculo_id = $vehiculo_id, 
                    fecha = '$fecha', 
                    hora = '$hora', 
                    estado = '$estado' 
                WHERE id_cita = $id";
        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $id = (int)$id;
        $sql = "DELETE FROM citas WHERE id_cita = $id";
        return $conn->query($sql);
    }
}
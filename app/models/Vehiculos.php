<?php

require_once __DIR__ . "/../config/conexion.php";

class Vehiculo
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    public function listar()
    {
        $sql = "SELECT
                    v.id_vehiculo,
                    v.placa,
                    v.marca,
                    v.modelo,
                    v.anio,
                    v.color,
                    CONCAT(c.nombres, ' ', c.apellidos) AS cliente
                FROM vehiculos v
                INNER JOIN clientes c
                ON v.cliente_id = c.id_cliente
                ORDER BY v.id_vehiculo DESC";

        return $this->conexion->query($sql);
    }

    public function registrar($placa, $marca, $modelo, $anio, $color, $cliente_id)
    {
        $sql = "INSERT INTO vehiculos
                (placa, marca, modelo, anio, color, cliente_id)
                VALUES
                ('$placa','$marca','$modelo','$anio','$color','$cliente_id')";

        return $this->conexion->query($sql);
    }

    public function buscar($id)
    {
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
                WHERE v.id_vehiculo='$id'";

        return $this->conexion->query($sql)->fetch_assoc();
    }

    public function actualizar($id, $placa, $marca, $modelo, $anio, $color, $cliente_id)
    {
        $sql = "UPDATE vehiculos SET
                    placa='$placa',
                    marca='$marca',
                    modelo='$modelo',
                    anio='$anio',
                    color='$color',
                    cliente_id='$cliente_id'
                WHERE id_vehiculo='$id'";

        return $this->conexion->query($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM vehiculos
                WHERE id_vehiculo='$id'";

        return $this->conexion->query($sql);
    }

    public function listarClientes()
    {
        $sql = "SELECT id_cliente,
                       CONCAT(nombres,' ',apellidos) AS cliente
                FROM clientes
                ORDER BY nombres";

        return $this->conexion->query($sql);
    }

    public function existePlaca($placa)
    {
        $sql = "SELECT * FROM vehiculos WHERE placa='$placa'";
        $resultado = $this->conexion->query($sql);

        return $resultado->num_rows > 0;
    }
}
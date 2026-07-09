<?php

require_once __DIR__ . "/../config/conexion.php";

class Factura
{
    public static function obtenerTodas()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    id_factura,
                    orden_id,
                    fecha,
                    subtotal,
                    iva,
                    total
                FROM facturas
                ORDER BY id_factura DESC";

        $res = $conn->query($sql);

        $facturas = [];

        while ($fila = $res->fetch_assoc()) {
            $facturas[] = $fila;
        }

        return $facturas;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "SELECT
                    id_factura,
                    orden_id,
                    fecha,
                    subtotal,
                    iva,
                    total
                FROM facturas
                WHERE id_factura=$id
                LIMIT 1";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function crear($orden_id, $fecha, $subtotal, $iva, $total)
    {
        $conn = Conexion::conectar();

        $orden_id = (int)$orden_id;
        $fecha = $conn->real_escape_string($fecha);
        $subtotal = (float)$subtotal;
        $iva = (float)$iva;
        $total = (float)$total;

        $sql = "INSERT INTO facturas
                (orden_id, fecha, subtotal, iva, total)
                VALUES
                ($orden_id,'$fecha',$subtotal,$iva,$total)";

        return $conn->query($sql);
    }

    public static function actualizar($id, $orden_id, $fecha, $subtotal, $iva, $total)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;
        $orden_id = (int)$orden_id;
        $fecha = $conn->real_escape_string($fecha);
        $subtotal = (float)$subtotal;
        $iva = (float)$iva;
        $total = (float)$total;

        $sql = "UPDATE facturas SET
                    orden_id=$orden_id,
                    fecha='$fecha',
                    subtotal=$subtotal,
                    iva=$iva,
                    total=$total
                WHERE id_factura=$id";

        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "DELETE FROM facturas
                WHERE id_factura=$id";

        return $conn->query($sql);
    }

    public static function obtenerOrdenes()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                id_orden
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

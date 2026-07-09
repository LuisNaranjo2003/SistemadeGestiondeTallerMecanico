<?php

require_once __DIR__ . "/../config/conexion.php";

class Pago
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    p.*,
                    f.id_factura
                FROM pagos p
                INNER JOIN facturas f
                    ON p.factura_id = f.id_factura
                ORDER BY p.id_pago DESC";

        $resultado = $conn->query($sql);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $stmt = $conn->prepare("SELECT * FROM pagos WHERE id_pago=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public static function obtenerFacturas()
    {
        $conn = Conexion::conectar();

        $sql="SELECT id_factura
              FROM facturas
              ORDER BY id_factura";

        $resultado=$conn->query($sql);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function crear($factura_id,$metodo_pago,$fecha_pago,$estado)
    {
        $conn = Conexion::conectar();

        $stmt=$conn->prepare("INSERT INTO pagos
            (factura_id,metodo_pago,fecha_pago,estado)
            VALUES (?,?,?,?)");

        $stmt->bind_param(
            "isss",
            $factura_id,
            $metodo_pago,
            $fecha_pago,
            $estado
        );

        return $stmt->execute();
    }

    public static function actualizar($id,$factura_id,$metodo_pago,$fecha_pago,$estado)
    {
        $conn = Conexion::conectar();

        $stmt=$conn->prepare("UPDATE pagos
            SET factura_id=?,
                metodo_pago=?,
                fecha_pago=?,
                estado=?
            WHERE id_pago=?");

        $stmt->bind_param(
            "isssi",
            $factura_id,
            $metodo_pago,
            $fecha_pago,
            $estado,
            $id
        );

        return $stmt->execute();
    }

    public static function eliminar($id)
    {
        $conn=Conexion::conectar();

        $stmt=$conn->prepare("DELETE FROM pagos WHERE id_pago=?");
        $stmt->bind_param("i",$id);

        return $stmt->execute();
    }
}
<?php

require_once __DIR__ . "/../config/conexion.php";

class Repuesto
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT
                    r.*,
                    p.nombre AS proveedor
                FROM repuestos r
                INNER JOIN proveedores p
                    ON r.proveedor_id = p.id_proveedor
                ORDER BY r.id_repuesto DESC";

        $resultado = $conn->query($sql);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $stmt = $conn->prepare("SELECT * FROM repuestos WHERE id_repuesto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public static function obtenerProveedores()
    {
        $conn = Conexion::conectar();

        $sql = "SELECT id_proveedor, nombre
                FROM proveedores
                ORDER BY nombre";

        $resultado = $conn->query($sql);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function crear($nombre, $marca, $precio, $stock, $proveedor_id)
    {
        $conn = Conexion::conectar();

        $stmt = $conn->prepare("
            INSERT INTO repuestos
            (nombre, marca, precio, stock, proveedor_id)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "ssdii",
            $nombre,
            $marca,
            $precio,
            $stock,
            $proveedor_id
        );

        return $stmt->execute();
    }

    public static function actualizar($id, $nombre, $marca, $precio, $stock, $proveedor_id)
    {
        $conn = Conexion::conectar();

        $stmt = $conn->prepare("
            UPDATE repuestos
            SET nombre = ?,
                marca = ?,
                precio = ?,
                stock = ?,
                proveedor_id = ?
            WHERE id_repuesto = ?
        ");

        $stmt->bind_param(
            "ssdiii",
            $nombre,
            $marca,
            $precio,
            $stock,
            $proveedor_id,
            $id
        );

        return $stmt->execute();
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();

        $stmt = $conn->prepare("DELETE FROM repuestos WHERE id_repuesto = ?");
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
<?php
require_once __DIR__ . "/../../config/database.php";

class OrdenModel
{
    private $conn;
    private $table = "orden";


    public function __construct()
    {
        $conn = Conexion::conectar();
    }

    public function listarTodos()
    {
        $sql = "SELECT o.*, v.placa, v.modelo, m.nombre AS nombre_mecanico
                FROM {$this->table} o
                INNER JOIN vehiculo v ON o.vehiculo_id = v.id_vehiculo
                INNER JOIN mecanico m ON o.mecanico_id = m.id_mecanico
                ORDER BY o.id_orden DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_orden = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerDetalle($id)
    {
        $sql = "SELECT o.*, v.placa, v.modelo, m.nombre AS nombre_mecanico
                FROM {$this->table} o
                INNER JOIN vehiculo v ON o.vehiculo_id = v.id_vehiculo
                INNER JOIN mecanico m ON o.mecanico_id = m.id_mecanico
                WHERE o.id_orden = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($datos)
    {
        $sql = "INSERT INTO {$this->table} (vehiculo_id, mecanico_id, fecha, observaciones, estado)
                VALUES (:vehiculo_id, :mecanico_id, :fecha, :observaciones, :estado)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":vehiculo_id", $datos['vehiculo_id'], PDO::PARAM_INT);
        $stmt->bindParam(":mecanico_id", $datos['mecanico_id'], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos['fecha']);
        $stmt->bindParam(":observaciones", $datos['observaciones']);
        $stmt->bindParam(":estado", $datos['estado']);
        return $stmt->execute();
    }

    public function actualizar($id, $datos)
    {
        $sql = "UPDATE {$this->table}
                SET vehiculo_id = :vehiculo_id,
                    mecanico_id = :mecanico_id,
                    fecha = :fecha,
                    observaciones = :observaciones,
                    estado = :estado
                WHERE id_orden = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":vehiculo_id", $datos['vehiculo_id'], PDO::PARAM_INT);
        $stmt->bindParam(":mecanico_id", $datos['mecanico_id'], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos['fecha']);
        $stmt->bindParam(":observaciones", $datos['observaciones']);
        $stmt->bindParam(":estado", $datos['estado']);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id_orden = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function listarVehiculos()
    {
        $stmt = $this->conn->prepare("SELECT id_vehiculo, placa, modelo FROM vehiculo ORDER BY placa");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarMecanicos()
    {
        $stmt = $this->conn->prepare("SELECT id_mecanico, nombre FROM mecanico ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

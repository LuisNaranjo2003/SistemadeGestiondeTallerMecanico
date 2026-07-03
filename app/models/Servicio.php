<?php
require_once __DIR__ . '/../config/conexion.php';

class Servicio {
    private $conn;
    private $tabla = "Servicio";

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->conectar();
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->tabla;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrar($nombre, $descripcion, $precio) {
        $query = "INSERT INTO " . $this->tabla . " (nombre_servicio, descripcion, precio) VALUES (:nombre, :descripcion, :precio)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        return $stmt->execute();
    }
    
    public function obtenerPorId($id) {
        $query = "SELECT * FROM " . $this->tabla . " WHERE id_servicio = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $descripcion, $precio) {
        $query = "UPDATE " . $this->tabla . " SET nombre_servicio = :nombre, descripcion = :descripcion, precio = :precio WHERE id_servicio = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM " . $this->tabla . " WHERE id_servicio = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
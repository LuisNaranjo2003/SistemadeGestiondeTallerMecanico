<?php

class Factura {

    /**
     * Establece la conexión con la Base de Datos
     */
    private function conectar() {
        // Ajusta el nombre de tu base de datos si no es 'taller_mecanico'
        $conexion = new mysqli("localhost", "root", "", "taller_mecanico");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        return $conexion;
    }

    /**
     * Inserta una nueva factura en la base de datos
     */
    public function crear($orden_id, $fecha, $subtotal, $iva, $total) {
        $conexion = $this->conectar();
        
        // Se realiza el INSERT seguro con sentencias preparadas
        $sql = "INSERT INTO facturas (orden_id, fecha, subtotal, iva, total) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("isddd", $orden_id, $fecha, $subtotal, $iva, $total);
            $resultado = $stmt->execute();
            $stmt->close();
            $conexion->close();
            return $resultado;
        }
        
        $conexion->close();
        return false;
    }

    /**
     * AQUI  Trae todos los registros ordenados por id_factura
     */
    public function obtenerTodas() {
        $conexion = $this->conectar();
        
        // Se cambió 'id' por 'id_factura' para que coincida con tu llave primaria
        $sql = "SELECT * FROM facturas ORDER BY id_factura DESC"; 
        
        $resultado = $conexion->query($sql);
        
        $facturas = [];
        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $facturas[] = $fila;
            }
        }
        
        $conexion->close();
        return $facturas;
    }
}
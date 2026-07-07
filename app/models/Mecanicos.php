<?php

require_once __DIR__ . "/../config/conexion.php";

class Mecanico
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();

        // Seleccionamos todas las columnas según tu tabla de phpMyAdmin
        $sql = "SELECT 
                    id_mecanico, 
                    nombres, 
                    apellidos, 
                    especialidad, 
                    telefono, 
                    correo 
                FROM mecanicos 
                ORDER BY id_mecanico DESC";

        $res = $conn->query($sql);

        $mecanicos = [];

        while ($fila = $res->fetch_assoc()) {
            $mecanicos[] = $fila;
        }

        return $mecanicos;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "SELECT 
                    id_mecanico, 
                    nombres, 
                    apellidos, 
                    especialidad, 
                    telefono, 
                    correo 
                FROM mecanicos 
                WHERE id_mecanico = $id 
                LIMIT 1";

        $res = $conn->query($sql);

        return $res->fetch_assoc();
    }

    public static function crear($nombres, $apellidos, $especialidad, $telefono, $correo)
    {
        $conn = Conexion::conectar();

        // Limpiamos los textos para evitar fallos de comillas en la consulta SQL
        $nombres = $conn->real_escape_string($nombres);
        $apellidos = $conn->real_escape_string($apellidos);
        $especialidad = $conn->real_escape_string($especialidad);
        $telefono = $conn->real_escape_string($telefono);
        $correo = $conn->real_escape_string($correo);

        $sql = "INSERT INTO mecanicos 
                (nombres, apellidos, especialidad, telefono, correo) 
                VALUES 
                ('$nombres', '$apellidos', '$especialidad', '$telefono', '$correo')";

        return $conn->query($sql);
    }

    public static function actualizar($id, $nombres, $apellidos, $especialidad, $telefono, $correo)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;
        $nombres = $conn->real_escape_string($nombres);
        $apellidos = $conn->real_escape_string($apellidos);
        $especialidad = $conn->real_escape_string($especialidad);
        $telefono = $conn->real_escape_string($telefono);
        $correo = $conn->real_escape_string($correo);

        $sql = "UPDATE mecanicos SET 
                    nombres = '$nombres', 
                    apellidos = '$apellidos', 
                    especialidad = '$especialidad', 
                    telefono = '$telefono', 
                    correo = '$correo' 
                WHERE id_mecanico = $id";

        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();

        $id = (int)$id;

        $sql = "DELETE FROM mecanicos 
                WHERE id_mecanico = $id";

        return $conn->query($sql);
    }
}
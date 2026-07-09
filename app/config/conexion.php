<?php

class Conexion
{
    public static function conectar()
    {
        $host = "localhost";
        $bd = "taller_mecanico";
        $usuario = "root";
        $pass = "";

        $conn = new mysqli($host, $usuario, $pass, $bd);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        return $conn;
    }
}
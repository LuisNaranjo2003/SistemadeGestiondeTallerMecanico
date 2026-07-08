<?php

class Conexion
{
    public static function conectar()
    {
        $host = getenv("DB_HOST");
        $bd = getenv("DB_NAME");
        $usuario = getenv("DB_USER");
        $pass = getenv("DB_PASSWORD");
        $puerto = getenv("DB_PORT");

        $conn = new mysqli($host, $usuario, $pass, $bd, $puerto);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        return $conn;
    }
}
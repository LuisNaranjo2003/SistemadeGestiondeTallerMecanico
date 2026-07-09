<?php

class Conexion
{
    public static function conectar()
    {
<<<<<<< HEAD
        /*$host = getenv("DB_HOST");
        $bd = getenv("DB_NAME");
        $usuario = getenv("DB_USER");
        $pass = getenv("DB_PASSWORD");
        $puerto = getenv("DB_PORT");*/

=======
>>>>>>> 695394b654a2c4ded96e6dbe0e753e7428b7eb02
        $host = "localhost";
        $bd = "taller_mecanico";
        $usuario = "root";
        $pass = "";
<<<<<<< HEAD
        $puerto = 3306;
=======
>>>>>>> 695394b654a2c4ded96e6dbe0e753e7428b7eb02

        $conn = new mysqli($host, $usuario, $pass, $bd);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        return $conn;
    }
}
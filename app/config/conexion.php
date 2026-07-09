<?php

class Conexion
{
    public static function conectar()
    {
        $host    = getenv("DB_HOST");
        $bd      = getenv("DB_NAME");
        $usuario = getenv("DB_USER");
        $pass    = getenv("DB_PASSWORD");
        $puerto  = getenv("DB_PORT");
        $ca      = getenv("DB_SSL_CA");

        $conn = mysqli_init();

        mysqli_ssl_set(
            $conn,
            null,
            null,
            $ca,
            null,
            null
        );

        mysqli_real_connect(
            $conn,
            $host,
            $usuario,
            $pass,
            $bd,
            (int)$puerto,
            null,
            MYSQLI_CLIENT_SSL
        );

        if ($conn->connect_errno) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $conn->set_charset("utf8");

        return $conn;
    }
}
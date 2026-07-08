<?php

class Conexion
{
    public static function conectar()
    {
        $host = getenv("DB_HOST");
        $usuario = getenv("DB_USER");
        $pass = getenv("DB_PASSWORD");
        $bd = getenv("DB_NAME");
        $puerto = getenv("DB_PORT");

        $conn = mysqli_init();

        mysqli_ssl_set($conn, NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);

        mysqli_real_connect(
            $conn,
            $host,
            $usuario,
            $pass,
            $bd,
            $puerto,
            NULL,
            MYSQLI_CLIENT_SSL
        );

        if (mysqli_connect_errno()) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $conn->set_charset("utf8");

        return $conn;
    }
}
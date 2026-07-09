<?php

require_once __DIR__ . "/../models/Factura.php";

class FacturaController
{
    public function listar()
    {
        $facturas = Factura::obtenerTodas();
        require __DIR__ . "/../views/facturas/listar.php";
    }

    public function crearForm()
    {
        $ordenes = Factura::obtenerOrdenes();
        require __DIR__ . "/../views/facturas/crear.php";
    }

    public function crear()
    {
        $orden_id = $_POST["orden_id"] ?? 0;
        $fecha = $_POST["fecha"] ?? "";
        $subtotal = $_POST["subtotal"] ?? 0;
        $iva = $_POST["iva"] ?? 0;
        $total = $_POST["total"] ?? 0;

        Factura::crear(
            $orden_id,
            $fecha,
            $subtotal,
            $iva,
            $total
        );

        header("Location: index.php?url=facturas/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $factura = Factura::obtenerPorId($id);
        $ordenes = Factura::obtenerOrdenes();

        require __DIR__ . "/../views/facturas/editar.php";
    }

    public function actualizar()
    {
        $id = $_POST["id_factura"] ?? 0;
        $orden_id = $_POST["orden_id"] ?? 0;
        $fecha = $_POST["fecha"] ?? "";
        $subtotal = $_POST["subtotal"] ?? 0;
        $iva = $_POST["iva"] ?? 0;
        $total = $_POST["total"] ?? 0;

        Factura::actualizar(
            $id,
            $orden_id,
            $fecha,
            $subtotal,
            $iva,
            $total
        );

        header("Location: index.php?url=facturas/listar");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? 0;

        Factura::eliminar($id);

        header("Location: index.php?url=facturas/listar");
        exit;
    }
    public function imprimir()
    {
        $id = $_GET["id"] ?? 0;

        $factura = Factura::obtenerPorId($id);

        if (!$factura) {
            die("Factura no encontrada.");
        }

        require __DIR__ . "/../views/facturas/imprimir.php";
    }
}

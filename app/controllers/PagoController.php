<?php

require_once __DIR__ . "/../models/Pago.php";

class PagoController
{
    public function listar()
    {
        $pagos = Pago::obtenerTodos();
        require __DIR__ . "/../views/pagos/listar.php";
    }

    public function crearForm()
    {
        $facturas = Pago::obtenerFacturas();
        require __DIR__ . "/../views/pagos/crear.php";
    }

    public function crear()
    {
        $factura_id = $_POST["factura_id"] ?? 0;
        $metodo_pago = $_POST["metodo_pago"] ?? "";
        $fecha_pago = $_POST["fecha_pago"] ?? "";
        $estado = $_POST["estado"] ?? "";

        Pago::crear(
            $factura_id,
            $metodo_pago,
            $fecha_pago,
            $estado
        );

        header("Location:index.php?url=pagos/listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET["id"] ?? 0;

        $pago = Pago::obtenerPorId($id);

        if(!$pago){
            header("Location:index.php?url=pagos/listar");
            exit;
        }

        $facturas = Pago::obtenerFacturas();

        require __DIR__ . "/../views/pagos/editar.php";
    }

    public function actualizar()
    {
        $id = $_POST["id_pago"] ?? 0;
        $factura_id = $_POST["factura_id"] ?? 0;
        $metodo_pago = $_POST["metodo_pago"] ?? "";
        $fecha_pago = $_POST["fecha_pago"] ?? "";
        $estado = $_POST["estado"] ?? "";

        Pago::actualizar(
            $id,
            $factura_id,
            $metodo_pago,
            $fecha_pago,
            $estado
        );

        header("Location:index.php?url=pagos/listar");
        exit;
    }

    public function eliminar()
    {
        $id=$_GET["id"] ?? 0;

        Pago::eliminar($id);

        header("Location:index.php?url=pagos/listar");
        exit;
    }
}
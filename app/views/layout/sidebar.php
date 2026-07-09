<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Taller Mecánico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body{
            overflow-x:hidden;
            background:#f8f9fa;
        }

        .sidebar{
            min-height:100vh;
            width:260px;
        }

        .sidebar .nav-link{
            color:#fff;
            padding:12px 18px;
            border-radius:8px;
            margin-bottom:5px;
            transition:.3s;
        }

        .sidebar .nav-link:hover{
            background:rgba(255,255,255,.15);
        }

        .sidebar .nav-link.active{
            background:#0b5ed7;
        }

        .content{
            padding:30px;
        }
    </style>

</head>

<body>

<div class="container-fluid">

<div class="row">


    <div class="col-md-3 col-lg-2 bg-dark sidebar p-3">

        <h3 class="text-center text-white mb-4">
            <i class="bi bi-tools"></i>
            Taller
        </h3>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="bi bi-house-door-fill"></i>
                    Inicio
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=vehiculos/listar">
                    <i class="bi bi-car-front-fill"></i>
                    Vehículos
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=clientes/listar">
                    <i class="bi bi-people-fill"></i>
                    Clientes
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=servicios/listar">
                    <i class="bi bi-wrench-adjustable"></i>
                    Servicios
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=mecanicos/listar">
                    <i class="bi bi-person-badge-fill"></i>
                    Mecánicos
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=ordenes/listar">
                    <i class="bi bi-clipboard-check-fill"></i>
                    Órdenes
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=facturas/listar">
                    <i class="bi bi-receipt"></i>
                    Facturas
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=citas/listar">
                    <i class="bi bi-calendar-check-fill"></i>
                    Citas
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=proveedores/listar">
                    <i class="bi bi-truck"></i>
                    Proveedores
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=repuestos/listar">
                    <i class="bi bi-box-seam-fill"></i>
                    Repuestos
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?url=pagos/listar">
                    <i class="bi bi-cash-coin"></i>
                    Pagos
                </a>
            </li>

        </ul>

    </div>


    <div class="col-md-9 col-lg-10 content">
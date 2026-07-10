<?php
$factura = $factura ?? null;

if (!$factura) {
    die("Factura no encontrada.");
}
$logo = "/img/logo.png";
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Factura N° <?= $factura["id_factura"] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f2f2f2;
            font-family: Arial, Helvetica, sans-serif;
        }

        .factura {
            width: 850px;
            margin: 30px auto;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, .15);
        }

        .logo {
            width: 120px;
        }

        .empresa {
            text-align: right;
        }

        .empresa h2 {
            color: #0d6efd;
            font-weight: bold;
            margin: 0;
        }

        .titulo {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .total {
            color: green;
            font-size: 24px;
            font-weight: bold;
        }

        .firma {
            margin-top: 80px;
            text-align: center;
        }

        .firma hr {
            width: 250px;
            margin: auto;
        }

        @media print {

            body {
                background: white;
            }

            .factura {
                width: 100%;
                margin: 0;
                box-shadow: none;
                border: none;
            }

            .no-print {
                display: none;
            }

        }
    </style>

</head>

<body>

    <div class="container">

        <div class="factura">

            <div class="row align-items-center">

                <div class="col-3">

                    <img src="<?= $logo ?>"
                        class="logo"
                        alt="Logo">

                </div>

                <div class="col-9 empresa">

                    <h2>TALLER MECÁNICO</h2>

                    <p class="mb-0">
                        Sistema de Gestión
                    </p>

                </div>

            </div>

            <div class="titulo">

                <h3>

                    FACTURA

                </h3>

            </div>

            <table class="table table-borderless">

                <tr>

                    <td>

                        <strong>Número de Factura:</strong>

                        <?= htmlspecialchars($factura["id_factura"]) ?>

                    </td>

                    <td class="text-end">

                        <strong>Fecha:</strong>

                        <?= htmlspecialchars($factura["fecha"]) ?>

                    </td>

                </tr>

                <tr>

                    <td>

                        <strong>Orden de Trabajo:</strong>

                        <?= htmlspecialchars($factura["orden_id"]) ?>

                    </td>

                    <td></td>

                </tr>

            </table>

            <hr>

            <table class="table table-bordered">

                <thead class="table-dark">

                    <tr>

                        <th>Descripción</th>

                        <th width="180">Valor</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>Subtotal</td>

                        <td>

                            $<?= number_format($factura["subtotal"], 2) ?>

                        </td>

                    </tr>

                    <tr>

                        <td>IVA (15%)</td>

                        <td>

                            $<?= number_format($factura["iva"], 2) ?>

                        </td>

                    </tr>

                    <tr>

                        <td class="fw-bold">

                            TOTAL A PAGAR

                        </td>

                        <td class="total">

                            $<?= number_format($factura["total"], 2) ?>

                        </td>

                    </tr>

                </tbody>

            </table>

            <div class="firma">

                <hr>

                Responsable

            </div>

            <div class="text-center mt-5">

                <p>

                    Gracias por confiar en nuestros servicios.

                </p>

            </div>

            <div class="text-center mt-4 no-print">

                <button
                    class="btn btn-primary"
                    onclick="window.print()">

                    🖨 Imprimir

                </button>

                <a href="index.php?url=facturas/listar"
                    class="btn btn-secondary">

                    Volver

                </a>

            </div>

        </div>

    </div>

</body>

</html>
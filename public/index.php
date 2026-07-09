<?php

$url = $_GET["url"] ?? "";

if ($url == "") {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Gestión de Taller Mecánico</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <style>
            body {
                background: #f4f6f9;
                font-family: Arial, sans-serif;
            }

            /* BARRA DE NAVEGACIÓN MODERNA EN AZUL */
            .navbar-custom {
                background-color: #007bff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            /* TARJETAS DEL MENÚ PRINCIPAL */
            .card-menu {
                transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
                border: none;
                border-radius: 12px;
                background-color: #ffffff;
                position: relative;
                overflow: hidden;
            }

            /* Efecto de elevación al pasar el mouse */
            .card-menu:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            }

            /* Bordes superiores temáticos dinámicos */
            .card-vehiculos {
                border-top: 5px solid #007bff;
            }

            .card-clientes {
                border-top: 5px solid #198754;
            }

            .card-servicios {
                border-top: 5px solid #ffc107;
            }

            .card-mecanicos {
                border-top: 5px solid #dc3545;
            }

            .card-ordenes {
                border-top: 5px solid #6c757d;
            }

            .card-facturas {
                border-top: 5px solid #0dcaf0;
            }

            /* Cambios sutiles de fondo en hover */
            .card-vehiculos:hover {
                background-color: #f0f7ff;
            }

            .card-clientes:hover {
                background-color: #f2f9f5;
            }

            .card-servicios:hover {
                background-color: #fffdf5;
            }

            .card-mecanicos:hover {
                background-color: #fff5f5;
            }

            .card-ordenes:hover {
                background-color: #f8f9fa;
            }

            .card-facturas:hover {
                background-color: #f0faff;
            }

            .card-citas {
                border-top: 5px solid #0dcaf0;
            }

            .card-proveedores {
                border-top: 5px solid #007bff;
            }

            /* Hover */
            .card-citas:hover {
                background-color: #f0faff;
            }

            .card-proveedores:hover {
                background-color: #f0f7ff;
            }

            .icono {
                font-size: 55px;
                transition: transform 0.3s ease;
            }

            .card-menu:hover .icono {
                transform: scale(1.1);
            }

            .btn-custom {
                border-radius: 6px;
                font-weight: bold;
                padding: 8px 20px;
            }
        </style>

    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
            <div class="container">
                <span class="navbar-brand fw-bold fs-4">
                    <i class="bi bi-tools me-2"></i>
                    Sistema de Gestión de Taller Mecánico
                </span>
            </div>
        </nav>

        <div class="container py-5">

            <div class="text-center mb-5">
                <h1 class="fw-bold text-dark">Bienvenido Panel de Control</h1>
                <p class="text-muted fs-5">Seleccione el módulo al que desea ingresar para comenzar a trabajar.</p>
            </div>

            <div class="row g-4 justify-content-center">

                <div class="col-md-4">
                    <div class="card card-menu card-vehiculos shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-car-front-fill text-primary icono"></i>
                            <h4 class="mt-3 fw-bold text-dark">Vehículos</h4>
                            <p class="text-muted small">Registrar, editar y administrar la flota de vehículos.</p>
                            <a href="index.php?url=vehiculos/listar" class="btn btn-primary btn-custom w-100 mt-2">
                                <i class="bi bi-arrow-right-circle me-1"></i> Ingresar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-menu card-clientes shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-people-fill text-success icono"></i>
                            <h4 class="mt-3 fw-bold text-dark">Clientes</h4>
                            <p class="text-muted small">Administrar la información de contacto de tus clientes.</p>
                            <a href="index.php?url=clientes/listar" class="btn btn-success btn-custom w-100 mt-2">
                                <i class="bi bi-arrow-right-circle me-1"></i> Ingresar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-menu card-servicios shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-wrench-adjustable text-warning icono"></i>
                            <h4 class="mt-3 fw-bold text-dark">Servicios</h4>
                            <p class="text-muted small">Gestionar el catálogo de servicios ofrecidos y precios.</p>
                            <a href="index.php?url=servicios/listar" class="btn btn-warning text-white btn-custom w-100 mt-2">
                                <i class="bi bi-arrow-right-circle me-1"></i> Ingresar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-menu card-mecanicos shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-person-badge-fill text-danger icono"></i>
                            <h4 class="mt-3 fw-bold text-dark">Mecánicos</h4>
                            <p class="text-muted small">Administrar el personal técnico asignado a los trabajos.</p>
                            <a href="index.php?url=mecanicos/listar" class="btn btn-danger btn-custom w-100 mt-2">
                                <i class="bi bi-arrow-right-circle me-1"></i> Ingresar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-menu card-ordenes shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-clipboard-check-fill text-secondary icono"></i>
                            <h4 class="mt-3 fw-bold text-dark">Órdenes de Trabajo</h4>
                            <p class="text-muted small">Crear y monitorear hojas de servicio del taller.</p>
                            <a href="index.php?url=ordenes/listar" class="btn btn-secondary btn-custom w-100 mt-2">
                                <i class="bi bi-arrow-right-circle me-1"></i> Ingresar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-menu card-facturas shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-receipt text-info icono"></i>
                            <h4 class="mt-3 fw-bold text-dark">Facturas</h4>
                            <p class="text-muted small">Controlar la facturación general e historial de pagos.</p>
                            <a href="index.php?url=facturas/listar" class="btn btn-info text-white btn-custom w-100 mt-2">
                                <i class="bi bi-arrow-right-circle me-1"></i> Ingresar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">

                    <div class="card card-menu shadow">

                        <div class="card-body text-center p-5">

                            <i class="bi bi-calendar-check-fill text-info icono"></i>

                            <h3 class="mt-3">
                                Citas
                            </h3>

                            <p class="text-muted">
                                Agendar y administrar citas del taller.
                            </p>

                            <a href="index.php?url=citas/listar"
                                class="btn btn-info text-white">

                                <i class="bi bi-arrow-right-circle"></i>

                                Ingresar

                            </a>

                        </div>

                    </div>

                </div>
                <div class="col-md-5">

                    <div class="card card-menu shadow">

                        <div class="card-body text-center p-5">

                            <i class="bi bi-truck text-dark icono"></i>

                            <h3 class="mt-3">
                                Proveedores
                            </h3>

                            <p class="text-muted">
                                Administrar los proveedores del taller.
                            </p>

                            <a href="index.php?url=proveedores/listar"
                                class="btn btn-dark">

                                <i class="bi bi-arrow-right-circle"></i>

                                Ingresar

                            </a>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </body>

    </html>
<?php
    exit;
}

// =========================================================================
// ENRUTADOR DINÁMICO ULTRA INTELIGENTE (AUTO-DETECTA CLASES SINGULAR/PLURAL)
// =========================================================================

$partes = explode('/', rtrim($url, '/'));
$modulo = $partes[0];
$accion = $partes[1] ?? 'listar';

$controladorPlural = ucfirst($modulo) . "Controller";
$controladorSingular = $modulo;
if (substr($modulo, -1) === 's') {
    $controladorSingular = substr($modulo, 0, -1);
}
$controladorSingular = ucfirst($controladorSingular) . "Controller";

$rutaArchivo = __DIR__ . "/../app/controllers/" . $controladorPlural . ".php";
if (!file_exists($rutaArchivo)) {
    $rutaArchivo = __DIR__ . "/../app/controllers/" . $controladorSingular . ".php";
}

if (file_exists($rutaArchivo)) {
    require_once $rutaArchivo;

    $claseFinal = "";
    if (class_exists($controladorPlural)) {
        $claseFinal = $controladorPlural;
    } elseif (class_exists($controladorSingular)) {
        $claseFinal = $controladorSingular;
    }

    if (!empty($claseFinal) && method_exists($claseFinal, $accion)) {
        $controller = new $claseFinal();
        $controller->$accion();
    } else {
        $nombreMostrado = !empty($claseFinal) ? $claseFinal : $controladorPlural;
        mostrarError404("El método o clase '$nombreMostrado::$accion' no existe en el sistema.");
    }
} else {
    mostrarError404("No se encontró el archivo del controlador para el módulo '$modulo'. <br><small class='text-muted'>Ruta buscada: $rutaArchivo</small>");
}

function mostrarError404($mensaje = "Ruta no encontrada")
{
    http_response_code(404);
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>";
    echo "<div class='container text-center mt-5'>";
    echo "<h2 class='text-danger fw-bold'>404 - Error de Enrutamiento</h2>";
    echo "<p class='lead text-muted'>$mensaje</p>";
    echo "<a href='index.php' class='btn btn-dark mt-3'>Volver al Inicio</a>";
    echo "</div>";
    exit;
}

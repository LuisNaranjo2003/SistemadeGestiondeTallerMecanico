<?php
require_once __DIR__ . "/../models/OrdenModel.php";

class OrdenController
{
    private $model;

    public function __construct()
    {
        $this->model = new OrdenModel();
    }

    // GET ordenes/listar
    public function index()
    {
        $ordenes = $this->model->listarTodos();
        require_once __DIR__ . "/../views/ordenes/listar.php";
    }

    // GET ordenes/crearForm
    public function crear()
    {
        $errores = [];
        $vehiculos = $this->model->listarVehiculos();
        $mecanicos = $this->model->listarMecanicos();
        require_once __DIR__ . "/../views/ordenes/crear.php";
    }

    // POST ordenes/crear
    public function guardar()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: index.php?url=ordenes/listar");
            exit;
        }

        $datos = $this->obtenerDatosFormulario();
        $errores = $this->validar($datos);

        if (!empty($errores)) {
            $vehiculos = $this->model->listarVehiculos();
            $mecanicos = $this->model->listarMecanicos();
            require_once __DIR__ . "/../views/ordenes/crear.php";
            return;
        }

        $this->model->crear($datos);
        header("Location: index.php?url=ordenes/listar");
        exit;
    }

    // GET ordenes/editarForm&id=
    public function editar()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?url=ordenes/listar");
            exit;
        }

        $errores = [];
        $orden = $this->model->obtenerPorId($id);
        if (!$orden) {
            header("Location: index.php?url=ordenes/listar");
            exit;
        }

        $vehiculos = $this->model->listarVehiculos();
        $mecanicos = $this->model->listarMecanicos();
        require_once __DIR__ . "/../views/ordenes/editar.php";
    }

    // POST ordenes/actualizar
    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: index.php?url=ordenes/listar");
            exit;
        }

        $id = $_POST['id_orden'] ?? null;
        if (!$id) {
            header("Location: index.php?url=ordenes/listar");
            exit;
        }

        $datos = $this->obtenerDatosFormulario();
        $errores = $this->validar($datos);

        if (!empty($errores)) {
            $orden = $this->model->obtenerPorId($id);
            $orden = array_merge($orden, $datos, ['id_orden' => $id]);
            $vehiculos = $this->model->listarVehiculos();
            $mecanicos = $this->model->listarMecanicos();
            require_once __DIR__ . "/../views/ordenes/editar.php";
            return;
        }

        $this->model->actualizar($id, $datos);
        header("Location: index.php?url=ordenes/listar");
        exit;
    }

    // GET ordenes/detalle&id=
    public function detalle()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?url=ordenes/listar");
            exit;
        }

        $orden = $this->model->obtenerDetalle($id);
        if (!$orden) {
            header("Location: index.php?url=ordenes/listar");
            exit;
        }

        require_once __DIR__ . "/../views/ordenes/detalle.php";
    }

    // GET ordenes/eliminar&id=
    public function eliminar()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->eliminar($id);
        }
        header("Location: index.php?url=ordenes/listar");
        exit;
    }

    // ---------- Métodos privados de apoyo ----------

    private function obtenerDatosFormulario()
    {
        return [
            'vehiculo_id'   => $_POST['vehiculo_id'] ?? '',
            'mecanico_id'   => $_POST['mecanico_id'] ?? '',
            'fecha'         => trim($_POST['fecha'] ?? ''),
            'observaciones' => trim($_POST['observaciones'] ?? ''),
            'estado'        => trim($_POST['estado'] ?? ''),
        ];
    }

    // Validaciones de backend (obligatorias según la rúbrica del proyecto)
    private function validar($datos)
    {
        $errores = [];

        if (empty($datos['vehiculo_id'])) {
            $errores[] = "Debe seleccionar un vehículo.";
        }
        if (empty($datos['mecanico_id'])) {
            $errores[] = "Debe seleccionar un mecánico.";
        }
        if (empty($datos['fecha'])) {
            $errores[] = "La fecha es obligatoria.";
        } elseif (!$this->esFechaValida($datos['fecha'])) {
            $errores[] = "La fecha ingresada no es válida.";
        }
        if (empty($datos['estado'])) {
            $errores[] = "El estado es obligatorio.";
        } elseif (!in_array($datos['estado'], ['pendiente', 'en proceso', 'finalizado'])) {
            $errores[] = "El estado seleccionado no es válido.";
        }

        return $errores;
    }

    private function esFechaValida($fecha)
    {
        $d = DateTime::createFromFormat('Y-m-d', $fecha);
        return $d && $d->format('Y-m-d') === $fecha;
    }
}

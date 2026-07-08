<?php

require_once __DIR__ . "/../models/Mecanicos.php";

class MecanicoController
{
    public function listar()
    {
        
        $mecanicos = Mecanicos::obtenerTodos();
    
        require __DIR__ . "/../views/mecanicos/listar.php";
    }

    public function crearForm()
    {
    
        require __DIR__ . "/../views/mecanicos/crear.php";
    }

    public function crear()
    {
        $nombres = $_POST["nombres"] ?? "";
        $apellidos = $_POST["apellidos"] ?? "";
        $especialidad = $_POST["especialidad"] ?? "";
        $telefono = $_POST["telefono"] ?? "";
        $correo = $_POST["correo"] ?? "";

      
        Mecanicos::crear(
            $nombres,
            $apellidos,
            $especialidad,
            $telefono,
            $correo
        );

       
        header("Location: index.php?url=mecanicos/listar");
        exit;
    }

    public function editarForm()
    {
     
        $id = $_GET["id"] ?? 0;

       
        $mecanico = Mecanicos::obtenerPorId($id);

    
        require __DIR__ . "/../views/mecanicos/editar.php";
    }

    public function actualizar()
    {
       
        $id = $_POST["id"] ?? 0;
        $nombres = $_POST["nombres"] ?? "";
        $apellidos = $_POST["apellidos"] ?? "";
        $especialidad = $_POST["especialidad"] ?? "";
        $telefono = $_POST["telefono"] ?? "";
        $correo = $_POST["correo"] ?? "";

       
        Mecanicos::actualizar(
            $id,
            $nombres,
            $apellidos,
            $especialidad,
            $telefono,
            $correo
        );

       
        header("Location: index.php?url=mecanicos/listar");
        exit;
    }

    public function eliminar()
    {
      
        $id = $_GET["id"] ?? 0;

       
        Mecanicos::eliminar($id);

       
        header("Location: index.php?url=mecanicos/listar");
        exit;
    }
}
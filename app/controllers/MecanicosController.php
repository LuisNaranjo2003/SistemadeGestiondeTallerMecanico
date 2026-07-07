<?php

require_once __DIR__ . "/../models/Mecanico.php";

class MecanicoController
{
    public function listar()
    {
        
        $mecanicos = Mecanico::obtenerTodos();
    
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

      
        Mecanico::crear(
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

       
        $mecanico = Mecanico::obtenerPorId($id);

    
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

       
        Mecanico::actualizar(
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

       
        Mecanico::eliminar($id);

       
        header("Location: index.php?url=mecanicos/listar");
        exit;
    }
}
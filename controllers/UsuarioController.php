<?php 

class UsuarioController{
    public function mostrar()
    {
        require_once('database/db.php');
        

        require_once("models/Usuario.php");
        

        $usuario = new Usuario();
        

        $datos = $usuario->getUsuarios();
        

        require_once("views/lista_usuarios.php");
    }

   

    public function insertar()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


            require_once('database/db.php');
        

            require_once("models/Usuario.php");
        

            $nuevo = new Usuario();
        

            $nuevo->insertUsuarios($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['contrasena'], $_POST['rol']);

            header("Location: principal_usuarios.php?controller=Usuario&action=mostrar");
        }
    }


    public function modificar()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        require_once('database/db.php');
        require_once("models/Usuario.php");

        $modificar = new Usuario();


        $modificar->modificarUsuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['contrasena'], $_POST['rol']);

        header("Location: principal_usuarios.php?controller=Usuario&action=mostrar");
    }
}


public function eliminar()
{
    
    $id = $_GET['id'] ?? null; 

    if ($id === null) {
       
        header("Location: alguna_pagina_de_error.php");
        exit();
    }

    require_once('database/db.php');
    require_once("models/Usuario.php");

    $eliminar = new Usuario();

    $eliminar->eliminarUsuario($id);

    header("Location: principal_usuarios.php?controller=Usuario&action=mostrar");
    exit();
}


}

?>
<?php 

class CategoriaController{
    public function mostrar()
    {
        require_once('database/db.php');
        

        require_once("models/Categoria.php");
        

        $categoria = new Categoria();
        

        $datos = $categoria->getCategorias();
        

        require_once("views/lista_categorias.php");
    }

   

    public function insertar()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


            require_once('database/db.php');
        

            require_once("models/Categoria.php");
        

            $nuevo = new Categoria();
        

            $nuevo->insertCategorias($_POST['nombre']);

            header("Location: principal_categorias.php?controller=Categoria&action=mostrar");
        }
    }


    public function modificar()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        require_once('database/db.php');
        require_once("models/Categoria.php");

        $modificar = new Categoria();


        $modificar->modificarCategoria($_POST['id'], $_POST['nombre']);

        header("Location: principal_categorias.php?controller=Categoria&action=mostrar");
    }
}


public function eliminar($id)
{
    
    $id = $_GET['id'] ?? null; 

    if ($id === null) {
       
        header("Location: alguna_pagina_de_error.php");
        exit();
    }

    require_once('database/db.php');
    require_once("models/Categoria.php");

    $eliminar = new Categoria();

    $eliminar->eliminarCategoria($id);

    header("Location: principal_categorias.php?controller=Categoria&action=mostrar");
    exit();
}


}

?>
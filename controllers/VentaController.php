<?php 
session_start();

$id_cajero = $_SESSION['id'];
class VentaController{
    public function mostrar()
    {
        require_once('database/db.php');
        

        require_once("models/Venta.php");
        

        $venta = new Venta();
        
        $id_cajero = $_SESSION['id'];

        $datos = $venta->getVentas($id_cajero);
        
        require_once("views/lista_ventas.php");
    }

   

    public function insertar()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


            require_once('database/db.php');
        

            require_once('models/Venta.php');
            require_once('models/Producto.php');

            $nuevo = new Venta();
        
            

            $nuevo->insertVentas($_POST['id'],$_POST['$id_cajero']);

            $modificar = new Producto();


        $modificar->modificarPVI( $_POST['id']);

        header("Location: cajeros.php");


        }
    }



    public function modificar()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        require_once('database/db.php');
        require_once("models/Venta.php");
        
        $modificar = new Venta();


        $modificar->modificarVenta($_POST['id'], $_POST['id_producto'],$_POST['cant'],$_POST['id_cajero']);

        header("Location: principal_ventas.php?controller=Categoria&action=mostrar");
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
    require_once("models/Venta.php");
    require_once("models/Producto.php");

    $eliminar = new Venta();

    $eliminar->eliminarVenta($id);

    $modificar = new Producto();


    $modificar->modificarPVI( $_POST['id']);
    header("Location: principal_ventas.php?controller=Categoria&action=mostrar");
    exit();
}


}

?>
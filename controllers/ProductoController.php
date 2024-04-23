<?php 


          
          
        
class ProductoController{
    public function mostrar()
    {
        require_once('database/db.php');
        require_once("models/Producto.php");
        $producto = new Producto();
        $datos = $producto->getProductos();
        require_once("views/lista_productos.php");
    }

    public function listar()
    {
        require_once('database/db.php');
        require_once("models/Producto.php");
        $producto = new Producto();
        $datos = $producto->listarProductos();
        require_once("views/venta_productos.php");
    }

   
    public function obtenerCategorias()
    {
        // Llamamos al archivo donde nos conectamos con la base de datoss
        require_once('database/db.php');
    
        // Llamamos al modelo del controlador donde nos conectaremos con la base de datos y los distintos métodos
        require_once("models/Categoria.php");
        
        // Procedemos a crear el objeto Rubro (llamando al Modelo Rubro)
        $categoria = new Categoria();
        
        // Obtenemos los rubros para pasárselos a la vista
        $datos = $categoria->getCategorias();

        // Llamamos a la vista crear_articulo.php
        require_once("views/registro_producto.php");
    }


    public function obtenerCat()
    {
        // Llamamos al archivo donde nos conectamos con la base de datoss
        require_once('database/db.php');
    
        // Llamamos al modelo del controlador donde nos conectaremos con la base de datos y los distintos métodos
        require_once("models/Categoria.php");
        
        // Procedemos a crear el objeto Rubro (llamando al Modelo Rubro)
        $categoria = new Categoria();
        
        // Obtenemos los rubros para pasárselos a la vista
        $datos = $categoria->getCategorias();

        // Llamamos a la vista crear_articulo.php
        require_once("views/modificar_producto.php");
    }



    public function insertar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once('database/db.php');
            require_once("models/Producto.php");
            // Crear una instancia de Producto
            $nuevo = new Producto();
    
    
            // Insertar el nuevo producto
            $nuevo->insertProductos($_POST['nombre'], $_POST['precio'], $_POST['cantidad'], $_POST['categoria_id']);
    
            header("Location: principal_productos.php?controller=Producto&action=mostrar");
        }
    }


    public function modificar()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        require_once('database/db.php');
        require_once("models/Producto.php");

        $modificar = new Producto();


        $modificar->modificarProducto($_POST['id'], $_POST['nombre'], $_POST['cantidad'], $_POST['categoria_id'], $_POST['precio']);

        header("Location: principal_productos.php?controller=Producto&action=mostrar");
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
    require_once("models/Producto.php");

    $eliminar = new Producto();

    $eliminar->eliminarProducto($id);

    header("Location: principal_productos.php?controller=Producto&action=mostrar");
    exit();
}


}

?>
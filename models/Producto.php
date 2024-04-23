<?php
// Evitar la inyección SQL
class Producto{
    private $lista_productos;
    private $venta_productos;

    private $db;

    // Nos conectamos con la base de datos
    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->lista_productos = array();
        $this->venta_productos = array();
    }

    // SET NAMES indica qué conjunto de caracteres utilizará el cliente para enviar declaraciones SQL al servidor.
    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }
    // Obtenemos TODOS los productos de la base de datos y lo guardamos en $lista_productos para pintarlo en la vista
    public function getProductos()
    {
        self::setNames();
        
        $query="SELECT 
        P.id,
        P.nombre AS nombre_producto,
        P.precio,
        P.cantidad,
        C.nombre AS nombre_categoria,
        P.id_categoria AS id_categoria 
        FROM 
        Productos AS P
        JOIN 
        Categorias AS C ON P.id_categoria= C.id;";

        foreach ($this->db->query($query) as $producto){
            $this->lista_productos[] = $producto; 
        }
        $this->db->close();
        return $this->lista_productos;
    }



    public function listarProductos()
    {
        self::setNames();
        
        $query="SELECT 
        P.id,
        P.nombre AS nombre_producto,
        P.precio,
        P.cantidad,
        C.nombre AS nombre_categoria,
        P.id_categoria AS id_categoria 
        FROM 
        Productos AS P
        JOIN 
        Categorias AS C ON P.id_categoria= C.id;";

        foreach ($this->db->query($query) as $producto){
            $this->venta_productos[] = $producto; 
        }
        $this->db->close();
        return $this->venta_productos;
    }



    // Insertamos un nuevo producto en la tabla productos en la base de datos. 


    public function buscarCategorias()
{
    self::setNames();
    $query = "SELECT id, nombre FROM categorias";
    $result = $this->db->query($query);
    
    $categorias = array();
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $result->close();
    $this->db->close();
    return $categorias;
}
    

public function insertProductos($nombre, $precio, $cantidad, $id_categoria)
{
    self::setNames();
    $query = "INSERT INTO productos (nombre, precio, cantidad, id_categoria) VALUES ('$nombre', '$precio', '$cantidad', '$id_categoria')";
    $result = $this->db->query($query);
    $this->db->close();

    return $result ? true : false;
}
    




    public function modificarProducto($id, $nombre, $cantidad, $id_categoria, $precio)
{
    self::setNames();
    $query = "UPDATE productos SET nombre='$nombre', cantidad='$cantidad', id_categoria='$id_categoria', precio='$precio' WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}

public function modificarPVI($id)
{
    self::setNames();
    $query = "UPDATE productos SET cantidad=cantidad-1 WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}

public function modificarPVE($id)
{
    self::setNames();
    $query = "UPDATE productos SET cantidad=cantidad+1 WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}


    public function eliminarProducto($id)
    {
        self::setNames();
        $query = "DELETE FROM productos WHERE id='$id'";
        $result = $this->db->query($query);
        $this->db->close();
    
        if($result)        return true;
        else               return false;
    }
}
?>

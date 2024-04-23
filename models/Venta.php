<?php       /* -------- Modelo Articulo ---------  */

class Venta{
    private $lista_ventas;
    private $db;

    // Nos conectamos con la base de datos
    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->lista_ventas = array();
    }

    // SET NAMES indica qué conjunto de caracteres utilizará el cliente para enviar declaraciones SQL al servidor.
    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    // Obtenemos TODOS los articulos de la base de datos y lo guardamos en $lista_articulos para pintarlo en la vista
    public function getVentas($id_cajero)
    {
        self::setNames();
        $query = "SELECT id,id_producto,fecha FROM ventas";

       foreach ($this->db->query($query) as $venta){
            $this->lista_ventas[] = $venta; 
        }
        $this->db->close();
        return $this->lista_ventas;
    }

    // Insertamos un nuevo rubro en la tabla rubro en la base de datos. 
    public function insertVentas($id_producto,$id_cajero)
    {
        self::setNames();
        $query = "INSERT INTO ventas (id_producto,cant,id_cajero) VALUES ('$id_producto',1,'$id_cajero')";
        $result = $this->db->query($query);
        $this->db->close();

        if($result)        return true;
        else               return false;
    }

    public function modificarVenta($id,$id_producto, $cant,$id_cajero)
{
    self::setNames();
    $query = "UPDATE ventas SET id_producto='$id_producto',cant='$cant',id_cajero='$id_cajero' WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}






public function eliminarVenta($id)
{
    self::setNames();
    $query = "DELETE FROM ventas WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}


}

?>
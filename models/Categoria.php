<?php       /* -------- Modelo Articulo ---------  */

class Categoria{
    private $lista_categorias;
    private $db;

    // Nos conectamos con la base de datos
    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->lista_categorias = array();
    }

    // SET NAMES indica qué conjunto de caracteres utilizará el cliente para enviar declaraciones SQL al servidor.
    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    // Obtenemos TODOS los articulos de la base de datos y lo guardamos en $lista_articulos para pintarlo en la vista
    public function getCategorias()
    {
        self::setNames();
        $query = "SELECT id, nombre FROM categorias";
        foreach ($this->db->query($query) as $categoria){
            $this->lista_categorias[] = $categoria; 
        }
        $this->db->close();
        return $this->lista_categorias;
    }

    // Insertamos un nuevo rubro en la tabla rubro en la base de datos. 
    public function insertCategorias($nombre)
    {
        self::setNames();
        $query = "INSERT INTO Categorias (nombre) VALUES ('$nombre')";
        $result = $this->db->query($query);
        $this->db->close();

        if($result)        return true;
        else               return false;
    }

    public function modificarCategoria($id, $nombre)
{
    self::setNames();
    $query = "UPDATE Categorias SET nombre='$nombre' WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}






public function eliminarCategoria($id)
{
    self::setNames();
    $query = "DELETE FROM Categorias WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}


}

?>
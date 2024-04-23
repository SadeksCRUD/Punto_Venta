<?php       /* -------- Modelo Articulo ---------  */

class Usuario{
    private $lista_usuarios;
    private $db;

    // Nos conectamos con la base de datos
    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->lista_usuarios = array();
    }

    // SET NAMES indica qué conjunto de caracteres utilizará el cliente para enviar declaraciones SQL al servidor.
    private function setNames()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }

    // Obtenemos TODOS los articulos de la base de datos y lo guardamos en $lista_articulos para pintarlo en la vista
    public function getUsuarios()
    {
        self::setNames();
        $query = "SELECT id, nombre, apellido, correo,contrasena, rol FROM Usuarios";
        foreach ($this->db->query($query) as $usuario){
            $this->lista_usuarios[] = $usuario; 
        }
        $this->db->close();
        return $this->lista_usuarios;
    }

    // Insertamos un nuevo rubro en la tabla rubro en la base de datos. 
    public function insertUsuarios($nombre, $apellido, $correo, $contrasena, $rol)
    {
        self::setNames();
        $query = "INSERT INTO usuarios (nombre, apellido, correo, contrasena, rol) VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$rol')";
        $result = $this->db->query($query);
        $this->db->close();

        if($result)        return true;
        else               return false;
    }

    public function modificarUsuario($id, $nombre, $apellido, $correo, $contrasena, $rol)
{
    self::setNames();
    $query = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', correo='$correo', contrasena='$contrasena', rol='$rol' WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}


public function obtenerUsuario($correo, $contrasena) {
    $correo = $this->db->real_escape_string($correo);
    $contrasena = $this->db->real_escape_string($contrasena);

    $query = "SELECT id, nombre, apellido, correo, rol FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";

    $result = $this->db->query($query);

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
        return $usuario;
    } else {
        return false;
    }
}



public function eliminarUsuario($id)
{
    self::setNames();
    $query = "DELETE FROM Usuarios WHERE id='$id'";
    $result = $this->db->query($query);
    $this->db->close();

    if($result)        return true;
    else               return false;
}


}

?>
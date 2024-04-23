<?php

class Conectar{
    
    public static function conexion(){
        $conexion= new mysqli("localhost", "root", "", "punto_venta");
        return $conexion;
    }
}
?>
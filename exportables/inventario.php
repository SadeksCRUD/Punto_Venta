<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "punto_venta";

$conexion = new mysqli($servername, $username, $password, $dbname);

// Verifica si la conexión se realizó correctamente
if (!$conexion) {
    die('Error de conexión a la base de datos');
}

$query = mysqli_query($conexion, "SELECT 
        P.id,
        P.nombre AS nombre_producto,
        P.precio,
        P.cantidad,
        C.nombre AS nombre_categoria,
        P.id_categoria AS id_categoria 
        FROM 
        Productos AS P
        JOIN 
        Categorias AS C ON P.id_categoria = C.id;");

// Verifica si la consulta se realizó correctamente
if (!$query) {
    die('Error al ejecutar la consulta');
}

$docu = 'inventario.xls';

// Establece las cabeceras para descargar el archivo Excel
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' . $docu);
header('Pragma: no-cache');
header('Expires: 0');

echo "<div class='text-center d-flex justify-content-center mt-3'>";
echo '<table class="tablalistado">';
echo '<tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Existencia</th>
        <th>ID Categoria</th>
        <th>Categoria</th>
        <th>Precio</th>
    </tr>';

// Itera sobre los resultados de la consulta y muestra los datos en la tabla
while ($producto = mysqli_fetch_assoc($query)) {
    echo '<tr>';
    echo '<td>' . $producto['id'] . '</td>';
    echo '<td>' . $producto['nombre_producto'] . '</td>';
    echo '<td>' . $producto['cantidad'] . '</td>';
    echo '<td>' . $producto['id_categoria'] . '</td>';
    echo '<td>' . $producto['nombre_categoria'] . '</td>';
    echo '<td>$' . $producto['precio'] . '</td>';
    echo '</tr>';
}

echo '</table>';
echo '</div>';

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

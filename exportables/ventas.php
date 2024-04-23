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

$query = mysqli_query($conexion, "SELECT ventas.id AS venta_id,
ventas.fecha AS fecha_venta,
productos.id AS producto_id,
productos.nombre AS nombre_producto,
ventas.cant AS cantidad_vendida,
categorias.nombre AS nombre_categoria,
productos.precio AS precio_producto,
usuarios.nombre AS nombre_cajero,
usuarios.apellido AS apellido_cajero


FROM ventas

JOIN productos ON ventas.id_producto = productos.id
JOIN categorias ON productos.id_categoria = categorias.id
JOIN usuarios ON ventas.id_cajero = usuarios.id;");

// Verifica si la consulta se realizó correctamente
if (!$query) {
    die('Error al ejecutar la consulta');
}

$docu = 'ventas.xls';

// Establece las cabeceras para descargar el archivo Excel
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' . $docu);
header('Pragma: no-cache');
header('Expires: 0');

echo "<div class='text-center d-flex justify-content-center mt-3'>";
echo '<table class="tablalistado" border="1"> ';
echo '<tr>
    <th>Id Venta</th>
    <th>Fecha</th>
    <th>Id Producto</th>
    <th>Nombre</th>
    <th>Cantidad</th>
    <th>Categoria</th>
    <th>Precio</th>
    <th>Cajero</th>
</tr>';

foreach ($query as $venta) {
    echo '<tr>';
    echo '<td>' . $venta['venta_id'] . '</td>'; // Acceso a 'id' en lugar de 'P.id'
    echo '<td>' . $venta['fecha_venta'] . '</td>';
    echo '<td>' . $venta['producto_id'] . '</td>'; // Acceso a 'cantidad' en lugar de 'P.cantidad'
    echo '<td>' . $venta['nombre_producto'] . '</td>'; // Acceso a 'id_categoria' en lugar de 'P.id_categoria'
    echo '<td>' . $venta['cantidad_vendida'] . '</td>';
    echo '<td>$' . $venta['nombre_categoria'] . '</td>'; // Acceso a 'precio' en lugar de 'P.precio'
    echo '<td>' . $venta['precio_producto'] . '</td>'; // Acceso a 'id' en lugar de 'P.id'
    echo '<td>' . $venta['nombre_cajero'] .' '.$venta['apellido_cajero'] . '</td>';




}


echo '</table>';
echo '</div>';

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

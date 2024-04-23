<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-image: url('https://wallpapers.com/images/hd/oil-painting-grocery-store-ygcx29mhyvo4dxvg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .tablalistado {
            border-collapse: collapse;
            box-shadow: 0px 0px 10px #000;
            margin: 15px;
            width: 80%;
        }
        .tablalistado th {
            background-color: #007bff; 
            color: #fff;
            padding: 10px;
            border: 2px solid #000;
        }
        .tablalistado td {
            background-color: #cce5ff; 
            color: #000; 
            padding: 10px;
            border: 2px solid #000;
        }
        
        @media only screen and (max-width: 600px) {
            .tablalistado {
                width: 100%;
            }

            .btn {
        display: inline-block;
        padding: 10px 20px;
        text-decoration: none;
        border: 1px solid #000; /* Borde sólido de 1 píxel de color negro */
        border-radius: 5px; /* Bordes redondeados */
    }

    .btn:hover {
        background-color: #f2f2f2; /* Cambia el color de fondo al pasar el mouse sobre el botón */
    }


        }
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/44b97a816e.js" crossorigin="anonymous"></script>
    <title>Lista de Productos</title>
</head>
<body>

<div class="text-right">
<a href="exportables/inventario.php" class="btn btn-success">
    <i class="fa-solid fa-file-excel"></i> Exportar a Excel</a>
</div>
<br>

<?php 

    echo "<div class='text-center d-flex justify-content-center mt-3'>";
    echo '<table class="tablalistado" border1=>';
    echo '<tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Existencia</th>
        <th>ID Categoria</th>
        <th>Categoria</th>
        <th>Precio</th>
        <th></th>
        <th></th>
    </tr>';
    
    foreach ($datos as $producto) {
        echo '<tr>';
        echo '<td>' . $producto['id'] . '</td>'; // Acceso a 'id' en lugar de 'P.id'
        echo '<td>' . $producto['nombre_producto'] . '</td>';
        echo '<td>' . $producto['cantidad'] . '</td>'; // Acceso a 'cantidad' en lugar de 'P.cantidad'
        echo '<td>' . $producto['id_categoria'] . '</td>'; // Acceso a 'id_categoria' en lugar de 'P.id_categoria'
        echo '<td>' . $producto['nombre_categoria'] . '</td>';
        echo '<td>$' . $producto['precio'] . '</td>'; // Acceso a 'precio' en lugar de 'P.precio'

        echo '<td><a href="principal_productos.php?controller=Producto&action=eliminar&id='
         . $producto['id'] . '"
          class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a></td>';


        echo '<td><a href="principal_productos.php?controller=Producto&action=obtenerCat&
        id='. $producto['id'] . '&nombre=' . $producto['nombre_producto'].'&
        cantidad='. $producto['cantidad'] . '&categoria=' . $producto['nombre_categoria'].'&
        precio=' . $producto['precio'] . '" 
         class="btn btn-small btn-warning"><i class="fa-solid fa-user-pen"></i></a></td>';
        echo '</tr>';
    }
    

    echo '</table>';
    echo '</div>';
?>

<div class="row mt-3">
    <div class="col-12 text-center"> <!-- Alineación a la izquierda -->
        <a href="principal_productos.php?controller=Producto&action=obtenerCategorias" style="width: 12%;" class="btn btn-primary">Agregar Producto</a>
    </div>
</div>


</body>
</html>

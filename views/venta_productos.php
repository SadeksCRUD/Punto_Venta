<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .admin-panel {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
            margin-top: 50px;
        }

        .admin-panel h2 {
            margin-bottom: 40px;
            font-size: 28px;
            color: #333;
        }

        .admin-panel button {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .admin-panel button:hover {
            background-color: #0056b3;
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
                border: 1px solid #000;
                /* Borde sólido de 1 píxel de color negro */
                border-radius: 5px;
                /* Bordes redondeados */
            }

            .btn:hover {
                background-color: #f2f2f2;
                /* Cambia el color de fondo al pasar el mouse sobre el botón */
            }
        }

        .container-fluid.row {
            display: flex;
            justify-content: space-between;
            /* Alinea los elementos a los extremos */
            margin-top: 20px;
            /* Margen superior para separar los elementos */
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/44b97a816e.js" crossorigin="anonymous"></script>
    <title>Lista de Productos</title>
</head>

<body>
    <div class="container-fluid row">
        <div>
            <?php
            echo '<h2>Productos Existentes<h2>';
            echo "<div class='text-center d-flex justify-content-center mt-3'>";
            echo '<table class="tablalistado" border="1">';
            echo '<tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>ID Categoria</th>
                <th>Categoria</th>
                <th>Precio</th>
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
            
                echo '<td><button class="btn btn-small btn-danger" 
                onclick="agregarProducto(' . $producto['id'] . ', \'' . $producto['nombre_producto']
                    . '\', ' . $producto['precio'] . ', ' . $producto['cantidad'] . ')"><i class="fa-solid fa-plus"></i></button></td>';
            }

            echo '</table>';
            echo '</div>';
            ?>
        </div>
    </div>

    <div class="container-fluid row justify-content-center">
        <div class="col-md-6">
            <h2>Productos Seleccionados</h2>

            <table id="tabla-productos-seleccionados" class="tablalistado">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th></th> <!-- Nueva columna para el botón de disminuir cantidad -->
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <button type="submit">Hacer Venta</button>

        </div>
    </div>

    <div class="admin-panel">

    </div>

    <script>
        function agregarProducto(id, nombre, precio, existencia) {
            var tablaSeleccionados = document.getElementById('tabla-productos-seleccionados');
            var filas = tablaSeleccionados.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            var encontrado = false;

            // Buscar si el producto ya está en la lista
            for (var i = 0; i < filas.length; i++) {
                var celdas = filas[i].getElementsByTagName('td');
                if (celdas[0].innerHTML == id) {
                    // Si el producto ya está en la lista, aumentar la cantidad si hay existencia disponible
                    var cantidadActual = parseInt(celdas[2].innerHTML);
                    if (cantidadActual < existencia) {
                        celdas[2].innerHTML = cantidadActual + 1;
                    }
                    encontrado = true;
                    break;
                }
            }

            // Si el producto no está en la lista o ya se llegó a la cantidad máxima, mostrar mensaje
            if (!encontrado) {
                if (existencia > 0) {
                    var nuevaFila = tablaSeleccionados.getElementsByTagName('tbody')[0].insertRow();
                    var nuevaCeldaId = nuevaFila.insertCell(0);
                    var nuevaCeldaNombre = nuevaFila.insertCell(1);
                    var nuevaCeldaCantidad = nuevaFila.insertCell(2);
                    var nuevaCeldaPrecio = nuevaFila.insertCell(3);
                    var nuevaCeldaBoton = nuevaFila.insertCell(4); // Nueva celda para el botón de disminuir cantidad

                    nuevaCeldaId.innerHTML = id;
                    nuevaCeldaNombre.innerHTML = nombre;
                    nuevaCeldaCantidad.innerHTML = 1;
                    nuevaCeldaPrecio.innerHTML = precio;
                    nuevaCeldaBoton.innerHTML = '<button class="btn btn-small btn-secondary" onclick="disminuirCantidad(this)">-</button>'; // Agregar el botón de disminuir cantidad
                } else {
                    alert("El producto seleccionado no tiene existencia disponible.");
                }
            }
        }

        function disminuirCantidad(boton) {
            var fila = boton.parentNode.parentNode;
            var cantidadActual = parseInt(fila.getElementsByTagName('td')[2].innerHTML);
            if (cantidadActual > 1) {
                fila.getElementsByTagName('td')[2].innerHTML = cantidadActual - 1;
            } else {
                fila.remove(); // Si la cantidad es 1, eliminar la fila
            }
        }
    </script>
</body>

</html>
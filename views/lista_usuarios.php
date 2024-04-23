<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            
            
            /* Centrar horizontalmente */
            align-items: center;
            /* Centrar verticalmente */
            height: 100vh;
            /* Establecer altura al 100% del viewport */
            background-image: url('https://img.freepik.com/vector-premium/icono-usuario-aislado-boton-avatar-color-plano-circulos-6-botones-iconos-cuenta-eps10_781227-330.jpg');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;

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
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/44b97a816e.js" crossorigin="anonymous"></script>
    <title>Lista de Usuarios</title>
</head>

<body>



    <?php
    echo "<div class='text-center d-flex justify-content-center mt-3'>";
    echo '<table class="tablalistado">';
    echo '<tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Contrasena</th>
        <th>Rol</th>
        </tr>';

    for ($i = 0; $i < count($datos); $i++) {
        echo '<tr>';
        echo '<td>';
        echo $datos[$i]['id'];
        echo '</td>';
        echo '<td>';
        echo $datos[$i]['nombre'];
        echo '</td>';
        echo '<td>';
        echo $datos[$i]['apellido'];
        echo '</td>';
        echo '<td>';
        echo $datos[$i]['correo'];
        echo '</td>';
        echo '<td>';
        echo $datos[$i]['rol'];
        echo '</td>';

        echo '<td>';
        echo '<a href="principal_usuarios.php?controller=Usuario&action=eliminar&id='
            . $datos[$i]['id'] .
            '" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>';
        echo '  ';


        echo '<a href="views/modificar_usuario.php?id='
            . $datos[$i]['id'] . '&nombre=' . $datos[$i]['nombre'] . '&apellido=' . $datos[$i]['apellido'] . '&correo=' . $datos[$i]['correo'] . '&contrasena=' . $datos[$i]['contrasena'] . '&rol=' . $datos[$i]['rol'] .
            '" class="btn btn-small btn-warning"><i class="fa-solid fa-user-pen"></i></a>';


        echo '</td>';

        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    ?>
</body>

</html>
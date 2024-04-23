<?php
session_start();

// VETIFICO LA SESION
if (empty($_SESSION['id'])) {
    // SI NO HAY LO DEJO EN EL INDEX OSEA EL LOGIN
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://wallpapers.com/images/hd/data-center-glass-cabinet-9i4on29spvtm9t6y.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .navbar {
            background-color: black;
            padding: 10px;
            position: fixed; 
            top: 0; 
            left: 0; 
            right: 0; 
            z-index: 999; 
            width: 100%; 
        }

        .navbar button {
            background-color: transparent;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            padding: 5px 10px;
        }

        .navbar button:hover {
            background-color: #333;
        }

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


                /*////////////////////////////////////////////////*/
                .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown select {
            background-color: black;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            appearance: none;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content button {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            width: 100%;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
        }

        .dropdown-content button:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .no-clickable {
            pointer-events: none;
        }
        /*////////////////////////////////////////////////*/


    </style>
</head>
<script src="https://kit.fontawesome.com/44b97a816e.js" crossorigin="anonymous"></script>
<body>
    <div class="navbar">
        <form action="/TRABAJO_ejemplo/index.php" method="post">
            <button type="submit"><i class="fa-solid fa-circle-left"></i> Regresar</button>
        </form>
    </div>


    <!--MOSTRAR DATOS DEL ADMINISTRADOR LOGUEADO-->
    <div class="navbar">
        <div class="dropdown">
            <form action="controllers/SesionController.php" method="post">
                <select name="user_info" class="no-clickable" onchange="this.form.submit()">
                    <option value=""><?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"]; ?></option>
                </select>
                <div class="dropdown-content">
                    <button type="submit" name="logout" style="background: none; border: none; cursor: pointer;">Cerrar
                        sesión</button>
                </div>
            </form>
        </div>
    </div>
<!--//////////////////////////////////////////////////-->

    
    <div class="admin-panel">
        <h2>Administrador</h2>
        <br>
        <button onclick="location.href='principal_categorias.php?controller=Categoria&action=mostrar'">Categorias</button>
        <button onclick="location.href='principal_productos.php?controller=Producto&action=mostrar'">Productos</button>
        <button onclick="location.href='principal_usuarios.php?controller=Usuario&action=mostrar'">Usuarios</button>
    </div>

</body>
</html>

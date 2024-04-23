<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <script src="https://kit.fontawesome.com/44b97a816e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Insertar usuario</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/vector-premium/icono-usuario-aislado-boton-avatar-color-plano-circulos-6-botones-iconos-cuenta-eps10_781227-330.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            /* Elimina el margen predeterminado del cuerpo */
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 400px;
            /* Limitar el ancho del formulario */
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
            font-size: 18px;
            margin-right: 10px;
            padding: 5px 10px;
        }

        .navbar button:hover {
            background-color: #333;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <form action="../principal_usuarios.php?controller=Usuario&action=mostrar" method="post">
            <button type="submit">Regresar</button>
        </form>
    </div>

    <div class="form-container mt-5"> <!-- Agrega margen superior para separar del navbar -->
        <div class="text-center">
            <form action="../principal_usuarios.php?controller=Usuario&action=insertar" method="post" class="mt-4">
                <label for="nombre">Ingrese su nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control mt-3" required>
                <label for="apellido">Ingrese su apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control mt-3" required>
                <label for="correo">Ingrese su correo:</label>
                <input type="text" id="correo" name="correo" class="form-control mt-3" required>
                <label for="contrasena">Ingrese su contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control mt-3" required>
                <label for="rol">Seleccione su Rol:</label>
                <select id="rol" name="rol" class="form-control mt-3" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Cajero">Cajero</option>
                </select>
                <button type="submit" class="btn btn-primary mt-3">Confirmar</button>
            </form>
        </div>
    </div>
</body>

</html>
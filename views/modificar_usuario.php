<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$correo = $_GET['correo'];
$contrasena = $_GET['contrasena'];
$rol = $_GET['rol'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metatags, CSS, y otros enlaces -->
</head>

<body>
    <!-- Contenido HTML -->

    <h2 class="mb-3">Modificar usuario <?php echo $id; ?></h2>

    <!-- Más código HTML y formulario -->

    <!-- Scripts -->
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/44b97a816e.js" crossorigin="anonymous"></script>
    <title>Modificar</title>
</head>
<style>
    body {
            background-image: url('https://img.freepik.com/vector-premium/icono-usuario-aislado-boton-avatar-color-plano-circulos-6-botones-iconos-cuenta-eps10_781227-330.jpg');
            background-size: cover;
            background-position: center;
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

<body>

    <div class="navbar">
        <form action="../principal_usuarios.php?controller=Usuario&action=mostrar" method="post">
            <button type="submit">Regresar</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Modificar usuario</h2>
                        <form action="../principal_usuarios.php?controller=Usuario&action=modificar" method="post">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID:</label>
                                <input value="<?php echo $id; ?>" type="text" id="id" name="id" class="form-control"
                                    readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Ingrese su nombre:</label>
                                <input value="<?php echo $nombre; ?>" type="text" id="nombre" name="nombre"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Ingrese su apellido:</label>
                                <input value="<?php echo $apellido; ?>" type="text" id="apellido" name="apellido"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Ingrese su correo:</label>
                                <input value="<?php echo $correo; ?>" type="text" id="correo" name="correo"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Ingrese su contraseña:</label>
                                <input value="<?php echo $contrasena; ?>" type="password" id="contrasena"
                                    name="contrasena" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="rol" class="form-label">Seleccione su Rol:</label>
                                <select id="rol" name="rol" class="form-select" required>
                                    <option value="Administrador" <?php if ($rol == "Administrador")
                                        echo "selected"; ?>>
                                        Administrador</option>
                                    <option value="Cajero" <?php if ($rol == "Cajero")
                                        echo "selected"; ?>>Cajero</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
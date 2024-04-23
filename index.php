<?php
session_start();
//////////////////////////////////////////////////
// VERIFICO SI HAY UNA SESION ACTIVA
if (isset($_SESSION['id'])) {
    // SI SIGUE ACTIVA LO DEJO EN ADMINISTRADORES.PHP
    header("Location: administradores.php");
    exit();
}
//////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://wallpapers.com/images/hd/oil-painting-grocery-store-ygcx29mhyvo4dxvg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>


    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form id="loginForm" method="POST" action="inicio_sesion.php">
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="text" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div style="background-color:#ffcccc; color: #cc0000; padding: 10px;text-align: center;">
                    <?php echo $_SESSION['error']; ?>
                </div>
                <?php
                unset($_SESSION['error']);
            endif;
            ?>
            <br>
            <div class="form-group">
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>
    </div>

</body>

</html>
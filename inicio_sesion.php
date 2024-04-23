

<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "punto_venta";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['correo'];
$password = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE correo='$username' AND contrasena='$password'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rol = $row['rol'];

        //ALMACENO DATOS DEL USUARIO QUE INICIO LA SESSION
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        //////////////////////////////////////////////////

    switch ($rol) {
        case 'Administrador':
            header("Location: administradores.php");
            break;
        case 'Cajero':
            header("Location: cajeros.php");
            break;
        default:
            echo "Rol no reconocido";
            break;
    }
} else {
    $_SESSION['error'] = "Correo o contraseña incorrectos";
    header("Location: index.php");
    
}

$conn->close();
?>

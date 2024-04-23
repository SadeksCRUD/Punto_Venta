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
    <title>Usuarios</title>
</head>
<style>
    body {

        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-image: url('https://wallpapers.com/images/hd/oil-painting-grocery-store-ygcx29mhyvo4dxvg.jpg');
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
        font-size: 20px;
        margin-right: 10px;
        padding: 5px 10px;
    }

    .navbar button:hover {
        background-color: #333;

    }
</style>

<body>

    <div class="navbar">
        <form action="cajeros.php" method="post">
            <button type="submit">Regresar</button>
        </form>
    </div>

    <div class="text-center">
        <div class="row mt-5">
            <div class="col-12">





                <?php
                /* ------------------------------- Controlador Frontal ------------------------------ */

                if (!empty($_GET['action']))
                    $action = $_GET['action'];


                if (!empty($_GET['controller'])) {
                    $controllerName = $_GET['controller'];

                    $controllerPath = 'controllers/' . $controllerName . 'Controller.php';
                    require $controllerPath;

                    $controllerName = $controllerName . 'Controller';
                    $controller = new $controllerName;
                    $controller->$action();
                }

                ?>
            </div>
        </div>
    </div>



</body>

</html>
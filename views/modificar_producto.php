<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$nombre = $_GET['nombre'];
$cantidad = $_GET['cantidad'];
$precio = $_GET['precio'];
?>

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
        background-image: url('https://wallpapers.com/images/hd/oil-painting-grocery-store-ygcx29mhyvo4dxvg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
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
        <form action="principal_productos.php?controller=Producto&action=mostrar" method="post">
            <button type="submit">Regresar</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Modificar producto</h2>
                        <form action="principal_productos.php?controller=Producto&action=modificar" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del producto:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="<?php echo $nombre; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio del producto:</label>
                                <input type="number" class="form-control" id="precio" name="precio"
                                    value="<?php echo $precio; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad disponible:</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad"
                                    value="<?php echo $cantidad; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoria_id" class="form-label">Categoría del producto:</label>
                                <select class="form-select" name="categoria_id">
                                    <?php
                                    for ($i = 0; $i < count($datos); $i++) {
                                        echo "<option value=\"" . $datos[$i]['id'] . "\">" . $datos[$i]['nombre'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
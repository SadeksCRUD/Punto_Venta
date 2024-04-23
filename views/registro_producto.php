<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <script src="https://kit.fontawesome.com/44b97a816e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Insertar producto</title>
</head>
<style>
    body {
        background-image: url('https://us.123rf.com/450wm/valeriikhadeiev/valeriikhadeiev2005/valeriikhadeiev200500158/147960871-big-shop-super-market-shopping-mall-tienda-interior-dentro-de-estantes-con-caja-registradora-de.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .card-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<body> 
    <div class="container card-container">
        <div class="card p-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Agregar Producto</h2>
                <form action="principal_productos.php?controller=Producto&action=insertar" method="post">
                    <!-- Descripción del artículo -->
                    <div class="mb-2">
                        <label for="nombre" class="form-label">Ingrese el nombre del producto:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <!-- Precio -->
                    <div class="mb-2">
                        <label for="precio" class="form-label">Ingrese el precio del producto:</label>
                        <input type="number" class="form-control" id="precio" name="precio" required>
                    </div>
                    <!-- Cantidad -->
                    <div class="mb-2">
                        <label for="cantidad" class="form-label">Ingrese la existencia del producto:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                    </div>
                    <!-- Seleccionar rubro -->
                    <div class="mb-2">
                        <label for="categoria_id" class="form-label">Seleccione el rubro del artículo:</label>
                        <select name="categoria_id" class="form-select">
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

</body>

</html>
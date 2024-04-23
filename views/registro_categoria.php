<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <script src="https://kit.fontawesome.com/44b97a816e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Insertar categoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://wallpapers.com/images/hd/oil-painting-grocery-store-ygcx29mhyvo4dxvg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
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

<div class="navbar">
    <form action="../principal_categorias.php?controller=Categoria&action=mostrar" method="post">
        <button type="submit">Regresar</button>
    </form>
</div>

<body
    style="background-image: url('https://wallpapers.com/images/hd/oil-painting-grocery-store-ygcx29mhyvo4dxvg.jpg'); background-size: cover;">
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4">
            <h2 class="mb-3 text-center">Agregar categoria</h2>
            <form action="../principal_categorias.php?controller=Categoria&action=insertar" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Ingrese la categoría:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>
    </div>
</body>

</html>
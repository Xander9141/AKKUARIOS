<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" crossorigin="anonymous" />
</head>

<body>
    <div class="title">
        <h1>CRUD de Productos</h1>
    </div>

    <?php
    // Establecer la conexión a la base de datos
    $host = 'localhost:3307';
    $usuario = 'root';
    $contrasena = 'root';
    $basedatos = 'productos_k';
    $conexion = new mysqli($host, $usuario, $contrasena, $basedatos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Mostrar formulario para insertar un nuevo producto
    echo '
    <div class="container">
        <div class="title">
            <h3>Agregar Nuevo Producto</h3>
        </div>
        <form action="insert.php" method="post" class="product-form">
            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" name="sku" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion"></textarea>
            </div>
            <div class="form-group">
                <label for="precio_neto">Precio Neto:</label>
                <input type="number" name="precio_neto" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="precio_iva">Precio con IVA:</label>
                <input type="number" name="precio_iva" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="precio_descuento">Precio con Descuento:</label>
                <input type="number" name="precio_descuento" step="0.01">
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" name="categoria">
            </div>
            <div class="form-group">
                <label for="imagen">URL de la Imagen:</label>
                <input type="text" name="imagen">
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" required>
            </div>
            <div class="form-group">
                <input type="submit" name="agregar" value="Agregar Producto">
            </div>
        </form>
    </div>';

    // Agregar un nuevo producto
    if (isset($_POST['agregar'])) {
        $sku = $_POST['sku'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio_neto = $_POST['precio_neto'];
        $precio_iva = $_POST['precio_iva'];
        $precio_descuento = $_POST['precio_descuento'];
        $categoria = $_POST['categoria'];
        $imagen = $_POST['imagen'];
        $stock = $_POST['stock'];

        $sql = "INSERT INTO productos (sku, nombre, descripcion, precio_neto, precio_iva, precio_descuento, categoria, imagen, stock) VALUES ('$sku', '$nombre', '$descripcion', '$precio_neto', '$precio_iva', '$precio_descuento', '$categoria', '$imagen', '$stock')";

        if ($conexion->query($sql) === TRUE) {
            echo '<p>Producto agregado correctamente.</p>';
        } else {
            echo '<p>Error al agregar el producto: ' . $conexion->error . '</p>';
        }
    }
    ?>

    <div class="filter">
        <form action="" method="GET">
            <label for="search">Buscar:</label>
            <input type="text" name="search" id="search">
            <input type="submit" value="Buscar">
        </form>
    </div>

    <?php

    // Obtener el término de búsqueda del formulario
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];

        // Modificar la consulta SQL para incluir el término de búsqueda
        $sql = "SELECT * FROM productos WHERE nombre LIKE '%$searchTerm%' OR descripcion LIKE '%$searchTerm%'";

        // Ejecutar la consulta SQL y mostrar los resultados
        $result = $conexion->query($sql);

        // Mostrar los productos encontrados
        if ($result->num_rows > 0) {
            echo '<div class="container">
                    <div class="title">
                        <h3>Resultados de la Búsqueda</h3>
                    </div>';
            echo '<div class="grid-container">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="grid-item">';
                echo '<h4>' . $row['nombre'] . '</h4>';
                echo '<p>' . $row['descripcion'] . '</p>';
                echo '<p>ID: ' . $row['sku'] . ' | Stock: ' . $row['stock'] . '</p>';
                echo '<img src="' . $row['imagen'] . '" alt="imagen de producto" style="max-width: 100px;">';
                echo '<p class="precio-iva">' . $row['precio_iva'] . '</p>';
                echo '<p>Precio efectivo</p>';
                echo '<button class="cart-button"> Carrito de compra</button>';
                // Botón de editar
                echo '<a href="edit.php?id=' . $row['id'] . '" class="edit-button"> Editar</a>';

                // Botón de eliminar
                echo '<form action="delete.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <button type="submit" class="delete-button"> Eliminar</button>
                    </form>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="container">
                    <div class="title">
                        <h3>Resultados de la Búsqueda</h3>
                    </div>';
            echo '<p>No se encontraron productos que coincidan con la búsqueda.</p>';
            echo '</div>';
        }
    }

    // Cerrar la conexión
    $conexion->close();
    ?>

    <footer class="footer">
        <div class="footer-content">
            <p>© 2024 CRUD de Productos. Todos los derechos reservados.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

</body>

</html>

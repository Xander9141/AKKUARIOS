<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Producto</h1>

    <?php
    // Verificar si se recibió un parámetro de ID para editar
    if (isset($_GET['id'])) {
        // Obtener el ID del producto a editar
        $id = $_GET['id'];

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

        // Obtener los datos del producto a editar
        $sql = "SELECT * FROM productos WHERE id=$id";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar el formulario de edición con los datos del producto
            $row = $result->fetch_assoc();
            echo '
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                <label for="sku">SKU:</label>
                <input type="text" name="sku" value="' . $row['sku'] . '" required><br>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="' . $row['nombre'] . '" required><br>
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion">' . $row['descripcion'] . '</textarea><br>
                <label for="precio_neto">Precio Neto:</label>
                <input type="number" name="precio_neto" value="' . $row['precio_neto'] . '" step="0.01" required><br>
                <label for="precio_iva">Precio con IVA:</label>
                <input type="number" name="precio_iva" value="' . $row['precio_iva'] . '" step="0.01" required><br>
                <label for="precio_descuento">Precio con Descuento:</label>
                <input type="number" name="precio_descuento" value="' . $row['precio_descuento'] . '" step="0.01"><br>
                <label for="categoria">Categoría:</label>
                <input type="text" name="categoria" value="' . $row['categoria'] . '"><br>
                <label for="imagen">URL de la Imagen:</label>
                <input type="text" name="imagen" value="' . $row['imagen'] . '"><br>
                <label for="stock">Stock:</label>
                <input type="number" name="stock" value="' . $row['stock'] . '" required><br>
                <input type="submit" name="editar" value="Editar Producto">
            </form>';
        } else {
            echo '<p>No se encontró ningún producto con el ID proporcionado.</p>';
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        echo '<p>No se proporcionó un ID de producto para editar.</p>';
    }
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

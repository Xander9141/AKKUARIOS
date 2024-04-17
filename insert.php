<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Obtener los datos del formulario
    $sku = $_POST['sku'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_neto = $_POST['precio_neto'];
    $precio_iva = $_POST['precio_iva'];
    $precio_descuento = $_POST['precio_descuento'];
    $categoria = $_POST['categoria'];
    $imagen = $_POST['imagen'];
    $stock = $_POST['stock'];

    // Preparar la consulta SQL para insertar un nuevo producto
    $sql = "INSERT INTO productos (sku, nombre, descripcion, precio_neto, precio_iva, precio_descuento, categoria, imagen, stock) VALUES ('$sku', '$nombre', '$descripcion', '$precio_neto', '$precio_iva', '$precio_descuento', '$categoria', '$imagen', '$stock')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        // Redirigir al usuario a la página de inicio
        header("Location: inicio.php");
        exit(); // Asegurarse de que el script se detenga después de la redirección
    } else {
        echo "Error al agregar el producto: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

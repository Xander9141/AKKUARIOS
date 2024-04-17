<link rel="stylesheet" href="styles.css">
<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer la conexión a la base de datos
    $host = 'localhost:3307'; // Cambia esto por tu host
    $usuario = 'root'; // Cambia esto por tu usuario
    $contrasena = 'root'; // Cambia esto por tu contraseña
    $basedatos = 'productos_k'; // Cambia esto por el nombre de tu base de datos
    $conexion = new mysqli($host, $usuario, $contrasena, $basedatos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $id = $_POST['id']; // Suponiendo que tienes un campo oculto en tu formulario con el ID del producto
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_neto = $_POST['precio_neto'];
    $precio_iva = $_POST['precio_iva'];
    $precio_descuento = $_POST['precio_descuento'];
    $categoria = $_POST['categoria'];
    $imagen = $_POST['imagen'];
    $stock = $_POST['stock'];

    // Preparar la consulta SQL para actualizar el producto
    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio_neto='$precio_neto', precio_iva='$precio_iva', precio_descuento='$precio_descuento', categoria='$categoria', imagen='$imagen', stock='$stock' WHERE id=$id";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        // Redirigir al usuario a inicio.php con un mensaje de éxito
        header("Location: inicio.php?mensaje=Producto+actualizado+exitosamente");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se recibió una solicitud POST, redirigir al usuario a alguna página de error o a donde sea apropiado
    header("Location: error.php");
    exit(); // Asegurar que el script se detenga después de redirigir
}
?>

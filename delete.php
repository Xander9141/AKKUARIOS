<link rel="stylesheet" href="styles.css">
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

    // Obtener el ID del producto a eliminar
    $id = $_POST['id'];

    // Preparar la consulta SQL para eliminar el producto
    $sql = "DELETE FROM productos WHERE id=$id";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conexion->query($sql) === TRUE) {
        echo "<h1>Producto eliminado correctamente.</h1>";
        echo "<p>Serás redirigido a la página de inicio en 5 segundos.</p>";
        // Redireccionar a la página de inicio después de 5 segundos
        header("refresh:5; url=inicio.php");
        exit; // Detener la ejecución del script
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

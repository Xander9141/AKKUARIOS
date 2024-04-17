<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <?php
    // Verificar si se recibió una solicitud POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Verificar el usuario y contraseña
        if ($usuario === 'admin' && $contrasena === '123456') {
            // Usuario y contraseña válidos, redirigir a inicio.php
            header('Location: inicio.php');
            exit;
        } else {
            // Usuario o contraseña incorrectos, mostrar mensaje de error
            echo '<p class="error-message">Usuario o contraseña incorrectos.</p>';
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>

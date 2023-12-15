<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="index.php?&accion=login" method="post">
            <label for="usuario">Correo: </label>
            <input type="text" name="correo" required><br>

            <label for="contrasena">Contraseña: </label>
            <input type="password" name="contrasena" required><br>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>

    <p><a href="index.php?controlador=controlador_registro&accion=instalacion">Instalacion (si, esto no debería existir)</a>.</p>
</body>
</html>

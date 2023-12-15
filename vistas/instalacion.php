<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Instalación</title>
</head>
<body>
    <div class="container">
        <h2>Asignar Administrador</h2>
        <form action="?controlador=controlador_registro&accion=register" method="post">
            <label for="correo">Correo electrónico: </label>
            <input type="email" name="correo" required><br>

            <label for="contrasena">Contraseña: </label>
            <input type="password" name="contrasena" required><br>

            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" required><br>

            <input type="hidden" name="perfil" required value="ADMIN"><br>

            <input type="submit" value="Registrar">
        </form>
        <p>¿Ya tienes una cuenta? <a href="index.php">Inicia sesión</a>.</p>
    </div>
</body>
</html>
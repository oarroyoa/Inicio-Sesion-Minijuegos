<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el perfil de administrador
if (isset($_SESSION['idusuario']) && isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'ADMIN') {
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' type='text/css' href='css/styles.css'>
    <title>Panel de Administración</title>
</head>
<body>";

    echo "<h2>Bienvenido al Panel de Administración, {$_SESSION['nombre']}!</h2>";
    echo "<p>Aquí puedes realizar tareas administrativas.</p>";
    echo "<p><a href='index.php?controlador=controlador_registro&accion=registro'>Registrar administradores</a>.</p>";
    echo "<p><a href='index.php?accion=logout'>Cerrar sesión</a></p>";

    echo "</body>
</html>";
} else {
    // Si el usuario no tiene permisos de administrador, redirigirlo a otra página
    header('location: index.php?accion=logout');
    exit();
}
?>

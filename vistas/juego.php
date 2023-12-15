<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el perfil de juego
if (isset($_SESSION['idusuario']) && isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'JUEGO') {
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' type='text/css' href='css/styles.css'>
    <title>Juego</title>
</head>
<body>";

    echo "<h2>Bienvenido al Juego, {$_SESSION['nombre']}!</h2>";
    echo "<p>¡Disfruta de tu experiencia de juego!</p>";
    echo "<p><a href='index.php?accion=logout'>Cerrar sesión</a></p>";

    echo "</body>
</html>";
} else {
    // Si el usuario no tiene permisos de juego, redirigirlo a otra página
    header('Location: index.php?accion=logout');
    exit();
}
?>
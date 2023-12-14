<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el perfil de juego
if (isset($_SESSION['idusuario']) && isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'JUEGO') {
    // El usuario tiene acceso a la página de juego
    echo "<h2>Bienvenido al Juego, {$_SESSION['nombre']}!</h2>";
    echo "<p>¡Disfruta de tu experiencia de juego!</p>";
    echo "<p><a href='index.php?accion=logout'>Cerrar sesión</a></p>";
} else {
    // Si el usuario no tiene permisos de juego, redirigirlo a otra página
    header('Location: index.php?accion=logout');
    exit();
}
?>

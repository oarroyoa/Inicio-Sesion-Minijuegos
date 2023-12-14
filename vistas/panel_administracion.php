<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene el perfil de administrador
if (isset($_SESSION['idusuario']) && isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'ADMIN') {

    echo "<h2>Bienvenido al Panel de Administración, {$_SESSION['nombre']}!</h2>";
    echo "<p>Aquí puedes realizar tareas administrativas.</p>";
    echo "<p><a href='index.php?controlador=controlador_registro&accion=registro'>Registrar administradores</a>.</p>    ";
    echo "<p><a href='index.php?accion=logout'>Cerrar sesión</a></p>";
} else {
    echo "<h1>¿Qué haces aquí?</h1></br>";
    echo "<img src='https://editorial01.shutterstock.com/preview-440/437041a/a1999462/Shutterstock_437041a.jpg'>";
    echo "<audio autoplay loop>
        <source src='vistas/heehee.mp3' type='audio/mp3'>
        Tu navegador no soporta audio HTML5.
    </audio>";

    // Código JavaScript para cambiar el color del fondo cada 0.1 segundos
    echo "<script>
            setInterval(function(){
                document.body.style.backgroundColor = getRandomColor();
            }, 1);

            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
          </script>";
}
?>

<?php
require_once 'modelos/modelo_login.php';

class controlador_login {
    private $modelo;
    public $vista;

    public function __construct() {
        $this->modelo = new ModeloLogin();
        $this->vista = null;
    }
    public function inicio() {
        $this->vista = 'inicio';
    }
    public function panel_administracion() {
        $this->vista = 'panel_administracion';
    }
    public function juego() {
        $this->vista = 'juego';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $usuario = $this->modelo->validarUsuario($correo, $contrasena);

            if ($usuario) {
                session_start();
                $_SESSION['idusuario'] = $usuario['idUsuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['perfil'] = $usuario['perfil'];

                if ($usuario['perfil'] == 'ADMIN') {
                    header('Location: index.php?controlador=controlador_login&accion=panel_administracion');
                } elseif ($usuario['perfil'] == 'JUEGO') {
                    header('Location: index.php?controlador=controlador_login&accion=juego');
                } else {
                    echo "Perfil no válido. Deberías estar en algún lugar.";
                }
            } else {
                echo "Error: " . $this->modelo->getError();
            }
        }
    }
    public function logout(){
        session_start();

        // Destruir todas las variables de sesión
        session_destroy();

        // Redirigir al usuario a la página de inicio
        header('Location: index.php');
        exit();
    }
}
?>

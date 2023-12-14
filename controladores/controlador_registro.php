<?php
require_once 'modelos/modelo_registro.php';

class controlador_registro {
    private $modelo;
    public $vista;

    public function __construct() {
        $this->modelo = new ModeloRegistro();
        $this->vista = null;
    }
    public function registro(){
        $this->vista = 'registro';
    }
    
    public function instalacion(){
        $this->vista = 'instalacion';
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $perfil = $_POST['perfil'];

            $exito = $this->modelo->registrarUsuario($nombre, $correo, $contrasena, $perfil);

            if ($exito) {
                echo "Registro exitoso. Ahora puedes iniciar sesión.";
                // Puedes redirigir a la página de inicio de sesión u otra vista según tus necesidades
            } else{
                echo "Error en el registro. Puede que esté intentando agregar un superadministrador tras haber realizado la instalación";
            }
        }
    }
}
?>

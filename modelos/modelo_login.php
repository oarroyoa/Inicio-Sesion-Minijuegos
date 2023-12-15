<?php
require_once("conexion.php");

class ModeloLogin extends Conexion {
    private $error;

    public function getError() {
        return $this->error;
    }

    public function validarUsuario($correo, $contrasena) {
        $idUsuario = $nombre = $perfil = $hashContrasena = null;

        $sql = "SELECT idUsuario, nombre, perfil, pw FROM administradores WHERE correo = ?";
        
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();
        
        $stmt->bind_result($idUsuario, $nombre, $perfil, $hashContrasena);
        
        if ($stmt->num_rows > 0) {
            $stmt->fetch();

            // Verificar la contraseña hasheada
            if (password_verify($contrasena, $hashContrasena)) {
                $stmt->close();
                $this->conexion->close();

                // Iniciar sesión
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['idUsuario'] = $idUsuario;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['perfil'] = $perfil;

                return $_SESSION;
            } else {
                $this->error = "Contraseña incorrecta";
            }
        } else {
            $this->error = "Usuario no encontrado";
        }

        $stmt->close();
        $this->conexion->close();

        return false;
    }
}
?>

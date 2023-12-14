<?php
require_once("conexion.php");

class ModeloRegistro extends Conexion {
    public function agregarRegistro($nombre, $correo, $contrasena, $perfil) {
        $hashContrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        $sqlInsertar = "INSERT INTO administradores (nombre, correo, pw, perfil) VALUES (?, ?, ?, ?)";
        $stmtInsertar = $this->conexion->prepare($sqlInsertar);
        $stmtInsertar->bind_param("ssss", $nombre, $correo, $hashContrasena, $perfil);
        $resultInsertar = $stmtInsertar->execute();
        
        $stmtInsertar->close();
        $this->conexion->close();

        return $resultInsertar;
    }

    public function registrarUsuario($nombre, $correo, $contrasena, $perfil) {
        // Asegúrate de realizar la validación y limpieza de datos necesarios
        if ($perfil == 'ADMIN') {
            // Verificar si ya existe un perfil ADMIN con el mismo correo
            $sqlVerificar = "SELECT COUNT(*) as count FROM administradores WHERE perfil = 'ADMIN'";
            
            $stmtVerificar = $this->conexion->prepare($sqlVerificar);
            $stmtVerificar->execute();
            $resultVerificar = $stmtVerificar->get_result();
            $row = $resultVerificar->fetch_assoc();

            if ($row['count'] > 0) {
                // Ya existe un perfil ADMIN con el mismo correo, no se inserta
                $stmtVerificar->close();
                $this->conexion->close();
                return false;
            } else {
                // Llama a la función agregarRegistro
                return $this->agregarRegistro($nombre, $correo, $contrasena, $perfil);
            }
        } else {
            // Llama a la función agregarRegistro
            return $this->agregarRegistro($nombre, $correo, $contrasena, $perfil);
        }
    }
}
?>

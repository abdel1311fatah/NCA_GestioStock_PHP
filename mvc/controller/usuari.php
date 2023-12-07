<?php
require_once "mvc/model/ModelBase.php";
require_once "mvc/model/usuari.php"; 

class usuariController {

    public function insertarUsuario($nomUsuari, $nom, $cognom, $dni, $contrasenya) {
        $user = new usuari();
        $user->setNomUsuari($nomUsuari);
        $user->setNom($nom);
        $user->setCognom($cognom);
        $user->setDni($dni);
        $user->setContrasenya($contrasenya);
        
        $inserted = $user->insertar();
        
        if ($inserted) {
            return "Usuario insertado correctamente.";
        } else {
            return "Error al insertar el usuario.";
        }
    }

    public function eliminarUsuario($nomUsuari) {
        $user = new usuari();
        $user->setNomUsuari($nomUsuari);
        
        $deleted = $user->delete();
        
        if ($deleted) {
            return "Usuario eliminado correctamente.";
        } else {
            return "Error al eliminar el usuario.";
        }
    }

}
?>

<?php 
require_once "mvc/model/producte/producte.php";

class producteController {

    public function mostrartot() {  
        $producte = new Producte;
        $productes = $producte->mostrar();
        require_once "mvc/views/producte/mostrarTotsProductes.php";
    }

    public function insertar() {
        require_once "mvc/views/producte/insertarProducte.php";
    }

    public function crear() {
        $producte = new Producte();
        $producte->setNomProducte($_POST["nomProducte"]);
        $producte->setDescripcio($_POST["descripcio"]);
        $producte->setPreu($_POST["preu"]);
        $producte->setStock($_POST["stock"]);
        $producte->insertar();
        header("Location:index.php?controller=producte&action=mostrartot");
    }
}
?>

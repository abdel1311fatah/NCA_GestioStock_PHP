<?php 
require_once "mvc/model/producte.php";

class producteController {

    public function mostrartot() { 

        $producte = new Producte(); 
        $productos = $producte->mostrar(); 

        require_once "mvc/views/mostrarTotsProductes.php";
    }

    public function insertar() {
        require_once "mvc/views/insertarProducte.php";
    }

    public function crear() {
        
        $producte = new Producte();
        $producte->setMarca($_POST["marca"]);
        $producte->setModel($_POST["model"]);
        // guardar la foto a img/producte
        $producte->setFoto($_POST["imagenBase64"]);
        $producte->setArxivat($_POST["arxivat"]);
        $producte->setData($_POST["data"]);
        $producte->setCategoria($_POST["categoria"]);
        $producte->insertar();

    }
}

?>
<?php 
require_once "mvc/model/producte.php";

class producteController {

    public function mostrartot() {  
        // Obtener los productos desde el modelo
        $modelProducte = new Producte(); // Instancia del modelo Producte
        $productos[] = $modelProducte->mostrar(); // Método mostrar() que obtiene los productos

        require_once "mvc/views/mostrarTotsProductes.php";
    }

    public function insertar() {
        require_once "mvc/views/insertarProducte.php";
    }

    public function crear() {
        $producte = new Producte();

        $producte->setMarca($_POST["marca"]);
        $producte->setModel($_POST["model"]);
        $producte->setFoto($_POST["imagenBase64"]);
        $producte->setArxivat($_POST["arxivat"]);
        $producte->setData($_POST["data"]);
        $producte->setCategoria($_POST["categoria"]);
        $producte->insertar();
        header("Location:index.php?controller=producte&action=mostrartot"); // Modifica la ruta de redirección si es necesario
    }
}

?>

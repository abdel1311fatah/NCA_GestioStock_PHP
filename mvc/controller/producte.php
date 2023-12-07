<?php 
require_once "mvc/model/producte.php";

class producteController {

    public function mostrartot() {  
        $connexio = database::conectar();
        $sql = "SELECT * FROM Productes";
        $result = mysqli_query($connexio, $sql);

        $productos = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productos[] = $row;
            }
        }

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
        header("Location:producte.php?controller=producte&action=mostrartot");
    }
}
?>

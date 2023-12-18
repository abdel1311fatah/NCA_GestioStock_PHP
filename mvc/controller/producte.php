<?php
require_once "mvc/model/producte.php";

class producteController
{

    public function mostrartot()
    {

        $producte = new Producte();
        $productos = $producte->mostrar();
        /* foreach ($productos as $producto) {
            echo $producto;
        } */

        require_once "mvc/views/mostrarTotsProductes.php";
    }

    public function mostrarTotsArchivats()
    {

        $producte = new Producte();
        $productos = $producte->mostrarArchivats();
        /* foreach ($productos as $producto) {
            echo $producto;
        } */

        require_once "mvc/views/archivarProductes.php";
    }

    public function insertar()
    {
        require_once "mvc/views/insertarProducte.php";
    }

    public function crear()
    {
        $producte = new Producte();
        $producte->setMarca($_POST["marca"]);
        $producte->setModel($_POST["model"]);

        // Verificar si no hubo errores al subir la imagen
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['imagen'];

            // Verificar si es un tipo de imagen permitido
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (in_array($_FILES['imagen']['type'], $allowedTypes)) {
                $uploadPath = 'img/productes/' . basename($file['name']);

                // Mover la imagen cargada al directorio de destino
                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    // Establecer el nombre de la imagen en el objeto Producte
                    $producte->setFoto(basename($file['name']));

                    // Resto de los set y la inserción en la base de datos
                    $producte->setArxivat($_POST["arxivat"]);
                    $producte->setData($_POST["data"]);
                    $producte->setCategoria($_POST["categoria"]);
                    $producte->insertar();
                } else {
                    echo 'Error al subir la imagen. Verifica los permisos y los logs del servidor.';
                }
            } else {
                echo 'Tipo de archivo no válido. Sube una imagen JPEG, JPG, PNG o GIF.';
            }
        } else {
            echo 'Error al subir la imagen. Código de error: ' . $_FILES['imagen']['error'];
        }
    }

    public function archivarProducto()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $producte = new Producte();
            $archivado = $producte->archivar($id);

            if ($archivado > 0) {
                echo "El producto ha sido archivado correctamente.";
            } else {
                echo "Hubo un problema al archivar el producto.";
            }
        } else {
            echo "No se proporcionó un ID válido para archivar.";
        }
    }

}
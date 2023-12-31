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

    public function mostrarTotsDesarchivats()
    {

        $producte = new Producte();
        $productos = $producte->mostrarDesarchivats();
        /* foreach ($productos as $producto) {
            echo $producto;
        } */

        require_once "mvc/views/desarxivarProductes.php";
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

        if ($_POST["fotoOption"] === 'subir') {
            // Subir imagen desde archivo
            if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['imagen'];

                $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (in_array($_FILES['imagen']['type'], $allowedTypes)) {
                    $uploadPath = 'img/productes/' . basename($file['name']);

                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        $producte->setFoto(basename($file['name']));
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
        } elseif ($_POST["fotoOption"] === 'hacer') {
            // Capturar imagen desde la cámara
            $data = $_POST['imagenBase64'];
            $timestamp = time();
            $imageName = $timestamp . '_imagen.png';

            // Asignar el nombre generado al producto
            $producte->setFoto($imageName);
            $producte->setArxivat($_POST["arxivat"]);
            $producte->setData($_POST["data"]);
            $producte->setCategoria($_POST["categoria"]);
            $producte->insertar();
        }
    }


    public function archivarProducto()
    {
        $id = $_GET['id'];
        $producte = new Producte();
        $producte->archivar($id);
        header("Location: index.php?controller=producte&action=mostrarTotsArchivats");
        /*if (isset($_POST['id'])) {
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
        }*/
    }

    public function desarchivarProducto()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $producte = new Producte();
            $desarchivado = $producte->desarchivar($id);

            if ($desarchivado > 0) {
                echo "El producto ha sido desarchivado correctamente.";
            } else {
                echo "Hubo un problema al desarchivar el producto.";
            }
        } else {
            echo "No se proporcionó un ID válido para desarchivar.";
        }
    }


    public function buscarProducte()
    {
        if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
            $product_id = $_POST['product_id'];
            $producte = new Producte();
            $producto = $producte->find($product_id);

            if ($producto) {
                require_once "mvc/views/mostrarProducte.php"; 
            } else {
                echo "No se encontró ningún producto con ese ID.";
            }
        } else {
            echo "No se proporcionó un ID válido.";
            echo $_POST['product_id'];
        }
    }




    public function mostrarActualitzar()
    {
        require_once "mvc/views/mostrarActualitzar.php";
    }

    public function actualitzar()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $producte = new Producte();
            $producte->setMarca($_POST["marca"]);
            $producte->setModel($_POST["model"]);

            if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['imagen'];

                $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (in_array($_FILES['imagen']['type'], $allowedTypes)) {
                    $uploadPath = 'img/productes/' . basename($file['name']);

                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        $producte->setFoto(basename($file['name']));
                        $producte->setArxivat($_POST["arxivat"]);
                        $producte->setData($_POST["data"]);
                        $producte->setCategoria($_POST["categoria"]);
                        $updated = $producte->update($id);

                        if ($updated) {
                            echo "El producto ha sido actualizado correctamente.";
                        } else {
                            /* echo $id;  per mirar que hagui agafat be el id*/
                            echo "Hubo un problema al actualizar el producto.";
                        }
                    } else {
                        echo 'Error al subir la imagen. Verifica los permisos y los logs del servidor.';
                    }
                } else {
                    echo 'Tipo de archivo no válido. Sube una imagen JPEG, JPG, PNG o GIF.';
                }
            } else {
                echo 'Error al subir la imagen. Código de error: ' . $_FILES['imagen']['error'];
            }
        } else {
            echo "No se proporcionó un ID válido para actualizar.";
        }
    }
}

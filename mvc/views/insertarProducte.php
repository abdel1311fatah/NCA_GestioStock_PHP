<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insertar Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mt-5 mb-4">Insertar Nuevo Producto</h2>
                <form class="form-container" action="insertarProducte.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>
                    <!-- Campo de la foto -->
                    <div class="mb-3">
                        <label for="fotoOption" class="form-label">Opción de Foto</label>
                        <select class="form-select" id="fotoOption" name="fotoOption" required>
                            <option value="subir">Subir Imagen</option>
                            <option value="hacer">Hacer Foto</option>
                        </select>
                    </div>
                    <div id="subirFoto" class="mb-3">
                        <label for="imagen" class="form-label">Subir Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                    <div id="hacerFoto" class="mb-3" style="display: none;">
                        <label for="camara" class="form-label">Hacer Foto</label>
                        <button type="button" class="btn btn-primary" id="verPrevisualizacion">Ver Previsualización</button>
                        <div id="previsualizacion" style="display: none;"></div>
                    </div>
                    <!-- Fin del campo de la foto -->
                    <div class="mb-3">
                        <label for="arxivat" class="form-label">Archivado</label>
                        <select class="form-select" id="arxivat" name="arxivat" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="data" name="data" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" required>
                    </div>
                    <button type="submit" name="insertar" class="btn btn-primary">Insertar</button>

                    <?php
                        $producte = new Producte();
                        if(isset($_POST['insertar'])){
                            $producte->setMarca($_POST["marca"]);
                            $producte->setModel($_POST["model"]);
                            $producte->setFoto($_POST["imagenBase64"]);
                            $producte->setArxivat($_POST["arxivat"]);
                            $producte->setData($_POST["data"]);
                            $producte->setCategoria($_POST["categoria"]);
                            $producte->insertar();
                            header("Location:producte.php?controller=producte&action=mostrartot");
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
        document.getElementById('fotoOption').addEventListener('change', function() {
            var subirFoto = document.getElementById('subirFoto');
            var hacerFoto = document.getElementById('hacerFoto');
            if (this.value === 'subir') {
                subirFoto.style.display = 'block';
                hacerFoto.style.display = 'none';
            } else if (this.value === 'hacer') {
                subirFoto.style.display = 'none';
                hacerFoto.style.display = 'block';
            }
        });

        document.getElementById('verPrevisualizacion').addEventListener('click', function() {
            // Aquí puedes agregar el código para capturar la foto de la cámara y mostrar la previsualización
        });
    </script>
</body>

</html>

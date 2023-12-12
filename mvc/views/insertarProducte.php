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
                    <!-- <div class="mb-3">
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
                    </div> -->
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
                            $producte->setFoto("hola");
                            $producte->setArxivat($_POST["arxivat"]);
                            $producte->setData($_POST["data"]);
                            $producte->setCategoria($_POST["categoria"]);
                            $resultat = $producte->insertar();
                            if($resultat){
                                echo "<div class='alert alert-success mt-3'>Producto insertado correctamente</div>";
                                header("Location:producte.php?controller=producte&action=mostrartot");
                            }else{
                                echo "<div class='alert alert-danger mt-3'>Error: El producto no se ha podido insertar</div>";
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        
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
            var previsualizacion = document.getElementById('previsualizacion');
            var video = document.createElement('video');
            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');
            var width = 320;
            var height = 0;

            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(err) {
                    console.log("An error occurred: " + err);
                });

            video.addEventListener('canplay', function(ev) {
                if (!streaming) {
                    height = video.videoHeight / (video.videoWidth / width);
                    video.setAttribute('width', width);
                    video.setAttribute('height', height);
                    canvas.setAttribute('width', width);
                    canvas.setAttribute('height', height);
                    streaming = true;
                }
            }, false);

            video.addEventListener('click', function(ev) {
                context.drawImage(video, 0, 0, width, height);
                var data = canvas.toDataURL('image/png');
                document.getElementById('imagenBase64').value = data;
                previsualizacion.innerHTML = '<img src="' + data + '"/>';
            }, false);
        });
    </script> -->
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Actualizar Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos CSS */
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mt-5 mb-4">Actualizar Producto</h2>
                <?php
                $idProducto = $_GET['id'] ?? null; // Obtener el ID del producto a actualizar

                if ($idProducto !== null) {
                    $producte = new Producte();
                    $producto = $producte->find($idProducto);

                    if ($producto && isset($producto['id'])) {
                ?>
                        <form class="form-container" action="../../index.php?controller=producte&action=actualitzar" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="id" value="<?php echo isset($producto['id']) ? $producto['id'] : ''; ?>">
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="marca" name="marca" value="<?php echo isset($producto['marca']) ? $producto['marca'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="model" name="model" value="<?php echo isset($producto['model']) ? $producto['model'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="fotoOption" class="form-label">Opción de Foto</label>
                                <select class="form-select" id="fotoOption" name="fotoOption" required>
                                    <option value="subir" <?php if (isset($producto['fotoOption']) && $producto['fotoOption'] == 'subir') echo 'selected'; ?>>Subir Imagen</option>
                                    <option value="hacer" <?php if (isset($producto['fotoOption']) && $producto['fotoOption'] == 'hacer') echo 'selected'; ?>>Hacer Foto</option>
                                </select>
                            </div>
                            <div id="subirFoto" class="mb-3">
                                <label for="imagen" class="form-label">Subir Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>
                            <div id="hacerFoto" class="mb-3" style="<?php if (isset($producto['fotoOption']) && $producto['fotoOption'] != 'hacer') echo 'display:none;'; ?>">
                                <label for="camara" class="form-label">Hacer Foto</label>
                                <button type="button" class="btn btn-primary" id="capturarFoto">Capturar Foto</button>
                                <div id="cuadroCamara">
                                    <video id="videoCamara" width="320" height="240" autoplay></video>
                                    <canvas id="canvas" width="320" height="240"></canvas>
                                </div>
                            </div>
                            <input type="hidden" id="imagenBase64" name="imagenBase64">
                            <div class="mb-3">
                                <label for="arxivat" class="form-label">Archivado</label>
                                <select class="form-select" id="arxivat" name="arxivat" required>
                                    <option value="1" <?php if (isset($producto['arxivat']) && $producto['arxivat'] == 1) echo 'selected'; ?>>Sí</option>
                                    <option value="0" <?php if (isset($producto['arxivat']) && $producto['arxivat'] == 0) echo 'selected'; ?>>No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="data" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="data" name="data" value="<?php echo isset($producto['data']) ? $producto['data'] : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo isset($producto['categoria']) ? $producto['categoria'] : ''; ?>" required>
                            </div>
                            <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                        </form>

                <?php
                    } else {
                        echo "El producto no se encontró.";
                    }
                } else {
                    echo "ID de producto no proporcionado.";
                }
                ?>
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

        document.getElementById('capturarFoto').addEventListener('click', function() {
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            var video = document.getElementById('videoCamara');

            context.drawImage(video, 0, 0, 320, 240);
            var data = canvas.toDataURL('image/png'); // Tipo de imagen, en este caso PNG
            var timestamp = Date.now(); // Genera un timestamp único en milisegundos
            var imageName = timestamp + '_imagen.png'; // Nombre de la imagen con el timestamp

            // Asigna el nombre de la imagen al campo oculto
            document.getElementById('imagenBase64').value = imageName;

            // Mostrar la foto capturada en el cuadro de la cámara
            var fotoPrevia = document.createElement('img');
            fotoPrevia.src = data;
            fotoPrevia.style.width = '100%';
            fotoPrevia.style.height = '100%';
            document.getElementById('cuadroCamara').innerHTML = '';
            document.getElementById('cuadroCamara').appendChild(fotoPrevia);
        });


        // Obtener acceso a la cámara y mostrar la previsualización
        var video = document.getElementById('videoCamara');
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                video: true
            }).then(function(stream) {
                video.srcObject = stream;
                video.play();
            });
        }
    </script>
</body>

</html>
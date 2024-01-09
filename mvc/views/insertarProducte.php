<!-- <!DOCTYPE html>
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

        #cuadroCamara {
            position: relative;
            width: 320px;
            height: 240px;
            overflow: hidden;
        }

        #videoCamara {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
    </style>
</head>

<body> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mt-5 mb-4">Insertar Nuevo Producto</h2>
                <form class="form-container" action="../../index.php?controller=producte&action=crear" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>
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
<!-- </body>

</html> -->
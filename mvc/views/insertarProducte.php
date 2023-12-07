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
                <form class="form-container" action="index.php?controller=producte&action=crear" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model" required>
                    </div>
                    <!-- Agregar campo para la foto con captura de la cámara -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <video id="video" width="640" height="480" autoplay></video>
                        <br>
                        <button id="captureButton" class="btn btn-primary">Capturar Foto</button>
                        <canvas id="canvas" width="640" height="480" style="display: none;"></canvas>
                        <input type="hidden" id="imagenBase64" name="imagenBase64"> <!-- Campo oculto para la imagen -->
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
                    <button type="submit" class="btn btn-primary">Insertar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        //script per a fer la foto des de la camara
        document.addEventListener("DOMContentLoaded", function() {
            var video = document.getElementById('video');
            var canvas = document.getElementById('canvas');
            var captureButton = document.getElementById('captureButton');
            var imagenBase64Input = document.getElementById('imagenBase64');

            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    video.srcObject = stream;
                })
                .catch(function(error) {
                    console.error('Error al activar la cámara:', error);
                });

            captureButton.addEventListener('click', function() {
                var context = canvas.getContext('2d');
                context.drawImage(video, 0, 0, canvas.width, canvas.height);

                // Convierte la imagen a base64
                var imagenBase64 = canvas.toDataURL('image/png');
                imagenBase64Input.value = imagenBase64; // Asigna la imagen al campo oculto

                // Envia la imagen al controlador mediante una solicitud fetch
                fetch('index.php?controller=imagen&action=capturarImagen', {
                        method: 'POST',
                        body: 'data=' + encodeURIComponent(imagenBase64),
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    })
                    .then(response => response.json())
                    .then(data => console.log(data))
                    .catch(error => console.error('Error al enviar la imagen:', error));
            });
        });
    </script>
</body>

</html>

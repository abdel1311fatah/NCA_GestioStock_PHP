<!DOCTYPE html>
<html lang="en">

<head>
    <title>Actualizar Producto</title>
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

        /* Agregar estilos adicionales si es necesario */
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mt-5 mb-4">Actualizar Producto</h2>
                <form class="form-container" action="../../index.php?controller=producte&action=actualitzar"
                    enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca"
                            value="<?php echo $producto['marca']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model"
                            value="<?php echo $producto['model']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="arxivat" class="form-label">Archivado</label>
                        <select class="form-select" id="arxivat" name="arxivat" required>
                            <option value="1" <?php if ($producto['arxivat'] == 1)
                                echo 'selected'; ?>>Sí</option>
                            <option value="0" <?php if ($producto['arxivat'] == 0)
                                echo 'selected'; ?>>No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="data" name="data"
                            value="<?php echo $producto['data']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <input type="text" class="form-control" id="categoria" name="categoria"
                            value="<?php echo $producto['categoria']; ?>" required>
                    </div>
                    <!-- Agregar otros campos aquí según el modelo Producte -->
                    <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Agregar scripts adicionales si es necesario -->
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insertar Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos adicionales -->
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
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="mt-5 mb-4">Insertar Producto</h2>
                <form action="index.php?controller=producte&action=crear" method="post">
                    <div class="mb-3">
                        <label for="nomProducte" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" name="nomProducte" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcio" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcio" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="preu" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="preu" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" name="stock" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Insertar Producto</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

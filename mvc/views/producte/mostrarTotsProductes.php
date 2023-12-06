<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mostrar Todos los Productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos adicionales -->
    <style>
        body {
            padding-top: 50px;
        }

        .table-container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mt-5 mb-4">Todos los Productos</h2>
                <table class="table table-striped table-bordered table-hover table-responsive table-container">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productes as $producte) { ?>
                            <tr>
                                <td><?php echo $producte['id']; ?></td>
                                <td><?php echo $producte['nomProducte']; ?></td>
                                <td><?php echo $producte['descripcio']; ?></td>
                                <td><?php echo $producte['preu']; ?></td>
                                <td><?php echo $producte['stock']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="index.php?controller=producte&action=insertar" class="btn btn-primary mb-4">Insertar Producto</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

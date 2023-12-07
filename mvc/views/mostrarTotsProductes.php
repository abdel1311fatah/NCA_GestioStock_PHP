<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mostrar Todos los Productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <th>Marca</th>
                            <th>Model</th>
                            <th>Foto</th>
                            <th>Arxivat</th>
                            <th>Data</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) { ?>
                            <tr>
                                <td><?php echo $producto['id']; ?></td>
                                <td><?php echo $producto['marca']; ?></td>
                                <td><?php echo $producto['model']; ?></td>
                                <td><img src="<?php echo $producto['foto']; ?>" alt="Foto del Producto" width="100"></td>
                                <td><?php echo $producto['arxivat']; ?></td>
                                <td><?php echo $producto['data']; ?></td>
                                <td><?php echo $producto['categoria']; ?></td>
                               
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

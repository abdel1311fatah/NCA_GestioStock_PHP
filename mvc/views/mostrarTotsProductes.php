<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mostrar Productos</title>
    <!-- Agrega tus estilos aquí -->
</head>

<body>
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
            <?php
            foreach ($productos as $producto) { ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['marca']; ?></td>
                    <td><?php echo $producto['model']; ?></td>
                    <!-- Mostrar la imagen utilizando la etiqueta <img> -->
                    <td><img src="img/productes/<?php echo $producto['foto']; ?>" alt="Foto del Producto" width="100"></td>
                    <td><?php echo $producto['arxivat']; ?></td>
                    <td><?php echo $producto['data']; ?></td>
                    <td><?php echo $producto['categoria']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="http://localhost:8000/mvc/views/insertarProducte.php" class="btn btn-primary mb-4">Insertar Producto</a>

</body>

</html>

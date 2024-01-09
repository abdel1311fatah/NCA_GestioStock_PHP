<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mostrar Productos</title>
</head>

<body>
    <form action="../../index.php?controller=producte&action=buscarProducte" method="POST">
        <label for="product_id">Buscar por ID:</label>
        <input type="text" id="product_id" name="product_id">
        <button type="submit">Buscar</button>
    </form>

    <?php echo $_POST['product_id']; ?>

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
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) { ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['marca']; ?></td>
                    <td><?php echo $producto['model']; ?></td>
                    <td><img src="img/productes/<?php echo $producto['foto']; ?>" alt="Foto del Producto" width="100"></td>
                    <td><?php echo $producto['arxivat']; ?></td>
                    <td><?php echo $producto['data']; ?></td>
                    <td><?php echo $producto['categoria']; ?></td>
                    <td><a name="" id="" class="btn btn-primary" href="https://nca.gnulinuxes.com/index.php?controller=producte&action=mostrarActualitzar&id=<?php echo $producto['id']?>"  role="button">Actualitzar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="http://localhost:8000/mvc/views/insertarProducte.php" class="btn btn-primary mb-4">Insertar Producto</a>
</body>

</html>

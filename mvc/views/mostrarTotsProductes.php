<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mostrar Productos</title>
    <!-- Agrega tus estilos aquí -->
</head>

<body>
    <form action="../../index.php?controller=producte&action=buscarProducte" method="get">
        <label for="product_id">Buscar por ID:</label>
        <input type="text" id="product_id" name="product_id">
        <button type="submit">Buscar</button>
    </form>

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
            <?php if ($producto) { ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['marca']; ?></td>
                    <td><?php echo $producto['model']; ?></td>
                    <td><img src="img/productes/<?php echo $producto['foto']; ?>" alt="Foto del Producto" width="100"></td>
                    <td><?php echo $producto['arxivat']; ?></td>
                    <td><?php echo $producto['data']; ?></td>
                    <td><?php echo $producto['categoria']; ?></td>
                </tr>
            <?php } else { ?>
                <?php foreach ($productos as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['marca']; ?></td>
                        <td><?php echo $producto['model']; ?></td>
                        <td><img src="img/productes/<?php echo $producto['foto']; ?>" alt="Foto del Producto" width="100"></td>
                        <td><?php echo $producto['arxivat']; ?></td>
                        <td><?php echo $producto['data']; ?></td>
                        <td><?php echo $producto['categoria']; ?></td>
                        <td>
                            <!-- Corregir la forma de incrustar la variable $id -->
                            <form action="../../index.php?controller=producte&action=mostrarActualitzar&id=<?php echo $producto['id']; ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <a href="http://localhost:8000/mvc/views/insertarProducte.php" class="btn btn-primary mb-4">Insertar Producto</a>
</body>

</html>

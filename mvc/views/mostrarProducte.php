<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detalles del Producto</title>
    <!-- Agrega tus estilos aquí -->
</head>

<body>
    <h1>Detalles del Producto</h1>

    <form action="index.php?controller=producte&action=buscarProducte" method="POST">
        <label for="product_id">Buscar por ID:</label>
        <input type="text" id="product_id" name="product_id">
        <button type="submit">Buscar</button>
    </form>

    <?php if (!empty($producto)) { ?>
        <table class="table table-striped table-bordered table-hover table-responsive table-container" id="taulaProductes">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Foto</th>
                    <th>Archivado</th>
                    <th>Fecha</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['marca']; ?></td>
                    <td><?php echo $producto['model']; ?></td>
                    <td><img src="img/productes/<?php echo $producto['foto']; ?>" alt="Foto del Producto" width="100"></td>
                    <td><?php echo $producto['arxivat']; ?></td>
                    <td><?php echo $producto['data']; ?></td>
                    <td><?php echo $producto['categoria']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No se ha encontrado ningún producto con ese ID.</p>
    <?php } ?>
    <form action="../../index.php?controller=producte&action=mostrartot" method="GET">
        <button type="submit" class="btn btn-primary">Volver</button>
    </form>
</body>

</html>

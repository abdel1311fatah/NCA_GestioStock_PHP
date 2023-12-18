<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mostrar Productos Archivados</title>
    <!-- Agrega tus estilos aquí -->
</head>

<body>
    <!-- Formulario para filtrar por ID -->
    <form action="../../index.php?controller=producte&action=find" method="GET">
        <label for="id">Buscar por ID:</label>
        <input type="text" id="id" name="id">
        <button type="submit">Buscar</button>
    </form>

    <!-- Tabla de productos -->
    <table class="table table-striped table-bordered table-hover table-responsive table-container">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Foto</th>
                <th>Archivado</th>
                <th>Fecha</th>
                <th>Categoría</th>
                <th>Acción</th>
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
                    <td>
                        <form action="../../index.php?controller=producte&action=desarchivarProducto" method="POST">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <button type="submit" class="btn btn-danger">Desarchivar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <form action="../../index.php?controller=producte&action=insertar" method="GET">
        <button type="submit" class="btn btn-primary mb-4">Insertar Producto</button>
    </form>

</body>

</

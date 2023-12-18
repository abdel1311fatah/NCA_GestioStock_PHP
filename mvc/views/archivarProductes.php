<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mostrar Productos Archivados</title>
    <!-- Agrega tus estilos aquí -->
</head>

<body>
    <!-- Formulario para filtrar por ID -->
    <form action="ruta_del_controlador_para_filtrar_por_id" method="GET">
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
            </tr>
        </thead>
        <tbody>
            <?php
            // Aquí deberás implementar la lógica para mostrar los productos archivados
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

    <!-- Enlace para insertar nuevo producto -->
    <a href="http://localhost:8000/mvc/views/insertarProducte.php" class="btn btn-primary mb-4">Insertar Producto</a>

</body>

</html>

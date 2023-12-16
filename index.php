<!doctype html>
<html lang="es">

<head>
    <title>PcComponents 2.0</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="img/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/generals.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>


<?php

require_once "autoload.php";

if (isset($_GET["controller"]) && class_exists($_GET["controller"])) {
    $nomcontroller = $_GET["controller"] . "Controller";
    $controller = new $nomcontroller();

    if (isset($_GET["action"]) && method_exists($controller, $_GET["action"])) {
        $action = $_GET["action"];
        $controller->$action();
    } else {
        echo $_GET["action"] . " no existeix aquest metode";
    }
} else {
    echo $_GET["controller"] .  " no existeix el controlador";
}

?>

<body>
    <header>
        <h1>
            PcComponents 2.0 - NCA Gestió d'Inventari
        </h1>
    </header>
    <nav class="nav justify-content-center  ">
        <a class="nav-link active" href="login.php" aria-current="page">Login</a>
        <a class="nav-link active" href="register.php" aria-current="page">Register</a>
        <a class="nav-link active" href="mvc/views/mostrarTotsProductes.php" aria-current="page">Mirar tots els productes</a>
        <a class="nav-link active" href="index.php?controller=producte&action=insertar" aria-current="page">Insertar productes</a>
    </nav>
    <main>
        <article>
            <section>
                <h2>
                    Per a què que serveix aquesta pàgina web?
                </h2>
                <p>
                    En la pàgina web de PcComponents 2.0 serveix per a gestionar els productes de l'empresa de forma òptima i tot el que pugui girar al voltant seu com per exemple quins llogaters han agafat un o més productes o també veure quints productes estan arxivats.
                </p>
            </section>
        </article>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
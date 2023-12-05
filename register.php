<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/generals.css">
</head>

<body>
    <header>
        <h1>Register</h1>
    </header>
    <main>
        <article>
            <section>
                <div class="loginRegistre">
                    <form action="register.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nom:</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Cognom:</label>
                            <input type="surname" class="form-control" name="surname" placeholder="Cognom">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control" name="username" placeholder="Nom d' usuario">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contrasenya:</label>
                            <input type="password" class="form-control" name="password" placeholder="Contrasenya">
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI:</label>
                            <input type="text" class="form-control" name="dni" placeholder="DNI">
                        </div>
                        <button type="submit" name="register" class="btn btn-primary">Registrarse</button>
                    </form>
                </div>
            </section>
        </article>
    </main>
    <?php

    if (isset($_POST['register'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['nombre'];
        $surname = $_POST['surname'];
        $dni = $_POST['dni'];

        if (empty($name) || empty($surname) || empty($username) || empty($password) || empty($dni)) {
            echo "Has de completar tots els camps";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $bd = new database();
            $conexio = $bd->conectar();
            $sql = "INSERT INTO Usuarios 
            (nomUsuari, nom, cognoms, dni, contrasenya) VALUES ('$username', '$name', '$surname', '$dni', '$hashedPassword')";

            if (mysqli_query($conexio, $sql)) {
                echo "Has insertat el usuari";
            } else {
                echo "No has pogut crear l' usuari: " . mysqli_error($conexio);
            }

        }
    } else {
        echo "Hi ha un fallo a les dades";
    }
    ?>
</body>

</html>
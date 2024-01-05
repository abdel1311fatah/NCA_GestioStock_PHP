<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/generals.css">
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <article>
            <section>
                <div class="loginRegistre">
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control" name="username" placeholder="Nom d' usuari">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contrasenya:</label>
                            <input type="password" class="form-control" name="password" placeholder="Contrasenya">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Iniciar sesión</button>
                    </form>
                </div>
                <?php
                require_once "config/conexio.php";

                $bd = new database();
                $conexio = $bd->conectar();
                if (isset($_POST['login'])) {

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (empty($username) || empty($password)) {
                        echo "Has de completar tots els camps";
                    } else {

                        $sql = "SELECT * FROM Usuari WHERE nomUsuari='$username'";
                        $result = mysqli_query($conexio, $sql);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $hashedPassword = $row['contrasenya'];
                                if (password_verify($password, $hashedPassword)) {
                                    header("index.php?controller=producte&action=mostrartot");
                                    echo "¡Inicio de sesión exitoso!";
                                } else {
                                    echo "Contraseña incorrecta";
                                }
                            } else {
                                echo "No se encontró ningún usuario con ese nombre";
                            }
                        } else {
                            echo "Error: " . mysqli_error($conexio);
                        }
                    }
                }
                ?>
            </section>
        </article>
    </main>

</body>

</html>

<!doctype html>
<html lang="en">

    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/generals.css">
    </head>

    <body>
        <header>
            <h1>
                Login
            </h1>
        </header>
        <main>
            <article>
                <section>
                    <div class="loginRegistre">
                        <form action="login.php" method="post">
                            <div class="mb-3">
                              <label for="" class="form-label">Nom d'usuari:</label>
                              <input type="text" class="form-control" name="username" aria-describedby="helpId" placeholder="Nom d'Usuari">
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label">Contrasenya:</label>
                              <input type="password" class="form-control" name="password" placeholder="Contrasenya">
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                            <button type="submit" name="registra" class="btn btn-primary">Registrate</button>
                            <?php
                                $bd = new database();
                                $conexio = $bd->conectar();
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                if(isset($_POST['login'])){
                                    $sql = "SELECT * FROM Usuari WHERE nomUsuari = '$username' AND contrasenya = '$password'; ";
                                    $resultat = mysqli_query($conexio, $sql);
                                    if(mysqli_num_rows($resultat) == 1){
                                        header("location:mostrarTotsProductes.php");
                                    }else{
                                        echo "Usuari o contrasenya incorrectes";
                                    }
                                }
                            ?>    
                        </form>
                    </div>
                </section>
            </article>
        </main>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    </body>

</html>
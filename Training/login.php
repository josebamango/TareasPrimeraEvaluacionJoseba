<?php
require_once 'queriesPDO.php';
session_start();
$errorLogin = '';
if (isset($_POST['entrar'])) {
    $nombre = $_POST['id_cliente'];
    $pass = $_POST['pass'];
    if (empty($_POST['id_cliente']) || empty($_POST['pass'])) {
        $errorLogin = "Introduce todos los datos!";
    } else {
        if ((checkUsuarioPass($nombre, $pass)) !== 0) {
            $_SESSION['visitante'] = getUsuario($nombre, $pass);
            header("Location: viajes.php");
            exit();
        } else {
            $errorLogin = "Error de login!";
        }
    }
}

?>


<!--<link rel='stylesheet' href='bootstrap-4.5.3-dist\css/bootstrap.min.css'>-->

<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-2">
            <legend class="text-center text-primary">Login</legend>
            <form action="" method="post">
                <input type="text" name="id_cliente" class="form-control mb-3" placeholder="Usuario">
                <input type="password" name="pass" class="form-control" placeholder="Usuario">
                <div class="text-center">
                    <input type="submit" name="entrar" class="btn btn-success mt-3">
                </div>
            </form>
            <p class="alert alert-info mt-3" role="alert"><?= $errorLogin ?></p>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
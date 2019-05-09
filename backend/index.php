<?php
session_start();
print_r($_SESSION);
require "../kernel/functions.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h1>Identifiez vous !</h1>
            <?= getFlash()?>
            <form action="../controllers/login.php" method="POST">
                <div class="form-group">
                    <label for="login">Votre login</label>
                    <input class="form-control" type="text" name="login" id="login">
                </div>
                <div class="form-group">
                    <label for="password">Votre mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group text-right">
                    <input type="submit" class="btn btn-primary" value="Se connecter">
                </div>
            </form>
        </div>
    </div>
</div>



</body>
</html>
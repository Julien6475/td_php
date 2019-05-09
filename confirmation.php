<?php

//Recuperation de la session
session_start();

//Verification presence de la preuve d'inscription dans la session
if(isset($_SESSION['is_inscrit']) == false) {
    $messages = ["Vous n'avez pas le droit de consulter cette page !"];
    $_SESSION['messages'] = $messages;
    header('location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
MERCI POUR VOTRE INSCRIPTION !
</body>
</html>
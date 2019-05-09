<?php

// 1 - Connexion a la db

require '../kernel/db_connect.php';

// 2 - Recup des données du form

require '../kernel/functions.php';
require '../models/user.php';
$fields_required=['login', 'password'];
$datas_form = extractDatasForm($_POST, $fields_required);

// 3 - Verif des champs bien remplis

if(in_array(null,$datas_form)) {
    $messages[] = "tous les champs sont obligatoires";
}

// 4 - Lancer requete SQL pour recuperer le user avec le login saisi

$user = findOneUserBy('login', $datas_form['login']);
if (count($user) != 1 ) {
    $messages[] = "impossible de vous identifier";
}

// 5 - Comparer le mot de passe stocké dans la db au mot de passe saisi par le user

else if(password_verify($datas_form['password'], $user[0]['password'])) {

// 6 - Si comparaison ok > is_admin == 1 ??

    if ($user[0]['is_admin'] == false) {
        $messages[] = "Vous n'avez pasle droit d'acceder";
    }
    else {
        // 7 - Si user est admin > démarrage session, stockage dans la session d'une preuve d'identification
        session_start();
        $_SESSION["is_admin"] = true;
        // 8 - Redirection du user vers la page gestion.php (page à creer)
        header('Location: ../backend/gestion.php');
        exit();
    }
}

else {
    $messages[]="Mauvais mot de passe";
}




// Gestion des erreurs avec la variable $_SESSION['messages']

// Cumul des messages d'erreur et redirection du user sur le form de login avec affichage des erreurs

session_start();
$_SESSION['messages'] = $messages;
header('Location: ../backend/index.php');
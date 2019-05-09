<?php

function findOneUserBy($critere,$value) {
    // SQL
    //Recuperation de la variable
    global $db;
//    $sql = "SELECT * FROM users WHERE email = 'm.de.ubeda@gmail.com'";


    $sql = "SELECT * FROM users WHERE $critere = :value";
    //    $sql = "SELECT * FROM users WHERE $critere = '$value'";


    //preparer la requete

    $stmt = $db-> prepare($sql);
    $stmt->bindParam(":value", $value, PDO::PARAM_STR);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultat=$stmt->fetchAll();

    /*echo "<pre>";
    var_dump($resultat);
    echo "</pre>";*/
    return $resultat;
}


function addUser(array $datas){
    global $db;
    $sql = "INSERT INTO users (login,email,password,nom,prenom,is_admin,created_at) VALUES (:login,:email,:password,:nom,:prenom,:is_admin,:created_at)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":login",$datas['login'], PDO::PARAM_STR);
    $stmt->bindParam(":email",$datas['email'], PDO::PARAM_STR);
    $stmt->bindParam(":password", password_hash($datas['login'], PASSWORD_ARGON2I) ,PDO::PARAM_STR);
    $stmt->bindParam(":nom",$datas['nom'], PDO::PARAM_STR);
    $stmt->bindParam(":prenom",$datas['prenom'], PDO::PARAM_STR);
    $stmt->bindValue(":is_admin", 0, PDO::PARAM_STR);
    $stmt->bindParam(":created_at",date('Y-m-d H:i:s'), PDO::PARAM_STR);
    $stmt -> execute();
}

function findAllUsers(){
    $sql ="SELECT * FROM users";
    global $db;
    $sql="SELECT * FROM users";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultat = $stmt->fetchAll();
    return $resultat;
}
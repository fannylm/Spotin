<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$req=$bdd -> query("SELECT * FROM Entrepreneur");
$res=$req -> fetch();
$username = $res['pseudo'];
$password = $res['mdp'];


if( isset($_POST['pseudo']) && isset($_POST['password']) ) {

    if ($_POST['pseudo'] == $username && $_POST['password'] == $password) { // Si les valeurs correspondent
        $_SESSION['user'] = $username;
        $_SESSION['prenom'] = $res['prenom'];
        $_SESSION['nom'] = $res['nom'];
        $_SESSION['id'] = $res['id'];
        session_start(); // démarrage de la session
        echo 'success';
    } else {
        echo 'failed';
    }
}

?>
<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$req = $bdd -> query("SELECT * FROM Entrepreneur WHERE pseudo='".$_POST['pseudo']."' AND mdp = '".hash('sha256', $_POST['password'])."'");

if($res=$req -> fetch()){
    // Déclaration des variables de session
    $_SESSION['user'] = $res['pseudo'];
    $_SESSION['prenom'] = $res['prenom'];
    $_SESSION['nom'] = $res['nom'];
    $_SESSION['id'] = $res['id'];
    session_start(); // démarrage de la session
    echo 'success';
} else {
    echo 'failed';
}

?>
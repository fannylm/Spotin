<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$req = $bdd -> query("SELECT * FROM Client WHERE pseudo='".$_POST['pseudo']."' AND mdp = '".hash('sha256', $_POST['password'])."'");

$res = $req -> fetch();

if( isset($_POST['pseudo']) && isset($_POST['password']) ) {
    // Déclaration des variables de session
        $_SESSION['user'] = $res['pseudo'];
        $_SESSION['prenom'] = $res['prenom'];
        $_SESSION['nom'] = $res['nom'];
        $_SESSION['mail'] = $res['mail'];
        $_SESSION['id'] = $res['id'];
        $_SESSION['tel'] = $res['telephone'];
        $_SESSION['birthday'] = $res['birthday'];
        session_start(); // démarrage de la session
        echo 'success';
    } else {
        echo 'failed';
}

?>
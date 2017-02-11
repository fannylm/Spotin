<?php

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$req=$bdd -> query("SELECT identifiant, mdp FROM Client");
$res=$req -> fetch();
$username = $res['identifiant'];
$password = $res['mdp'];


if( isset($_POST['username']) && isset($_POST['password']) ) {

    if ($_POST['username'] == $username && $_POST['password'] == $password) { // Si les valeurs correspondent
        $_SESSION['user'] = $username;
        session_start(); // démarrage de la session
        echo "Success";

    } else {
        echo "Failed";
    }
}

/*header('Location: connexion.php');*/

?>




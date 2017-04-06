<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$mdp1 = $_POST['mdp1'];

$password = hash('sha256', $mdp1);

$mail = $_POST['email'];
$date = $_POST['date'];
$tel = $_POST['tel'];

$bdd->exec("INSERT INTO Client (nom,prenom,pseudo,mdp,mail,birthday,telephone) VALUES ('$nom','$prenom','$pseudo','$password','$mail','$date','$tel')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
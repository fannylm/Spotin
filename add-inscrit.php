<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$sexe = $_POST['sexe'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$mdp1 = $_POST['mdp1'];

$password = hash('sha256', $mdp1);

$mail = $_POST['mail'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];

$bdd->exec("INSERT INTO Client (sexe,nom,prenom,pseudo,mdp,mail,birthday,telephone) VALUES ('$sexe','$nom','$prenom','$pseudo','$password','$mail','$birthday','$phone')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
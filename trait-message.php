<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$departement = $_POST['departement'];
$email = $_POST['email'];
$message = $_POST['message'];

$bdd->exec("INSERT INTO Contact (nom, prenom, departement, mail, message, statut) VALUES ('$nom','$prenom','$departement','$email','$message','A traiter')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
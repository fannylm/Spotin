<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$message = $_POST['message'];

$new_message = str_replace("'", "''", "$message");

$bdd->exec("INSERT INTO Contact (nom, prenom, mail, telephone, message, statut) VALUES ('$nom','$prenom','$email', '$tel','$new_message','A traiter')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
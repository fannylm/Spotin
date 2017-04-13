<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$prestation = $_POST['id'];
$date = $_POST['date'];
$message = $_POST['message'];
$expediteur = $_SESSION['id'];

$new_message = str_replace("'", "''", "$message");

$bdd->exec("INSERT INTO Devis (idExpediteur, idPrestation, date, message, statut) VALUES ('$expediteur','$prestation','$date','$new_message','A traiter')");


if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
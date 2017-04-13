<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$client = $_POST['idClient'];
$projet = $_POST['idProjet'];
$today = date("y.m.d");
$date = "20".$today;
$commentaire = $_POST['commentaire'];

$bdd->exec("INSERT INTO Commentaires (idClient, date, idProjet, commentaire) VALUES ('$client','$date','$projet','$commentaire')");

if($bdd) {
    echo 'success';
    echo 'Chargement...';
}
else{
    echo 'failed';
    echo "Erreur dans l'ajout du commentaire...";
}

?>



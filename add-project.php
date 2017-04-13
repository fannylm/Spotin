<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$titre = $_POST['titre'];
$description = $_POST['description'];
$date = $_POST['date'];

$bdd->exec("INSERT INTO Projet (titre, description, image, anneeRealisation) VALUES ('$titre','$description','images/Projets/$titre.png','$date')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>



<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$titre = $_POST['titre'];
$description = $_POST['description'];

$bdd->exec("INSERT INTO Projet (titre, description, image) VALUES ('$titre','$description','images/Projets/$titre.png')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
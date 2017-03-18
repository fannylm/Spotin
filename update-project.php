<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_POST['id'];
$titre = $_POST['titre'];
$description = $_POST['description'];

$bdd->exec("UPDATE Projet SET titre = '$titre', description = '$description' WHERE id = '$id'");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
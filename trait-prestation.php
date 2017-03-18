<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$type = $_POST['type'];
$nom = $_POST['nom'];

$bdd->exec("INSERT INTO Prestation (type,nom) VALUES ('$type','$nom')");

if($bdd) {
    echo 'success';
}
else {
    echo 'failed';
}

?>
<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_POST['id'];
$nom = $_POST['nom'];

$bdd->exec("UPDATE Prestation SET prestation = '$nom' WHERE id = '$id'");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
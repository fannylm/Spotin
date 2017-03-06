<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$destination = $_POST['destination'];

$bdd->exec("INSERT INTO DestinationVoyage (lieu) VALUES ('$destination')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$destination = $_POST['destination'];
$nbImages = $_POST['nbImages'];

$bdd->exec("INSERT INTO Voyage (lieu, nbImages) VALUES ('$destination','$nbImages')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
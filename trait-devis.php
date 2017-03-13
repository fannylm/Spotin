<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$name = $_SESSION['nom'];

$prestation = $_POST['id'];
$date = $_POST['date'];
$message = $_POST['message'];

$bdd->exec("INSERT INTO Devis (prestation, date, message, expediteur) VALUES ('$prestation','$date','$message','$name')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
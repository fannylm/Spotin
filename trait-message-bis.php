<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_SESSION['id'];
$message = $_POST['message'];

$bdd->exec("INSERT INTO ContactBis (idClient,message) VALUES ('$id','$message')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
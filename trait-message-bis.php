<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_SESSION['id'];
$message = $_POST['message'];

$new_message = str_replace("'", "''", "$message");

$bdd->exec("INSERT INTO ContactBis (idClient,message,statut) VALUES ('$id','$new_message','A traiter')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
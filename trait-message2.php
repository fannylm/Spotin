<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$message = $_POST['message2'];

$new_message = str_replace("'", "''", "$message");

$bdd->exec("INSERT INTO ContactBis (message, statut) VALUES ('$new_message','A traiter')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
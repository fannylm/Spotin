<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_POST['id'];

$bdd->exec("DELETE FROM Prestation WHERE id = '$id'");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
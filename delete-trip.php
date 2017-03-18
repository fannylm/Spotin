<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$lieu = $_POST['lieu'];

$bdd->exec("DELETE FROM Voyage WHERE Voyage.lieu = '$lieu'");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
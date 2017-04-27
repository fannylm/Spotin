<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$lieu = $_POST['lieu'];
$nbImages = $_POST['nbImages'];

$bdd->exec("UPDATE Voyage SET nbImages = '$nbImages' WHERE lieu = '$lieu'");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$lieu = $_POST['lieu'];

$bdd->exec("DELETE FROM `Voyages` WHERE `Voyages`.`destination` = '$lieu'; DELETE FROM `DestinationVoyage` WHERE `DestinationVoyage`.`lieu` = '$lieu'");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
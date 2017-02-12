<?php
/**
 * Created by PhpStorm.
 * User: fannylemorvan
 * Date: 06/02/17
 * Time: 23:01
 */

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$pseudo=$_POST['pseudo'];

$req=$bdd -> query("SELECT pseudo FROM Client WHERE pseudo='$pseudo'");
$res=$req -> fetch();

$username = $res['pseudo'];
$password = $res['mdp'];

$num=$req -> rowCount();

if($num>0){ // si les lignes reçues sont supérieures à 0 ça veut dire que le pseudo existe
    echo "1";
} else {
    echo "0";
}

?>
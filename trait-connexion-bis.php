<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$req = $bdd -> query("SELECT * FROM Entrepreneur WHERE pseudo='".$_POST['pseudo']."' AND mdp = '".hash('sha256', $_POST['password'])."'");

$req1=$bdd -> query("SELECT * FROM Contact WHERE statut='A traiter'");
$num=$req1 -> rowCount();

$req2=$bdd -> query("SELECT * FROM ContactBis, Client WHERE ContactBis.statut='A traiter' AND ContactBis.idClient=Client.id");
$num2=$req2 -> rowCount();

$req3=$bdd -> query("SELECT * FROM Devis, Client, Prestation WHERE Devis.statut='A traiter' AND Devis.idExpediteur=Client.id AND Devis.idPrestation=Prestation.id");
$num3=$req3 -> rowCount();

$numTotal=$num+$num2+$num3;

if($res=$req -> fetch()){
    // Déclaration des variables de session
    $_SESSION['user'] = $res['pseudo'];
    $_SESSION['prenom'] = $res['prenom'];
    $_SESSION['nom'] = $res['nom'];
    $_SESSION['id'] = $res['id'];
    $_SESSION['nbnotif']=$numTotal;
    session_start(); // démarrage de la session
    echo 'success';
} else {
    echo 'failed';
}

?>

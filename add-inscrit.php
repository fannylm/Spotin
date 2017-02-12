<?php

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

if( isset($_POST['sex']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo']) && isset($_POST['mdp2']) && isset($_POST['mail']) && isset($_POST['date-naissance']) && isset($_POST['phone'])) {

    $req = $bdd->query("INSERT INTO Client('sexe', 'nom', 'prenom', 'pseudo', 'mdp', 'mail', 'date-naissance', 'telephone')
VALUES (" . $_POST['sexe'] . ",'" . $_POST['nom'] . "," . $_POST['prenom'] . "," . $_POST['pseudo'] . "," . $_POST['mdp2'] . "," . $_POST['mail'] . "," . $_POST['date-naissance'] . "," . $_POST['phone'] . "')");
    $res = $req->fetch();
    echo 'Success';
}
else {
    echo 'Failed';
}




?>
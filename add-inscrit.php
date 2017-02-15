<?php

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];

if( isset($_POST['nom']) && isset($_POST['prenom'])){
    echo $_POST['nom'];
    echo $_POST['prenom'];
    /*$sql = "INSERT INTO `Entrepreneur`(`Id`, `Nom`, `Prenom`) VALUES (2,$nom,$prenom)";
    mysql_query($sql);*/
    $req = $bdd -> query("INSERT INTO `Entrepreneur`(`Id`, `Nom`, `Prenom`) VALUES (2,$nom,$prenom)");
    $res = $req -> fetch();
    echo 'success';
}
else{
    echo 'failed';
}
// Ajouter md5(password) pour crypter le mot de passe dans la base de données
/*
if( isset($_POST['sex']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo']) && isset($_POST['mdp2']) && isset($_POST['mail']) && isset($_POST['date-naissance']) && isset($_POST['phone'])) {

    $req = $bdd->exec("INSERT INTO Client('sexe', 'nom', 'prenom', 'pseudo', 'mdp', 'mail', 'date-naissance', 'telephone')
VALUES (" . $_POST['sexe'] . ",'" . $_POST['nom'] . "," . $_POST['prenom'] . "," . $_POST['pseudo'] . "," . $_POST['mdp2'] . "," . $_POST['mail'] . "," . $_POST['date-naissance'] . "," . $_POST['phone'] . "')");
    echo 'Success';
}
else {
    echo 'Failed';
}*/
?>
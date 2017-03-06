<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$sexe = $_POST['sex'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$mdp1 = $_POST['mdp1'];
$password = hash('sha256', $mdp1);
$mail = $_POST['mail'];
$birthday = $_POST['date-naissance'];
$phone = $_POST['phone'];

$bdd->exec("INSERT INTO Client (sexe,nom,prenom,pseudo,mdp,mail,birthday,telephone) VALUES ('$sexe','$nom','$prenom','$pseudo','$password','$mail','$birthday','$phone')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}


/*$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];

if( isset($_POST['nom']) && isset($_POST['prenom'])){
    echo $_POST['nom'];
    echo $_POST['prenom'];
    /*$sql = "INSERT INTO `Entrepreneur`(`Id`, `Nom`, `Prenom`) VALUES (2,$nom,$prenom)";
    mysql_query($sql);*/
    /*$req = $bdd -> query("INSERT INTO `Entrepreneur`(`Id`, `Nom`, `Prenom`) VALUES (2,$nom,$prenom)");
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
}




    INSERT INTO `Client`(`sexe`, `nom`, `prenom`, `pseudo`, `mdp`, `mail`, `date-naissance`, `telephone`) VALUES ('F','lemorvan','fny','fnylmrvn','caca','fny.lm@hotmail.fr','17/06/1995','0609571975')


    */

?>
<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_SESSION['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$birthday = $_POST['birthday'];

$bdd->exec("UPDATE Client SET nom = '$nom', prenom = '$prenom', pseudo = '$pseudo', mail = '$mail', telephone = '$tel', birthday = '$birthday' WHERE id = '$id'");

if($bdd) {
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['user']=$pseudo;
    $_SESSION['mail']=$mail;
    $_SESSION['tel']=$tel;
    $_SESSION['birthday']=$birthday;
    echo 'Chargement...';
    //echo 'success';
}
else{
    echo 'Erreur lors de la modification du champ...';
    //echo 'failed';
}

?>


<script>
    function redirection(){
        self.location.href="compte.php"
    }
    setTimeout(redirection,100);
</script>


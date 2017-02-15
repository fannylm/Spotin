<?php

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$req=$bdd -> query("SELECT * FROM Client");
$res=$req -> fetch();
$username = $res['pseudo'];
$password = $res['mdp'];


if( isset($_POST['pseudo']) && isset($_POST['password']) ) {

    if ($_POST['pseudo'] == $username && $_POST['password'] == $password) { // Si les valeurs correspondent
        $_SESSION['user'] = $username;
        $_SESSION['prenom'] = $res['prenom'];
        $_SESSION['nom'] = $res['nom'];
        $_SESSION['mail'] = $res['mail'];
        $_SESSION['id'] = $res['id'];
        session_start(); // démarrage de la session?>

<script>
    function redirection(){
        self.location.href="index.php"
    }
    setTimeout(redirection,5000);
</script>

    <?php
       // echo "<p style='text-align: center'>Vous êtes maintenant connecté " . $_SESSION['prenom'] . " ! Vous allez être automatiquement redirigé vers la page d'accueil. Si ça ne fonctionne pas, veuillez cliquer <a href='index.php'>ici</a></p>";
        echo 'success';
    } else {
        //echo "<p style='text-align: center'>Une erreur s'est produite pendant votre identification.</br>Cliquez <a href='./connexion.php'>ici</a> pour revenir à la page précédente<br />Cliquez <a href='./index.php'>ici</a> pour revenir à la page d'accueil</p>";
        echo 'failed';
    }
}

?>
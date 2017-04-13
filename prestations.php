<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Spotin' - Prestations</title>
    <link rel="icon" type="image/png" href="images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->


    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>

</head>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$req1=$bdd -> query("SELECT * FROM Contact WHERE statut='A traiter'");
$num=$req1 -> rowCount();

$req2=$bdd -> query("SELECT * FROM ContactBis, Client WHERE ContactBis.statut='A traiter' AND ContactBis.idClient=Client.id");
$num2=$req2 -> rowCount();

$req3=$bdd -> query("SELECT * FROM Devis, Client, Prestation WHERE Devis.statut='A traiter' AND Devis.idExpediteur=Client.id AND Devis.idPrestation=Prestation.id");
$num3=$req3 -> rowCount();

$numTotal=$num+$num2+$num3;

?>

<body>
<div id="page-wrapper">

    <!-- Header -->
    <div id="header">
        <p style="text-align:right; margin-bottom: 3em; margin-right: 10px; font-size: 12px; margin-top: 0;"><a href="connexion-bis.php" style="border-bottom: solid 1px lightgray; color: darkgrey;">Admin</a></p>
        <!-- Logo -->
        <a id="link_logo" href="index.php" style="color: white"><img src="images/LogoSpotin.png" alt="logo" height="10%" width="10%"></a>
        <h1><a href="index.php" id="logo">Spotin' - <em>Agence audiovisuel</em></a></h1>

        <!-- Nav -->
        <nav id="nav">
            <?php
            if(empty($_SESSION['user'])){ // aucun utilisateur connecté
                ?><ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li class="current"><a href="prestations.php">Prestations</a></li>
                    <li><a href="projets.php">Projets</a></li>
                    <li><a href="voyages.php">Voyages</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
            } else if (empty($_SESSION['mail'])) { // compte entreprise
                ?><ul style="padding-left: 270px;">
                <li><a href="index.php">Accueil</a></li>
                <li class="current"><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="a-propos.php">À propos</a></li>
                <li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li>
                <li><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 20px">
                        Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom']; echo " "; echo "<span style='color: #333;'>_</span>"; echo " ";
                        echo '<a class="cercle" href="notifications.php"> '.$numTotal.' </a>'; ?></a></li></ul>

                <?php
            } else { // compte client
                ?><ul style="padding-left: 300px;">
                <li><a href="index.php">Accueil</a></li>
                <li class="current"><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="a-propos.php">À propos</a></li>
                <li><a href="compte.php">Mon compte</a></li>
                <li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li>
                <li><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul>
            <?php
            }
            ?>
        </nav>

    </div>

    <!-- Main -->
    <section class="wrapper style1">
        <div class="container">

            <p><i>Les prix des prestations varient selon le profil, pour connaître les tarifs d'une prestation que vous souhaitez faire réaliser demander un devis gratuitement !</i></p><br/>
            <div id="photo">
                <i class="icon2 major2 fa fa-camera" style="font-size: 14pt; before: font-size: 16px;"></i><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prestations photographiques</strong>
            <br/>

            <?php

            $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

            $req=$bdd -> query("SELECT * FROM Prestation WHERE type='photo'");
            while($res=$req -> fetch()){
                echo "- ".$res['prestation']."<br/>";

                /*echo "<div id='compte3'>- ".$res['nom']."<i id='pencil' class='fa fa-pencil' aria-hidden='true' onclick='Update()'></i></div>
                    <div id='compte2' style='display: none;'><input type='text' name='nom' id='inputCompte' value=".$res['nom']."><input id='submitCompte' type='submit' class='button alt' value='Ok' /></div><br/>";
                */
            }

            ?>
            </div>
            <br/>
            <div id="video">
            <i class="icon2 major2 fa fa-video-camera"></i><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prestations audiovisuelles</strong>
            <br/>

            <?php

            $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

            $req=$bdd -> query("SELECT * FROM Prestation WHERE type='video'");
            while($res=$req -> fetch()){
                echo "- ".$res['prestation']."<br/>";
            }

            ?>
            </div>
            <br/><br/>

            <script>
                function Update(){
                    document.getElementById('compte3').style.display = "none";
                    document.getElementById('compte2').style.display = "flex";
                }
            </script>

            <?php
            if(empty($_SESSION['user'])){ // si la variable de session identifiant est nulle ou inexistante
                ?><a href="contact.php#devis" class="button">Devis gratuit</a><?php
            } else if (empty($_SESSION['mail'])) {
                ?><a style="padding:0; min-width: 11em" href="add-prestation.php" class="button">Nouvelle prestation</a>
                <a style="padding:0; min-width: 11em" href="update-prestation.php" class="button">Modifier une prestation</a>
                <a style="padding:0; min-width: 11em" href="delete-prestation.php" class="button">Supprimer une prestation</a>
            <?php
            } else {
                ?><a href="contact.php#devis" class="button">Devis gratuit</a><?php
            }
            ?>

            <!--<a href="contact.php#devis" class="button">Devis gratuit</a>-->

        </div>
    </section>

    <?php require("footer.html"); ?>

</div>

</body>
</html>
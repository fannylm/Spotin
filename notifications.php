<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Spotin' - Notifications</title>
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
                    <li><a href="prestations.php">Prestations</a></li>
                    <li><a href="projets.php">Projets</a></li>
                    <li><a href="voyages.php">Voyages</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
            } else if (empty($_SESSION['mail'])) { // compte entreprise
                ?><ul style="padding-left: 270px;">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
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
                <li><a href="prestations.php">Prestations</a></li>
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


            <h1 style="text-align: center; font-size: 30px;">Notifications</h1>

            <?php if(empty($_SESSION['user'])){ // aucun utilisateur connecté
                ?><p style="font-size: 20px; text-align: center;">Page inaccessible !</p>

            <?php } else if (empty($_SESSION['mail'])) { // compte entreprise

                ?><div id="notifications"> <?php
                $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                ?><h3>Messages des non-clients</h3><?php
                $req=$bdd -> query("SELECT * FROM Contact WHERE statut='A traiter'");
                $num=$req -> rowCount();
                if ($num==0){
                    echo 'Aucun nouveau message <br/><br/>' ;
                }
                else if ($num==1){
                    echo 'Un nouveau message : <br/><br/>' ;
                }
                else {
                    echo $num.' nouveaux messages : <br/><br/>' ;
                }
                while($res=$req -> fetch()){
                    echo "<strong> - ".$res['nom']." ".$res['prenom']."</strong> (".$res['departement']."), <a href='mailto:".$res['mail']."'>".$res['mail']."</a><br/>";
                    echo "Message : ".$res['message']."<br/><br/>";
                    echo '<br/>';
                }

                if (!$num==0){
                    echo '<a href="update-notif.php" class="button">Effacer</a>';
                }

                ?><br/><br/><h3>Messages des clients</h3><?php
                $req2=$bdd -> query("SELECT * FROM ContactBis, Client WHERE ContactBis.statut='A traiter' AND ContactBis.idClient=Client.id");
                $num2=$req2 -> rowCount();
                if ($num2==0){
                    echo 'Aucun nouveau message <br/><br/>' ;
                }
                if ($num2==1){
                    echo 'Un nouveau message : <br/><br/>' ;
                }
                else {
                    echo $num2.' nouveaux messages : <br/><br/>' ;
                }
                while($res2=$req2 -> fetch()){
                    echo "<strong> - ".$res2['nom']." ".$res2['prenom']."</strong>, <a href='mailto:".$res2['mail']."'>".$res2['mail']."</a><br/>";
                    echo "Message : ".$res2['message']."<br/><br/>";
                }
                if (!$num2==0) {
                    echo '<a href="update-notif2.php" class="button">Effacer</a>';
                }

                ?><br/><br/><br/><h3>Demande de devis</h3><?php

                $req3=$bdd -> query("SELECT * FROM Devis, Client, Prestation WHERE Devis.statut='A traiter' AND Devis.idExpediteur=Client.id AND Devis.idPrestation=Prestation.id");
                $num3=$req3 -> rowCount();
                if ($num3==0){
                    echo 'Aucune nouvelle demande <br/><br/>' ;
                }
                if ($num3==1){
                    echo 'Une nouvelle demande : <br/><br/>' ;
                }
                else {
                    echo $num3.' nouvelles demandes : <br/><br/>' ;
                }
                while($res3=$req3 -> fetch()){
                    echo "<strong> - ".$res3['nom']." ".$res3['prenom']."</strong>, <a href='mailto:".$res3['mail']."'>".$res3['mail']."</a><br/>";
                    echo "Prestation : ".$res3['prestation']."<br/>";
                    echo "Date de livraison souhaitée : ".$res3['date']."<br/>";
                    echo "Message : ".$res3['message']."<br/><br/>";
                }
                if (!$num3==0) {
                    echo '<a href="update-notif3.php" class="button">Effacer</a>';
                }

                ?></div>
                <br/><br/>


            <?php } else { // compte client
                ?>


            <?php } ?>

        </div>
    </section>

    <?php require("footer.html"); ?>

</div>

</body>
</html>
<?php session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Spotin' - Projets</title>
    <link rel="icon" type="image/png" href="images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>

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

$id_projet = $_GET['id_projet'];


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
                    <li class="current"><a href="projets.php">Projets</a></li>
                    <li><a href="voyages.php">Voyages</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
            } else if (empty($_SESSION['mail'])) { // compte entreprise
                ?><ul style="padding-left: 270px;">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li class="current"><a href="projets.php">Projets</a></li>
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
                <li class="current"><a href="projets.php">Projets</a></li>
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
    <section class="wrapper style1" style="padding: 3em 0 3em 0">
        <a style="margin-left:130px;" href="projets.php">Retour à la liste des projets</a>
        <div class="container">
            <article>
                <br/>
                <?php
                if(empty($_SESSION['user'])){ // aucun utilisateur connecté

                    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                    $req=$bdd -> query("SELECT * FROM Projet WHERE id=$id_projet");
                    while($res=$req -> fetch()){
                        echo"<div id=".$res['titre']."><h3>".$res['titre']."</h3></div>
                <img style='width:50%; display:flex; float:left;' src=".$res['image']."/>
                <div style='margin-left:33em' ><p><strong>Année de réalisation : </strong>".$res['anneeRealisation']."</p>
                <p><strong>Description</strong><br/>
                    ".$res['description']."</p></div>";
                    }

                    $requete=$bdd -> query("SELECT * FROM Commentaires, Client WHERE Commentaires.idProjet=$id_projet AND Commentaires.idClient=Client.id");
                    $numComs=$requete -> rowCount();
                    if ($numComs==0){
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>Aucun commentaire</strong></div><br/>";
                    }
                    else if ($numComs==1){
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>1 commentaire</strong></div><br/>";
                    } else {
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>" . $numComs . " commentaires</strong></div><br/>";
                    }

                while($resultat=$requete -> fetch()){?>
                    <div id="commentaires">
                        <p style="border-bottom: 2px solid black; margin-bottom: 1em; background-color: gainsboro"><?php echo $resultat['nom']." ".$resultat['prenom'] ?><span style="font-size: 14px; color: darkgrey"><?php echo " le ".$resultat['date']?></span></p>
                        <p><?php echo $resultat['commentaire']?></p>
                    </div>
                <?php } ?>

                <p><a href="connexion.php">Connectez-vous</a> si vous voulez poster un commentaire </p>

                <?php } else if (empty($_SESSION['mail'])) { // compte entreprise

                    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                    $req=$bdd -> query("SELECT * FROM Projet WHERE id=$id_projet");
                    while($res=$req -> fetch()){
                        echo"<div id=".$res['titre']."><h3>".$res['titre']."</h3></div>
                <img style='width:50%; display:flex; float:left;' src=".$res['image']."/>
                <div style='margin-left:33em' ><p><strong>Année de réalisation : </strong>".$res['anneeRealisation']."</p>
                <p><strong>Description</strong><br/>
                    ".$res['description']."</p></div>";
                    } ?>

                    <a style="padding:0; margin-left:2em" href="update-projet.php?id_projet=<?php echo $id_projet ?>" class="button">Modifier ce projet</a><br/><br/>
                    <a style="padding:0; margin-left:2em" href="delete-projet.php?id_projet=<?php echo $id_projet ?>" onclick="confirm('Êtes-vous sûr de vouloir supprimer le projet <?php $res['titre'] ?> ?')" class="button">Supprimer ce projet</a>

                    <?php
                    $requete=$bdd -> query("SELECT * FROM Commentaires, Client WHERE Commentaires.idProjet=$id_projet AND Commentaires.idClient=Client.id");
                    $numComs=$requete -> rowCount();
                    if ($numComs==0){
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>Aucun commentaire</strong></div><br/>";
                    }
                    else if ($numComs==1){
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>1 commentaire</strong></div><br/>";
                    } else {
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>" . $numComs . " commentaires</strong></div><br/>";
                    }

                while($resultat=$requete -> fetch()){?>
                    <div id="commentaires">
                        <p style="border-bottom: 2px solid black; margin-bottom: 1em; background-color: gainsboro"><?php echo $resultat['nom']." ".$resultat['prenom'] ?><span style="font-size: 14px; color: darkgrey"><?php echo $resultat['date']?></span></p>
                        <p><?php echo $resultat['commentaire']?></p>
                    </div>
                <?php }

                } else { // compte client

                    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                    $req=$bdd -> query("SELECT * FROM Projet WHERE id=$id_projet");
                    while($res=$req -> fetch()){
                        echo"<div id=".$res['titre']."><h3>".$res['titre']."</h3></div>
                <img style='width:50%; display:flex; float:left;' src=".$res['image']."/>
                <div style='margin-left:33em' ><p><strong>Année de réalisation : </strong>".$res['anneeRealisation']."</p>
                <p><strong>Description</strong><br/>
                    ".$res['description']."</p></div>";
                    }

                    $requete=$bdd -> query("SELECT * FROM Commentaires, Client WHERE Commentaires.idProjet=$id_projet AND Commentaires.idClient=Client.id");
                    $numComs=$requete -> rowCount();
                    if ($numComs==0){
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>Aucun commentaire</strong></div><br/>";
                    }
                    else if ($numComs==1){
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>1 commentaire</strong></div><br/>";
                    } else {
                        echo "<div id='numcommentaire' style='margin-top:14em'><strong>" . $numComs . " commentaires</strong></div><br/>";
                    }

                while($resultat=$requete -> fetch()){?>
                    <div id="commentaires">
                        <p style="border-bottom: 2px solid black; margin-bottom: 1em; background-color: gainsboro"><?php echo $resultat['nom']." ".$resultat['prenom']." " ?><span style="font-size: 14px; color: darkgrey"><?php echo" le ".$resultat['date']?></span></p>
                        <p><?php echo $resultat['commentaire']?></p>
                    </div>
                <?php } ?>

                    <a style="padding:0;width: 12em;height: 2em;line-height: 36px;" onclick="Commenter()" id="postercom" class="button">Ajouter un commentaire</a>
                    <!-- <form id="comms" method="POST" action="projet.php?id_projet=<?php echo $id_projet ?>">-->
                    <form id="comms" method="POST" action="add-commentaire.php">
                        <input type="hidden" id="idProjet" name="idProjet" value="<?php echo $id_projet ?>">
                        <input type="hidden" id="idClient" name="idClient" value="<?php echo $_SESSION['id'] ?>">
                        <label style='display:none; color:purple' for='commentaire' id='labelcom'>Votre commentaire</label><br/>
                        <textarea style='display:none' name='commentaire' id='commentaire' rows='4'></textarea><br/>
                        <input style='display:none' id='submitcom' type="submit" class='button alt' value='Ok'/>
                    </form>
                    <span class="right"></span>
                    <span class="error"></span>

                    <script>
                        function Commenter(){
                            document.getElementById('commentaire').style.display = "block";
                            document.getElementById('labelcom').style.display = "block";
                            document.getElementById('submitcom').style.display = "block";
                            document.getElementById('postercom').style.display = "none";
                        }

                        $('#submitcom').click(function() {
                            var commentaire = $('#commentaire').val();
                            if (commentaire == '') {
                                alert('Vous devez écrire un commentaire !');
                            }
                            else {
                                $.ajax({
                                    url: 'add-commentaire.php',
                                    type: 'POST',
                                    data : {
                                        commentaire: commentaire
                                    },
                                    success: function (data) {
                                        console.log(data);
                                        if (data = 'success') {
                                            document.getElementById('comms').style.display = "none";
                                            document.getElementById('postercom').style.display = "none";
                                        } else {
                                            document.getElementById('comms').style.display = "none";
                                            document.getElementById('postercom').style.display = "none";
                                        }
                                    }
                                });
                            }
                        });


                    </script>

                <?php } ?>

            </article>
        </div>
    </section>

    <?php require("footer.html"); ?>
</div>

</body>
</html>
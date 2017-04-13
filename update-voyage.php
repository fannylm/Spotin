<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Spotin' - Voyages</title>
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
                    <li class="current"><a href="voyages.php">Voyages</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
            } else if (empty($_SESSION['mail'])) { // compte entreprise
                ?><ul style="padding-left: 270px;">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li class="current"><a href="voyages.php">Voyages</a></li>
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
                <li class="current"><a href="voyages.php">Voyages</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="a-propos.php">À propos</a></li>
                <li><a href="compte.php">Mon compte</a></li>
                <li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li>

                <li class="cercle"><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul>

            <?php
            }
            ?>
        </nav>

    </div>
    <?php if(empty($_SESSION['user'])){

    } else if (empty($_SESSION['mail'])){ ?>
    <!-- Main -->
    <section class="wrapper style1">
        <div class="container">

            <fieldset id="cadre" class="fieldsetform"><legend><h2 id="title" type="title">Modifier un voyage existant</h2></legend>

            <form method="POST" id="voyage" action="update-voyage.php">
                <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                    <div class="12u">
                <label for="lieu">Quel voyage souhaitez-vous modifier ?</label>
                <select name="lieu" id="lieu">
                    <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
                    $req=$bdd -> query("SELECT * FROM Voyage");
                    while($res=$req -> fetch()){
                        echo "<option value=".$res['lieu'].">".$res['lieu']."</option><br/>";
                    }
                    ?>
                </select>
                        </div>
                    </div>
                <br/><br/>
                <!--<p>Ce voyage comporte actuellement 10 photos.</p>-->
                <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                    <div class="12u">
                <label for="nbImages">Combien de photos voulez-vous mettre ?</label>
                <input id="nbImages" type="number">
                        </div>
                    </div>
                <br/><br/><br/>
            </form>
            <input id="submit" type="submit" class="button alt" value="Envoyer" />
                <br/><br/>
                </fieldset>
            <div id="resultat"></div>

            <script>

                $('#submit').click(function() {
                    var lieu = $('#lieu').val();
                    var nbImages = $('#nbImages').val();
                    if (lieu == '' || nbImages == '') {
                        alert('Vous devez remplir tous les champs !');
                    }
                    else {
                        $.ajax({
                            url: 'update-trip.php',
                            type: 'POST',
                            data : {
                                lieu: lieu,
                                nbImages: nbImages
                            },
                            success: function (data) {
                                if (data == 'success') {
                                    // cacher le formulaire
                                    document.getElementById('voyage').style.display = "none";
                                    document.getElementById('submit').style.display = "none";
                                    document.getElementById('title').style.display = "none";
                                    $("#resultat").html("<p style='text-align: center'>Voyage modifié ! <br/>Vous allez être automatiquement redirigé vers la page des voyages. Si cela ne fonctionne pas veuillez cliquer <a href='voyages.php'>ici</a></p>");
                                    function redirection(){
                                        self.location.href="voyages.php"
                                    }
                                    setTimeout(redirection,3000);
                                }
                                else {
                                    document.getElementById('voyage').style.display = "none";
                                    document.getElementById('submit').style.display = "none";
                                    document.getElementById('title').style.display = "none";
                                    $("#resultat").html("<p style='text-align: center'> Erreur lors de la modification du voyage... Veuillez essayer à nouveau à partir d'<a href='voyages.php'>ici</a>.</p>");
                                }
                            }
                        });
                    }
                });

            </script>

        </div>
    </section>
    <?php } else {
    } ?>
    <?php require("footer.html"); ?>

</div>



</body>
</html>
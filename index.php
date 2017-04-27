<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>

<html>
	<head>
        <title>Spotin' - Accueil</title>
        <link rel="icon" type="image/png" href="images/icon.png" />
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>-->
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        

	</head>

    <script>
        function load(){
            var image1 = new Image(5472,3648);
            image1.src = "images/banner/1.jpg";
            var image2 = new Image(5472,3648);
            image2.src = "images/banner/2.jpg";
            var image3 = new Image(5472,3648);
            image3.src = "images/banner/3.jpg";
            var image4 = new Image(5472,3648);
            image4.src = "images/banner/4.jpg";
        }
        function initialize() {
            var map = new google.maps.Map(document.getElementById("map_canvas"), {
                zoom: 16,
                center: new google.maps.LatLng(44.8220752,-0.5525643),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
        }
        function start(){
            load();
            initialize();
        }

    </script>

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

    <body onload="start()">
		<div id="page-wrapper">
            <div id="titleBar"><a href="#navPanel" class="toggle"></a><span class="title"><em>Spotin</em> - Agence audiovisuel</span></div>

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
                                    <li class="current"><a href="index.php">Accueil</a></li>
                                    <li><a href="prestations.php">Prestations</a></li>
                                    <li><a href="projets.php">Projets</a></li>
                                    <li><a href="voyages.php">Voyages</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="a-propos.php">À propos</a></li>
                                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
                                } else if (empty($_SESSION['mail'])) { // compte entreprise
                                    ?><ul style="padding-left: 270px;">
                                    <li class="current"><a href="index.php">Accueil</a></li>
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
                                    <li class="current"><a href="index.php">Accueil</a></li>
                                    <li><a href="prestations.php">Prestations</a></li>
                                    <li><a href="projets.php">Projets</a></li>
                                    <li><a href="voyages.php">Voyages</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="a-propos.php">À propos</a></li>
                                    <li><a href="compte.php">Mon compte</a></li>
                                    <li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li>

                                    <li class="cercle"><a style="color: #ffffff; font-size: 15px; padding: 0;">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul>

                                    <?php
                                }
                                ?>
						</nav>

				</div>

			<!-- Banner -->
            <section id="banner" onload="diapHome(this)">

                    <script>
                        var num=0;
                        function diapHome(bloc) {
                            if( num != 4 ) {
                                num = num + 1;
                            }
                            else {
                                num = 1;
                            }
                            $('#banner').css('background', 'url(images/banner/' + num + '.jpg) center');
                            $('#banner').css('background-size', '100%');
                        }
                        setInterval( function(){ diapHome("banner") }, 3000 );
                    </script>
					<header>
						<h2>Spotin' <em>c'est de <a href="prestations.php">multiples prestations</a> à petits prix ! </em> </h2>
						<a href="contact.php#devis" class="button">Devis gratuit</a>
					</header>
				</section>

			<!-- Highlights -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<section class="4u 12u(narrower)">
								<div class="box highlight">
									<i class="icon major fa fa-camera"></i>
									<h3>Photographie</h3>
									<p>Portrait, mode, mariage, festival, publicitaire, entreprise ... <a href="prestations.php#photo">En savoir plus</a></p>
								</div>
							</section>
							<section class="4u 12u(narrower)">
								<div class="box highlight">
									<i class="icon major fa fa-video-camera"></i>
									<h3>Vidéo</h3>
									<p>Court-métrage, institutionnel, making-of, post-production ... <a href="prestations.php#video">En savoir plus</a></p>
								</div>
							</section>
							<section class="4u 12u(narrower)">
								<div class="box highlight">
									<i class="icon major fa-pencil"></i>
									<h3>Design</h3>
									<p>Toutes les prestations réalisées respectent un design épuré et prend en compte vos attentes</p>
								</div>
							</section>
						</div>
					</div>
				</section>

        <!-- CTA -->
				<section id="cta" class="wrapper style3">
					<div class="container">
						<header>
							<h2>Envie de voyager ? </h2>
							<a href="voyages.php" class="button">C'est par ici !</a>
						</header>
					</div>
				</section>
            <div id="footer" onload="initialize()">
                <?php require("footer.html");  ?>
            </div>
        </div>
	</body>
</html>
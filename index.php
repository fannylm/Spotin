<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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

    <div class="gr-top-z-index gr-top-zero" tabindex="-1">
        <div class="_970ef1-hoverMenu" style="transform:translate(NaNpx, NaNpx);" data-grammarly-reactid=".2">
            <div class="_970ef1-panel" data-grammarly-reactid=".2.0">
                <div class="_970ef1-tooltip _970ef1-tooltip_hidden undefined" data-grammarly-reactid=".2.0.0"></div>
                <div class="_970ef1-buttonArea" data-grammarly-reactid=".2.0.1">
                    <div class="_970ef1-btn _970ef1-btn_disable" tabindex="-1" data-grammarly-reactid=".2.0.1.0"></div>
                </div>
                <div class="_970ef1-line" data-grammarly-reactid=".2.0.3"></div>
                <div class="_970ef1-buttonArea" data-grammarly-reactid=".2.0.5">
                    <div class="_970ef1-btn _970ef1-btn_grammarly" data-action="editor" tabindex="-1" data-grammarly-reactid=".2.0.5.0"></div>
                </div>
            </div>
        </div>
    </div>
    <div style="visibility: hidden; top: -9999px; position: absolute; opacity: 0;">
        <div class="_970ef1-hoverMenu" style="transform:translate(NaNpx, NaNpx);" data-grammarly-reactid=".1">
            <div class="_970ef1-panel" data-grammarly-reactid=".1.0">
                <div class="_970ef1-tooltip _970ef1-tooltip_hidden undefined" data-grammarly-reactid=".1.0.0"></div>
                <div class="_970ef1-buttonArea" data-grammarly-reactid=".1.0.1">
                    <div class="_970ef1-btn _970ef1-btn_disable" tabindex="-1" data-grammarly-reactid=".1.0.1.0"></div>
                </div>
                <div class="_970ef1-line" data-grammarly-reactid=".1.0.3"></div>
                <div class="_970ef1-buttonArea" data-grammarly-reactid=".1.0.5">
                    <div class="_970ef1-btn _970ef1-btn_grammarly" data-action="editor" tabindex="-1" data-grammarly-reactid=".1.0.5.0"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function chargement(){
            var image1 = new Image(5472,3648);
            image1.src = "images/banner/1.jpg";
            var image2 = new Image(5472,3648);
            image2.src = "images/banner/2.jpg";
            var image3 = new Image(5472,3648);
            image3.src = "images/banner/3.jpg";
            var image4 = new Image(5472,3648);
            image4.src = "images/banner/4.jpg";
        }
    </script>

    <body onload="chargement()">
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
                                    <li><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul><?php
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
                                    <li><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul>
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

                <!--<script>
                    /*i = 1;

                    function affiche(numero) {
                        i = numero;
                        img.src = 'images/banner/.'+i+'.jpg';
                        text.value = i;
                    }*/
                </script>-->
            <!--
            <img name="img" src="images/banner/1.jpg"><br>
            <input type="button" value="<" OnClick="affiche(i-1)">
            <input type="text" name="text" value="1" OnChange="affiche(text.value)">
            <input type="button" value=">" OnClick="affiche(i+1)">-->




			<!-- Highlights -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<section class="4u 12u(narrower)">
								<div class="box highlight">
									<i class="icon major fa fa-camera"></i>
									<h3>Photographie</h3>
									<p>Portrait, mode, mariage, festival, publicitaire, entreprise ... <a href="prestations/photo.html">En savoir plus</a></p>
								</div>
							</section>
							<section class="4u 12u(narrower)">
								<div class="box highlight">
									<i class="icon major fa fa-video-camera"></i>
									<h3>Vidéo</h3>
									<p>Court-métrage, institutionnel, making-of, post-production ... <a href="prestations/video.html">En savoir plus</a></p>
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

			<!-- Gigantic Heading -->
            <!--<section class="wrapper style2">
                <div class="container">
                    <header class="major">
                        <h2>A gigantic heading you can use for whatever</h2>
                        <p>With a much smaller subtitle hanging out just below it</p>
                    </header>
                </div>
            </section>-->

        <!-- Posts -->
            <!--<section class="wrapper style1">
                <div class="container">
                    <div class="row">
                        <section class="6u 12u(narrower)">
                            <div class="box post">
                                <a href="#" class="image left"><img src="images/pic01.jpg" alt="" /></a>
                                <div class="inner">
                                    <h3>New York</h3>
                                    <p>Aout 2014, blabla</p>
                                </div>
                            </div>
                        </section>
                        <section class="6u 12u(narrower)">
                            <div class="box post">
                                <a href="#" class="image left"><img src="images/pic02.jpg" alt="" /></a>
                                <div class="inner">
                                    <h3>Londres</h3>
                                    <p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu.</p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="row">
                        <section class="6u 12u(narrower)">
                            <div class="box post">
                                <a href="#" class="image left"><img src="images/pic03.jpg" alt="" /></a>
                                <div class="inner">
                                    <h3>Nom du projet</h3>
                                    <p>Court-métrage de ..</p>
                                </div>
                            </div>
                        </section>
                        <section class="6u 12u(narrower)">
                            <div class="box post">
                                <a href="#" class="image left"><img src="images/pic04.jpg" alt="" /></a>
                                <div class="inner">
                                    <h3>Singapour</h3>
                                    <p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu.</p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>-->






        <!-- CTA -->
				<section id="cta" class="wrapper style3">
					<div class="container">
						<header>
							<h2>Envie de voyager ? </h2>
							<a href="voyages.php" class="button">C'est par ici !</a>
						</header>
					</div>
				</section>
            <?php require("footer.html"); ?>

		</div>

	</body>
</html>
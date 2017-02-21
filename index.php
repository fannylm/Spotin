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
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Logo -->
                    <a id="link_logo" href="index.php" style="color: white"><img src="images/LogoSpotin.png" alt="logo" height="10%" width="10%"></a>
						<h1><a href="index.php" id="logo">Spotin' - <em>Agence audiovisuel</em></a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.php">Accueil</a></li>
								<li>
									<a href="prestations.php">Prestations</a>
									<ul>
										<li><a href="#">Lorem dolor</a></li>
										<li><a href="#">Magna phasellus</a></li>
										<li><a href="#">Etiam sed tempus</a></li>
										<li>
											<a href="#">Submenu</a>
											<ul>
												<li><a href="#">Lorem dolor</a></li>
												<li><a href="#">Phasellus magna</a></li>
												<li><a href="#">Magna phasellus</a></li>
												<li><a href="#">Etiam nisl</a></li>
												<li><a href="#">Veroeros feugiat</a></li>
											</ul>
										</li>
										<li><a href="#">Veroeros feugiat</a></li>
									</ul>
								<li><a href="projets.php">Projets</a></li>
								<li><a href="voyages.php">Voyages</a></li>
								<li><a href="contact.php">Contact</a></li>
                                <li><a href="a-propos.php">À propos</a></li>
                                <?php
                                if(empty($_SESSION['user'])){ // si la variable de session identifiant est nulle ou inexistante
                                    ?><li><a href="connexion.php" class="button">Connexion</a></li><?php
                                }
                                else{
                                    ?><li><a href="compte.php">Mon compte</a></li>
                                    <li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li><?php
                                }
                                ?>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
				<section id="banner" onmouseover="pair(this)">
                    <script>
                        var i = '0';
                        (function(){
                            setInterval(function(){
                                i++;
                                if(pair(i)){
                                    $('#banner').css('background', 'url(images/banner/2.jpg) center');
                                    /*$('#banner').css('height', '28em');
                                    $('#banner').css('text-align', 'center');
                                    $('#banner').css('position', 'relative');*/
                                }else{
                                    $('#banner').css('background', 'url(images/banner/1.jpg) 50em');
                                    /*$('#banner').css('height', '28em');
                                    $('#banner').css('text-align', 'center');
                                    $('#banner').css('position', 'relative');*/
                                }
                            }, 3000);
                        })();

                        function pair(chiffre){
                            chiffre=parseInt(chiffre);
                            return ((chiffre & 1)=='0')?true:false;
                        }
                    </script>
					<header>
						<h2>Spotin' <em>c'est de <a href="prestations.php">multiples prestations</a> à petits prix ! </em> </h2>
						<a href="devis.html" class="button">Devis gratuit</a>
					</header>
				</section>

                <script>
                    /*i = 1;

                    function affiche(numero) {
                        i = numero;
                        img.src = 'images/banner/.'+i+'.jpg';
                        text.value = i;
                    }
                </script>
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

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
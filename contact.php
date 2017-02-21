<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Spotin' - Contact</title>
    <link rel="icon" type="image/png" href="images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
<body onload="initialize()">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header">

        <!-- Logo -->
        <a id="link_logo" href="index.php" style="color: white"><img src="images/LogoSpotin.png" alt="logo" height="10%" width="10%"></a>
        <h1><a href="index.php" id="logo">Spotin' - <em>Agence audiovisuel</em></a></h1>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.php">Accueil</a></li>
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
                <li class="current"><a href="contact.php">Contact</a></li>
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

    <!-- Main -->
    <section class="wrapper style1">
        <div class="container">
            <div id="content">

                <p style="text-align: center" id="text"><i class="fa fa-paper-plane" aria-hidden="true"></i><strong>&nbsp;&nbsp;&nbsp;Envoyez-nous un message pour le moindre renseignement !</strong></p>
                <form action="contact.php" method="POST" id="message">
                    <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                        <div class="6u 12u(mobilep)">
                            <input type="text" name="name" id="name" placeholder="Nom" />
                        </div>
                        <div class="6u 12u(mobilep)">
                            <input type="email" name="email" id="email" placeholder="Email" />
                        </div>
                    </div>
                    <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                        <div class="12u">
                            <textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
                        </div>
                    </div>
                </form><br/><br/>
                <p style="text-align: center"><input id="submit" class="button alt" value="Envoyer" /></p>
                <div id="resultat"></div>

                <script>

                    $('#submit').click(function() {
                        var name = $('#name').val();
                        var email = $('#email').val();
                        var message = $('#message').val();
                        if (name == '' || email == '' || message == '') { // si les champs sont vides
                            alert('Vous devez remplir tous les champs !');
                        }
                        else {
                            $.ajax({
                                url: 'trait-message.php',
                                type: 'POST',
                                data : {
                                    name: name,
                                    email: email,
                                    message: message
                                },
                                success: function (data) {
                                    if (data == 'success') {
                                        // cacher le formulaire
                                        document.getElementById('message').style.display = "none";
                                        document.getElementById('text').style.display = "none";
                                        document.getElementById('submit').style.display = "none";
                                        $("#resultat").html("<p style='text-align: center'> Message envoyé !</p>");
                                    }
                                    else {
                                        document.getElementById('message').style.display = "none";
                                        document.getElementById('text').style.display = "none";
                                        document.getElementById('submit').style.display = "none";
                                        $("#resultat").html("<p style='text-align: center'> Erreur lors de l'envoie du message</p>");
                                    }
                                }
                            });
                        }
                    });


                </script>

                <br/>

                <?php if(empty($_SESSION['user'])){ ?><div id="page-wrapper">
                <section class="wrapper style2">
                    <div class="container">
                        <header class="major">
                            <h2>Pour une demande de devis gratuit <a href="connexion.php">connectez-vous</a> !</h2>
                            <p>Si vous ne possédez pas encore de compte client <a href="inscription.php">inscrivez-vous</a> vite.</p>
                        </header>
                    </div>
                </section>
                </div>

                <?php
                }
                else{ ?>

                    <p style="text-align: center"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><strong>&nbsp;&nbsp;&nbsp;Demandez votre devis gratuitement</strong></p>
                    <p style="text-align: center">Liste des prestations <br/> Détails modifiables</p>
                    <p style="text-align: center"><input type="submit" class="button alt" value="Envoyer" /></p>

                <?php } ?>

                <br/><br/>

                <!--<hr style="border-color: darkgrey; width: 100%;">-->

                <br/>

                <p style="text-align: center"><i class="fa fa-map-marker" aria-hidden="true"></i><strong>&nbsp;&nbsp;&nbsp;26 rue Beck, 33800, Bordeaux</strong></p>

                <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDnSPt_Pwr_yqSwru4v29sED66kozQPUM&callback=myMap"></script>
                <script type="text/javascript">
                    function initialize() {
                        var map = new google.maps.Map(document.getElementById("map_canvas"), {
                            zoom: 16,
                            center: new google.maps.LatLng(44.8220752,-0.5525643),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                    }
                </script>
                <div style="margin-right: auto; margin-left: auto; width: 80%;HEIGHT: 400px;" id="map_canvas"></div>
                <br/>
                <!--<p style="text-align: center">26 rue Beck, 33800, Bordeaux</p>-->

            </div>
        </div>
    </section>










    <!-- Footer -->
    <div id="footer">
        <!-- Icons -->
        <ul class="icons">
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <!--<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>-->
            <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
        </ul>

        <!-- Copyright -->
        <div class="copyright">
            <ul class="menu">
                <li>&copy; Fanny Le Morvan. All rights reserved</li><!--<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>-->
            </ul>
        </div>

    </div>


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
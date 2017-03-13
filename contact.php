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

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>

</head>
<body onload="initialize()">
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
                    <li class="current"><a href="contact.php">Contact</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
            } else if (empty($_SESSION['mail'])) { // compte entreprise
                ?><ul style="padding-left: 270px;">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
                <li class="current"><a href="contact.php">Contact</a></li>
                <li><a href="a-propos.php">À propos</a></li>
                <li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li>
                <li><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul><?php
            } else { // compte client
                ?><ul style="padding-left: 300px;">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
                <li class="current"><a href="contact.php">Contact</a></li>
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
            <div id="content">

                <p style="text-align: center" id="text"><i class="fa fa-paper-plane" aria-hidden="true"></i><strong>&nbsp;&nbsp;&nbsp;Envoyez-nous un message pour le moindre renseignement !</strong></p>
                <form action="contact.php" method="POST" id="contact" onsubmit="return checkform(this)">
                    <?php if(empty($_SESSION['user'])){ ?>
                    <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                        <div class="6u 12u(mobilep)">
                            <input type="text" name="name" id="name" placeholder="Nom" />
                        </div>
                        <div class="6u 12u(mobilep)">
                            <input type="email" name="email" id="email" placeholder="Email" onblur="checkmail(this)"/>
                            <span id="mail-correct"></span><span id="mail-incorrect"></span>
                        </div>
                    </div> <?php } ?>
                    <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                        <div class="12u">
                            <textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
                        </div>
                    </div>
                </form><br/><br/>
                <p style="text-align: center"><input id="submit" type="submit" class="button alt" value="Envoyer" onSubmit="return checkform(this)" /></p>
                <div id="resultat"></div>

                <script>

                    // Fonction qui permet de changer la couleur de l'arrière plan pour faire ressortir les erreurs
                    function underline(champ, erreur) {
                        if(erreur)
                            champ.style.backgroundColor = "#FDE3E3";
                        else
                            champ.style.backgroundColor = "";
                    }

                    // Fonction qui vérifie que le format du mail est bien valide
                    function checkmail(mail) {
                        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
                        if (!regex.test(mail.value)) {
                            $('#mail-correct').next('#mail-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
                            $('#mail').next('#mail-correct').fadeOut();
                            underline(mail, true);
                            return false;
                        }
                        else {
                            $('#mail').next('#mail-correct').fadeIn().text('');
                            $('#mail-correct').next('#mail-incorrect').fadeOut();
                            underline(mail, false);
                            return true;
                        }
                    }

                    function checkform(f) {
                        if(checkmail(f.email)){
                            return true;
                        }
                        else {
                            alert('Veuillez remplir tous les champs correctement !');
                            return false;
                        }
                    }

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
                                        document.getElementById('contact').style.display = "none";
                                        document.getElementById('submit').style.display = "none";
                                        $("#resultat").html("<p style='text-align: center'> Message envoyé !</p>");
                                    }
                                    else {
                                        document.getElementById('contact').style.display = "none";
                                        document.getElementById('submit').style.display = "none";
                                        $("#resultat").html("<p style='text-align: center'> Erreur lors de l'envoie du message</p>");
                                    }
                                }
                            });
                        }
                    });


                </script>

                <br/>
                <div id="devis">
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


                </div>

                <?php
                }
                else{ ?>

                    <div id="devis">
                    <p style="text-align: center"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><strong>&nbsp;&nbsp;&nbsp;Demandez votre devis gratuitement</strong></p>
                    <form style="text-align: center" method="POST" id="form_devis" action="contact.php">
                        <label for="id" style="font-weight: 100">Choississez votre prestation</label>
                        <select name="id" id="id">
                            <optgroup label="Photographique">
                                <?php
                                $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
                                $req=$bdd -> query("SELECT * FROM Prestations WHERE type='photo'");
                                while($res=$req -> fetch()){
                                    echo "<option value=".$res['id'].">".$res['nom']."</option><br/>";
                                }
                                ?>
                            </optgroup>
                            <optgroup label="Audiovisuelle">
                                <?php
                                $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
                                $req=$bdd -> query("SELECT * FROM Prestations WHERE type='video'");
                                while($res=$req -> fetch()){
                                    echo "<option value=".$res['id'].">".$res['nom']."</option><br/>";
                                }
                                ?>
                            </optgroup>
                        </select>
                        <br/><br/>
                        <label for="id" style="font-weight: 100">À quelle date souhaitez-vous la livraison de votre prestation ?</label>
                        <input id="date" type="date" style="margin-right: auto; margin-left: auto;">
                        <br/><br/><br/>
                        <label for="id" style="font-weight: 100">Description de votre projet :</label>
                        <textarea name="message" id="message2" placeholder="Message" rows="5" style="width: 50%; margin-right: auto; margin-left: auto;"></textarea>
                    </form>
                    <br/><br/>
                    <p style="text-align: center"><input id="dev" type="submit" class="button alt" value="Envoyer"  /></p>
                    <div id="resultat2"></div>
                    </div>

                    <script>
                        $('#dev').click(function() {
                            var select = document.getElementById("id" );
                            var id = select.options[select.selectedIndex].value;
                            var date = $('#date').val();
                            var message2 = $('#message2').val();
                            if (id == '' || date == '' || message2 == '') { // si les champs sont vides
                                alert('Vous devez remplir tous les champs !');
                            }
                            else {
                                $.ajax({
                                    url: 'trait-devis.php',
                                    type: 'POST',
                                    data : {
                                        id: id,
                                        date: date,
                                        message: message2
                                    },
                                    success: function (data) {
                                        if (data == 'success') {
                                            // cacher le formulaire
                                            document.getElementById('form_devis').style.display = "none";
                                            document.getElementById('dev').style.display = "none";
                                            $("#resultat2").html("<p style='text-align: center'> Le devis a été correctement soumis ! Nous reviendrons vers vous très vite ! </p>");
                                        }
                                        else {
                                            document.getElementById('form_devis').style.display = "none";
                                            document.getElementById('dev').style.display = "none";
                                            $("#resultat2").html("<p style='text-align: center'> Erreur lors de l'envoie du devis</p>");
                                        }
                                    }
                                });
                            }
                        });
                    </script>

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
</body>
</html>
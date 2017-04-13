<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>

    <title>Spotin' - Connexion</title>
    <link rel="icon" type="image/png" href="images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="assets/js/jquery-2.1.1.js"></script>
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
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="a-propos.php">À propos</a></li>
            </ul>
        </nav>

    </div>

    <!-- Main -->
    <section class="wrapper style1">
        <div class="container">
            <div id="content">

                <!-- Content -->
                <article id="connect">
                    <?php
                    if(!isset($_POST['pseudo'])) {
                        ?>

                    <fieldset style="border: 1px lightgrey solid;border-radius: 10px;text-align: center;width: 40em;margin-right: auto;margin-left: auto;"><legend style="font-size:16px; color:slategray"><h2 id="titre" style="text-align: center">Mot de passe oublié</h2></legend>

                        <form name="mail" style="visibility: visible" action="trait-mdp-oublie.php" method="POST">
                            <br/>
                            <label for="mail">Indiquez votre adresse mail :</label>
                            <div class="row 50%" style="width: 40%; margin-right: auto; margin-left: auto;">
                                    <input style="padding-top: 8px; padding-bottom: 8px;" type="text" name="mail" id="mail" >
                            </div><br/>
                            <p style="text-align: center"><input id="submit" type="submit" class="button alt" value="Envoyer"/></p>
                            <br/>
                        </form>

                    <?php } ?>
                    <br/>
                    <br/>
                        </fieldset>
                </article>
                <div id="resultat"></div>
            </div>
        </div>
    </section>

    <?php

    $to      = 'fanny.le-morvan@hotmail.fr';
    $subject = 'le sujet';
    $message = 'Bonjour !';

    mail($to, $subject, $message);

    ?>

    <?php require("footer.html"); ?>

</div>

<script>
/*
    $('#submit').click(function() {
        var mail = $('#mail').val();

        if (mail == ' ') {
            alert('Veuillez indiquer votre adresse mail !');
        }
        else {
            $.ajax({
                url: 'trait-mdp-oublie.php',
                type: 'POST',
                data : {
                    mail: mail
                },
                success: function (data) {
                    console.log('data :'+data);
                    if (data == 'success') {
                        // cacher le formulaire de connexion
                        document.getElementById('mail').style.display = "none";
                        $("#resultat").html("<p style='text-align: center'>Un mail vient de vous être envoyé vous permettant de réinitialiser votre mot de passe !</p>");
                        function redirection(){
                            self.location.href="index.php"
                        }
                        setTimeout(redirection,4000);
                    }
                    else {
                        document.getElementById('connect').style.display = "none";
                        document.getElementById('connexion').style.display = "none";
                        document.getElementById('inscription').style.display = "none";
                        document.getElementById('submit').style.display = "none";
                        document.getElementById('titre').style.display = "none";
                        $("#resultat").html("<p style='text-align: center'>Une erreur s'est produite...</p>");
                        function redirection2(){
                            self.location.href="mdp-oublie.php"
                        }
                        setTimeout(redirection2,4000);
                    }
                }
            });
        }
    });
*/

</script>

</body>
</html>
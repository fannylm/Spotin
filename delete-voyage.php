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
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li class="current"><a href="voyages.php">Voyages</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="a-propos.php">À propos</a></li>
                <?php
                if(empty($_SESSION['user'])){ // si la variable de session identifiant est nulle ou inexistante
                    ?><li><a href="connexion.php" class="button">Connexion</a></li><?php
                } else if (empty($_SESSION['mail'])) {
                    ?><li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li><?php
                } else {
                    ?><li><a href="compte.php">Mon compte</a></li>
                    <li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li><?php
                }
                ?>
            </ul>
        </nav>

    </div>
    <?php if(empty($_SESSION['user'])){

    } else if (empty($_SESSION['mail'])){ ?>
    <!-- Main -->
    <section class="wrapper style1">
        <div class="container">

            <h2 id="title" type="title">Supprimer un voyage</h2>
            <br/>
            <form method="POST" id="voyage" action="delete-voyage.php">
                <label for="lieu">Quel voyage souhaitez-vous supprimer ?</label>
                <select name="lieu" id="lieu">
                        <?php
                        $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
                        $req=$bdd -> query("SELECT * FROM Voyage");
                        while($res=$req -> fetch()){
                            echo "<option value=".$res['lieu'].">".$res['lieu']."</option><br/>";
                        }
                        ?>
                </select>
                <br/><br/>
            </form>
            <input id="submit" type="submit" class="button alt" value="Ok" />
            <div id="resultat"></div>

            <script>

                $('#submit').click(function() {
                    var select = document.getElementById("lieu" );
                    var lieu = select.options[select.selectedIndex].value;
                    var alert = confirm("Êtes-vous sûr de vouloir supprimer ce voyage ?");
                    if(alert) {
                        $.ajax({
                            url: 'delete-trip.php',
                            type: 'POST',
                            data : {
                                lieu: lieu
                            },
                            success: function (data) {
                                console.log(data);
                                if (data == 'success') {
                                    // cacher le formulaire
                                    document.getElementById('voyage').style.display = "none";
                                    document.getElementById('submit').style.display = "none";
                                    document.getElementById('title').style.display = "none";
                                    $("#resultat").html("<p style='text-align: center'> Voyage correctement supprimé !<br/>Vous allez être automatiquement redirigé vers la page des voyages. Si cela ne fonctionne pas veuillez cliquer <a href='voyages.php'>ici</a></p>");
                                    function redirection(){
                                        self.location.href="voyages.php"
                                    }
                                    setTimeout(redirection,3000);
                                }
                                else {
                                    document.getElementById('voyage').style.display = "none";
                                    document.getElementById('submit').style.display = "none";
                                    document.getElementById('title').style.display = "none";
                                    $("#resultat").html("<p style='text-align: center'> Erreur lors de la suppression du voyage... Veuillez essayer à nouveau à partir d'<a href='voyages.php'>ici</a>.</p>");
                                }
                            }
                        });
                    } else {
                        function redirection(){
                            self.location.href="prestations.php"
                        }
                        setTimeout(redirection,1000);
                    }
                })

            </script>

        </div>
    </section>
    <?php } else {
    } ?>
    <?php require("footer.html"); ?>

</div>



</body>
</html>
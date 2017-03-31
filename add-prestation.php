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

        <!-- Logo -->
        <a id="link_logo" href="index.php" style="color: white"><img src="images/LogoSpotin.png" alt="logo" height="10%" width="10%"></a>
        <h1><a href="index.php" id="logo">Spotin' - <em>Agence audiovisuel</em></a></h1>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li class="current"><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
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

            <h2 id="title" type="title">Ajouter une prestation</h2>
            <br/><br/>
            <form method="POST" id="prestation" action="add-prestation.php">
                <label for="type">Quelle type de prestation souhaitez-vous ajouter ?</label>
                <select name="type" id="type">
                    <option value="photo">Photographique</option>
                    <option value="video">Audiovisuelle</option>
                </select>
                <br/><br/><br/>
                <label for="nom">Renseignez le nom de la prestation</label>
                <input id="nom" type="text">
                <br/><br/>
            </form>
            <input id="submit" type="submit" class="button alt" value="Envoyer" />
            <div id="resultat"></div>

            <script>

                $('#submit').click(function() {
                    var select = document.getElementById("type" );
                    var type = select.options[select.selectedIndex].value;
                    var nom = $('#nom').val();
                    if (type == '' || nom == '') {
                        alert('Vous devez remplir tous les champs !');
                    }
                    else {
                        $.ajax({
                            url: 'trait-prestation.php',
                            type: 'POST',
                            data : {
                                nom: nom,
                                type: type
                            },
                            success: function (data) {
                                console.log("data="+data);
                                if (data == 'success') {
                                    document.getElementById('prestation').style.display = "none";
                                    document.getElementById('submit').style.display = "none";
                                    document.getElementById('title').style.display = "none";
                                    $("#resultat").html("<p style='text-align: center'> Prestation ajoutée ! <br/>Vous allez être automatiquement redirigé vers la page des prestations. Si cela ne fonctionne pas veuillez cliquer <a href='prestations.php'>ici</a></p>");
                                    function redirection(){
                                        self.location.href="prestations.php"
                                    }
                                    setTimeout(redirection,3000);
                                }
                                else {
                                    document.getElementById('prestation').style.display = "none";
                                    document.getElementById('submit').style.display = "none";
                                    document.getElementById('title').style.display = "none";
                                    $("#resultat").html("<p style='text-align: center'> Erreur lors de l'ajout de la prestation.. Veuillez essayer à nouveau à partir d'<a href='prestations.php'>ici</a>.</p>");
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
<?php session_start(); ?>
<!DOCTYPE HTML>
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

?>


<body>
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
    <section class="wrapper style1">
        <div class="container">
            <div class="row 200%">
                <div class="4u 12u(narrower)">
                    <!-- Sidebar -->
                    <section id="sidebar">
                        <div class="inner">
                            <nav>
                                <ul>

                                    <!-- Boucle php permettant d'afficher tous les titres de projets dans la sidebar -->
                                    <?php

                                    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                                    $req=$bdd -> query("SELECT * FROM Projet");
                                    while($res=$req -> fetch()){
                                        ?><li><a href="#<?php echo $res['titre'] ?>"><?php echo $res['titre'] ?></a></li><?php
                                    }

                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </section>

                </div>
                <div class="8u  12u(narrower) important(narrower)" style="width: 66.6666666667%;padding: 40px 0 0 0;margin-left: -90px;">
                    <div id="content">

                        <!-- Content -->
                        <article>

                            <?php
                            if(empty($_SESSION['user'])){ // aucun utilisateur connecté

                                $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                                $req=$bdd -> query("SELECT * FROM Projet");
                                while($res=$req -> fetch()){
                                    echo"<div id=".$res['titre']."><h3>".$res['titre']."</h3>
                                    <span class='image featured'><img src=".$res['image']."/></span>
                                    <a href='projet.php?id_projet=".$res['id']."'><i>En savoir plus sur ".$res['titre']."</i></a>
                                    </div><br/><br/>";
                                }

                            } else if (empty($_SESSION['mail'])) { // compte entreprise
                                ?><a style="padding:0" href="add-projet.php" class="button">Nouveau projet</a>
                                <br/><br/>
                            <?php

                                $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                                $req=$bdd -> query("SELECT * FROM Projet");
                                while($res=$req -> fetch()){
                                    echo"<div id=".$res['titre']."><h3>".$res['titre']."</h3>
                                    <span class='image featured'><img src=".$res['image']."/></span>
                                    <a href='projet.php?id_projet=".$res['id']."'><i>En savoir plus sur ".$res['titre']."</i></a>
                                    </div><br/><br/>";
                                }


                            } else { // compte client

                                // Boucle php permettant d'afficher l'ensemble des projets les uns à la suite des autres

                                $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                                $req=$bdd -> query("SELECT * FROM Projet");
                                while($res=$req -> fetch()){
                                    echo"<div id=".$res['titre']."><h3>".$res['titre']."</h3>
                                    <span class='image featured'><img src=".$res['image']."/></span>
                                    <a href='projet.php?id_projet=".$res['id']."'><i>En savoir plus sur ".$res['titre']."</i></a>
                                    </div><br/><br/>";
                                }
                            }
                            ?>

                            <script>
                                function Display(){
                                    document.getElementById('commentaire').style.display = "block";
                                    document.getElementById('labelcom').style.display = "block";
                                    document.getElementById('submitcom').style.display = "block";
                                    document.getElementById('postercom').style.display = "none";
                                }
                            </script>

                        </article>

                    </div>
                </div>
            </div>
        </div>
    </section>
<div style="z-index:100000000;">
<?php require("footer.html"); ?>
</div>

</div>

</body>
</html>
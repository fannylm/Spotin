<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Spotin' - Notifications</title>
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
                    <li><a href="voyages.php">Voyages</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
            } else if (empty($_SESSION['mail'])) { // compte entreprise
                ?><ul style="padding-left: 270px;">
                <li><a href="index.php">Accueil</a></li>
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
                <li><a href="index.php">Accueil</a></li>
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

    <!-- Main -->
    <section class="wrapper style1">
        <div class="container">


            <h1 style="text-align: center; font-size: 30px;">Notifications & Historique</h1>

            <?php if(empty($_SESSION['user'])){ // aucun utilisateur connecté
                ?><p style="font-size: 20px; text-align: center;">Page inaccessible !</p>

            <?php } else if (empty($_SESSION['mail'])) { // compte entreprise

                ?><div id="notifications"><h2 style="color:red;">Notifications</h2> <?php
                $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                ?><h3>Messages des non-clients</h3><?php
                $req=$bdd -> query("SELECT * FROM Contact WHERE statut='A traiter'");
                $num=$req -> rowCount();
                echo $num.' nouveaux messages :<br/><br/>' ;
                while($res=$req -> fetch()){
                    echo "<strong> - ".$res['nom']." ".$res['prenom']."</strong> (".$res['departement']."), <a href='mailto:".$res['mail']."'>".$res['mail']."</a><br/>";
                    echo "Message : ".$res['message']."<br/><br/>";
                    echo '<br/>';
                }

                echo '<a href="update-notif.php" class="button">Effacer</a>';

                ?><br/><br/><h3>Messages des clients</h3><?php
                $req2=$bdd -> query("SELECT * FROM ContactBis, Client WHERE ContactBis.statut='A traiter' AND ContactBis.idClient=Client.id");
                $num2=$req2 -> rowCount();
                echo $num2.' nouveaux messages :<br/><br/>' ;
                while($res2=$req2 -> fetch()){
                    echo "<strong> - ".$res2['nom']." ".$res2['prenom']."</strong>, <a href='mailto:".$res2['mail']."'>".$res2['mail']."</a><br/>";
                    echo "Message : ".$res2['message']."<br/><br/>";
                }

                echo '<a href="update-notif2.php" class="button">Effacer</a>';

                ?><br/><br/><br/><h3>Demande de devis</h3><?php

                $req3=$bdd -> query("SELECT * FROM Devis, Client, Prestation WHERE Devis.statut='A traiter' AND Devis.idExpediteur=Client.id AND Devis.idPrestation=Prestation.id");
                $num3=$req3 -> rowCount();
                echo $num3.' nouvelles demandes :<br/><br/>' ;
                while($res3=$req3 -> fetch()){
                    echo "<strong> - ".$res3['nom']." ".$res3['prenom']."</strong>, <a href='mailto:".$res3['mail']."'>".$res3['mail']."</a><br/>";
                    echo "Prestation : ".$res3['prestation']."<br/>";
                    echo "Date de livraison souhaitée : ".$res3['date']."<br/>";
                    echo "Message : ".$res3['message']."<br/><br/>";
                }

                echo '<a href="update-notif3.php" class="button">Effacer</a>';
                

                ?></div>
                <br/><br/><br/>
                <div id="historiqe"><h2 style="color:red;">Historique</h2><br/><br/>
                <div style="display: flex; float:left;">
                    <i id="plus" class="icon major fa fa-plus" style="cursor: pointer; width: 2em; height: 2em; line-height: 2em; margin-bottom: 0;" onclick="Display()"></i>
                    <i id="minus" class="icon major fa fa-minus" style="cursor: pointer; width: 2em; height: 2em; line-height: 2em; margin-bottom: 0; display:none;" onclick="Erase()"></i>
                </div>
                <h1 style="display: flex; padding-left: 30px;">Historique des messages des non-clients</h1>
                <br/>
                <div id="clients" style="display: none;">
                    <?php

                    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                    $req=$bdd -> query("SELECT * FROM Contact");
                    while($res=$req -> fetch()){
                        echo "<strong> - ".$res['nom']." ".$res['prenom']."</strong> (".$res['departement']."), <a href='mailto:".$res['mail']."'>".$res['mail']."</a><br/>";
                        echo "Message : ".$res['message']."<br/><br/>";
                        echo '<br/>';
                    }
                    ?>

                    <script>

                        function Display(){
                            document.getElementById('clients').style.display = "block";
                            //document.getElementById('infos').style.float = "left";
                            document.getElementById('plus').style.display = "none";
                            document.getElementById('minus').style.display = "block";
                        }

                        function Erase(){
                            document.getElementById('clients').style.display = "none";
                            document.getElementById('plus').style.display = "block";
                            document.getElementById('minus').style.display = "none";
                        }

                        function Info(){
                            document.getElementById('infos').style.display = "inline-block";
                            //document.getElementById('infos').style.float = "right";
                        }

                    </script>
                </div>



                <br/><br/>
                <div style="display: flex; float:left;">
                    <i id="plus2" class="icon major fa fa-plus" style="cursor: pointer; width: 2em; height: 2em; line-height: 2em; margin-bottom: 0;" onclick="Display2()"></i>
                    <i id="minus2" class="icon major fa fa-minus" style="cursor: pointer; width: 2em; height: 2em; line-height: 2em; margin-bottom: 0; display:none;" onclick="Erase2()"></i>
                </div>
                <h1 style="display: flex; padding-left: 30px;">Historique des messages des clients</h1>
                <br/>
                <div id="clients2" style="display: none;">
                    <?php

                    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                    $req=$bdd -> query("SELECT * FROM ContactBis");
                    while($res=$req -> fetch()){
                        echo "<strong> - ".$res['nom']." ".$res['prenom']."</strong>, <a href='mailto:".$res['mail']."'>".$res['mail']."</a><br/>";
                        echo "Message : ".$res['message']."<br/><br/>";
                    }
                    ?>

                    <script>

                        function Display2(){
                            document.getElementById('clients2').style.display = "block";
                            //document.getElementById('infos').style.float = "left";
                            document.getElementById('plus2').style.display = "none";
                            document.getElementById('minus2').style.display = "block";
                        }

                        function Erase2(){
                            document.getElementById('clients2').style.display = "none";
                            document.getElementById('plus2').style.display = "block";
                            document.getElementById('minus2').style.display = "none";
                        }

                        function Info2(){
                            document.getElementById('infos2').style.display = "inline-block";
                            //document.getElementById('infos').style.float = "right";
                        }

                    </script>
                </div>


                <br/><br/>
                <div style="display: flex; float:left;">
                    <i id="plus3" class="icon major fa fa-plus" style="cursor: pointer; width: 2em; height: 2em; line-height: 2em; margin-bottom: 0;" onclick="Display3()"></i>
                    <i id="minus3" class="icon major fa fa-minus" style="cursor: pointer; width: 2em; height: 2em; line-height: 2em; margin-bottom: 0; display:none;" onclick="Erase3()"></i>
                </div>
                <h1 style="display: flex; padding-left: 30px;">Historique des messages des devis</h1>
                <br/>
                <div id="devis" style="display: none;">
                    <?php

                    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                    $req=$bdd -> query("SELECT * FROM Devis");
                    while($res=$req -> fetch()){
                        echo "<strong> - ".$res['nom']." ".$res['prenom']."</strong>, <a href='mailto:".$res['mail']."'>".$res['mail']."</a><br/>";
                        echo "Message : ".$res['message']."<br/><br/>";
                    }
                    ?>

                    <script>

                        function Display3(){
                            document.getElementById('devis').style.display = "block";
                            //document.getElementById('infos').style.float = "left";
                            document.getElementById('plus3').style.display = "none";
                            document.getElementById('minus3').style.display = "block";
                        }

                        function Erase3(){
                            document.getElementById('devis').style.display = "none";
                            document.getElementById('plus3').style.display = "block";
                            document.getElementById('minus3').style.display = "none";
                        }

                        function Info2(){
                            document.getElementById('infos3').style.display = "inline-block";
                            //document.getElementById('infos').style.float = "right";
                        }

                    </script>
                </div>
                    </div>


            <?php } else { // compte client
                ?>


            <?php } ?>

        </div>
    </section>

    <?php require("footer.html"); ?>

</div>

</body>
</html>
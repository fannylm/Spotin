<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Spotin' - Voyages</title>
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

$destination = $_GET['destination'];

?>

<style>
    figure
    {
        width: 320px;
        float: left;
        margin: 0 20px 0 0;
        background: white;
        border: 10px solid white;
        -webkit-box-shadow: 0 3px 10px #ccc;
        -moz-box-shadow: 0 3px 10px #ccc;
        -webkit-transform: rotate(5deg);
        -moz-transform: rotate(5deg);
        -webkit-transition: all 0.7s ease;
        -moz-transition: all 1s ease;
        position: relative;
    }

    figcaption
    {
        text-align: center;
        display: block;
        font-size: 12px;
        font-style: italic;
    }
    figure:hover
    {
        -webkit-transform: rotate(-1deg); -moz-transform: rotate(1deg);
        -webkit-box-shadow: 0 3px 10px #666; -moz-box-shadow: 0 3px 10px #666;
    }

    figure:focus
    {
        outline: none;
        -webkit-transform: rotate(-3deg) scale(3.5); -moz-transform: rotate(-3deg) scale(3.5);
        -webkit-box-shadow: 0 3px 10px #666; -moz-box-shadow: 0 3px 10px #666;
        z-index: 9999;
    }
</style>

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
                    <li><a href="projets.php">Projets</a></li>
                    <li class="current"><a href="voyages.php">Voyages</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
            } else if (empty($_SESSION['mail'])) { // compte entreprise
                ?><ul style="padding-left: 270px;">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li class="current"><a href="voyages.php">Voyages</a></li>
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
                <li class="current"><a href="voyages.php">Voyages</a></li>
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
    <section style="padding: 3em 0 3em 0" class="wrapper style1">
        <a style="margin-left:100px;" href="voyages.php">Retour à la liste des voyages</a>
        <div class="container" style="padding-top: 60px">
            <div class="row 200%">

                <div class="8u  12u(narrower) important(narrower)">
                    <div id="content">

                        <!-- Content -->
                        <article>

                            <?php

                            $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                            $req1=$bdd -> query("SELECT * FROM Voyage WHERE lieu='$destination'");
                            $res1=$req1 -> fetch();

                            $req=$bdd -> query("SELECT * FROM PhotosVoyage WHERE destination='".$res1['id']."'");

                            echo "<h3>" . $destination . "</h3>";

                            if(empty($_SESSION['user'])) { // aucun utilisateur connecté

                            echo "<div>
                                            <figure tabindex=".$res1['id']." contenteditable='true'>
                                            <img style='padding-bottom:30px;' width=100%; src='".$res1['image']."' alt='jump, matey' contenteditable='false' />
                                            <figcaption contenteditable='false'></figcaption>
                                            </figure>
                                        </div>
                                            ";


                            while($res=$req -> fetch()) {
                                ?><div>
                                <figure tabindex='<?php $res['id'] ?>' contenteditable='true'>
                                    <img style='padding-bottom:30px;' width=100%; src='<?php echo $res['lien'] ?>' alt='jump, matey' contenteditable='false' />
                                    <figcaption contenteditable='false'></figcaption>
                                </figure>
                                </div><?php
                                }
                            } else if (empty($_SESSION['mail'])) { // compte entreprise
                                ?>
                                <a style="min-width: 12em;padding:0" href="delete-voyage.php?destination=<?php echo $destination ?>" class="button">Supprimer ce voyage</a>
                                <a id="buttonAd" style="min-width: 12em;padding:0" onclick="DisplayForm()" class="button">Ajouter une image à l'album</a>
                                <br/><br/>
                                <form style="display: none" method="POST" id="addImage" action="add-image.php" enctype="multipart/form-data">
                                    <input type="hidden" name="destination" id="destination" value="<?php echo $destination ?>">
                                    <input type="hidden" name="id_destination" id="id_destination" value="<?php echo $res1['id'] ?>">
                                    <label for="image">Choisissez une image (PDF,PNG ou JPG) :</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="102400000000"/>
                                    <input style="text-align: center" type="file" style="width:75%;" name="image" id="image"/>
                                    <br/>
                                    <input id="submit" type="submit" class="button alt" value="Envoyer" style="line-height: 1.8em; background-color: #333" />
                                </form>

                                <br/><br/><br/>

                                <script>
                                    function DisplayForm(){
                                        document.getElementById('buttonAd').style.backgroundColor = "grey";
                                        document.getElementById('addImage').style.display = "block";
                                    }

                                    function DisplayForm2(){
                                        document.getElementById('buttonCouverture').style.backgroundColor = "grey";
                                        document.getElementById('couverture').style.display = "block";
                                    }
                                </script>

                            <?php

                            echo "<div>
                                            <figure tabindex=".$res1['id']." contenteditable='true'>
                                            <img style='padding-bottom:30px;' width=100%; src='".$res1['image']."' alt='jump, matey' contenteditable='false' />
                                            <figcaption contenteditable='false'>Photo de couverture</figcaption>
                                            </figure>
                                        </div>
                                            ";


                            while($res=$req -> fetch()) {
                                ?><div>
                                            <figure tabindex='<?php $res['id'] ?>' contenteditable='true'>
                                            <img style='padding-bottom:30px;' width=100%; src='<?php echo $res['lien'] ?>' alt='jump, matey' contenteditable='false' />
                                            <figcaption contenteditable='false'><a style='cursor:pointer' href='delete-image.php?id_image=<?php $res['id'] ?>'>Supprimer cette photo</a></figcaption>
                                            </figure>
                                        </div>
                            <?php
                                }
                            } else { //compte client
                                echo "<div>
                                            <figure tabindex=".$res1['id']." contenteditable='true'>
                                            <img style='padding-bottom:30px;' width=100%; src='".$res1['image']."' alt='jump, matey' contenteditable='false' />
                                            <figcaption contenteditable='false'></figcaption>
                                            </figure>
                                        </div>
                                            ";


                                while($res=$req -> fetch()) {
                                    ?><div>
                                    <figure tabindex='<?php $res['id'] ?>' contenteditable='true'>
                                        <img style='padding-bottom:30px;' width=100%; src='<?php echo $res['lien'] ?>' alt='jump, matey' contenteditable='false' />
                                        <figcaption contenteditable='false'></figcaption>
                                    </figure>
                                    </div><?php
                                }

                            }

                            ?>

                        </article>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require("footer.html"); ?>

</div>

</body>
</html>
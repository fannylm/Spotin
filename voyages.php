<?php session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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

    <!--<style>
        html, body {
            padding:0;
            margin:0;
            height:100%
        }
        #cache {
            position:absolute;
            background:rgba(0,0,0,0);
            top:0;
            right:0;
            bottom:0;
            left:0;
            z-index: -1;
            transition:background .5s
        }
        #cache:target {
            background:rgba(0,0,0,.5);
            z-index: 1;
        }
        .popup {
            position:absolute;
            z-index: 1000;
            display:none;
            top:30px;
            left:300px;
        }
        .popup a {
            position:absolute;
            background: #333;
            color:#fff;
            border-radius: 50%;
            width:20px;
            line-height: 20px;
            text-align: center;
            right:0;
            text-decoration: none;
        }
        #cache:target ~ .popup {
            display:block;
        }
    </style>-->

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
                <li><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul><?php
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

    <section class="wrapper style1">
        <div class="container">
            <div class="row 200%">
                <div class="4u 12u(narrower)">
                    <div id="sidebar" style="position: fixed">

                        <!-- Sidebar -->

                        <section style="width: 80%; text-align: right">
                            <!-- Faire une boucle pour afficher les destinations -->
                            <h3>Destinations</h3><br/>

                            <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                            $req=$bdd -> query("SELECT * FROM DestinationVoyage");
                            $i=$req->rowCount();
                            while($res=$req -> fetch()){
                                echo $res['lieu']."<br/>";
                            }
                            ?>
                            <br/><br/><br/>
                            <?php
                            if(empty($_SESSION['user'])){ // si la variable de session identifiant est nulle ou inexistante
                                ?><?php
                            } else if (empty($_SESSION['mail'])) {
                                ?><a style="padding:0" href="add-voyage.php" class="button">Nouveau voyage</a>
                                <br/><br/>
                                <a style="padding:0" href="delete-voyage.php" class="button">Supprimer un voyage</a>
                                <br/><br/>
                                <a style="padding:0" href="update-voyage.php" class="button">Modifier un voyage</a>
                            <?php
                            } else {
                                ?><?php
                            }
                            ?>

                            <!--<p style="text-align: right"><a class="active" href="#Londres">Londres</a></p><br/>
                            <p style="text-align: right"><a class="inactive" href="#NY">New York</a></p><br/>-->

                            <!--
                            <footer>
                                <a href="#" class="button">Continue Reading</a>
                            </footer>
                        </section>

                        <section>
                            <h3>Another Subheading</h3>
                            <ul class="links">
                                <li><a href="#">Amet turpis, feugiat et sit amet</a></li>
                                <li><a href="#">Ornare in hendrerit in lectus</a></li>
                                <li><a href="#">Semper mod quis eget mi dolore</a></li>
                                <li><a href="#">Consequat etiam lorem phasellus</a></li>
                                <li><a href="#">Amet turpis, feugiat et sit amet</a></li>
                                <li><a href="#">Semper mod quisturpis nisi</a></li>
                            </ul>
                            <footer>
                                <a href="#" class="button">More Random Links</a>
                            </footer>-->
                        </section>

                    </div>
                </div>
                <div class="8u  12u(narrower) important(narrower)" style="padding-left: 1px;">
                    <div id="content">

                        <!-- Content -->

                        <article>
                            <div id="Londres" style="display: block">
                                <h2>Londres</h2>
                                <!--<p>Sidebar on the left, content on the right.</p>-->

                            <!--<div style="display: block; margin: 0; padding: 0; border: 0; font: inherit; vertical-align: baseline;">-->
                            <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                            $req=$bdd -> query("SELECT * FROM Voyages WHERE destination='Londres'");
                            $i=$req -> rowCount();
                            while($res=$req -> fetch()){
                                //echo "<img width='30%' src='".$res['lien']."'>";
                                echo "<figure tabindex=".$i." contenteditable='true'>
                                        <img width='100%' src='".$res['lien']."' alt='jump, matey' contenteditable='false' />
                                        <figcaption contenteditable='false'>".$res['description']."</figcaption>
                                        </figure>";
                            }
                            ?>
                            </div>
                            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                            <div id="NY" style="display: block">
                                <h2>NY</h2>
                                <?php
                                $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                                $req=$bdd -> query("SELECT * FROM Voyages WHERE destination='New York'");
                                $i=$req -> rowCount();
                                while($res=$req -> fetch()){
                                    echo "<figure tabindex=".$i." contenteditable='true'>
                                        <img width='100%' src='".$res['lien']."' alt='jump, matey' contenteditable='false' />
                                        <figcaption contenteditable='false'>".$res['description']."</figcaption>
                                        </figure>";
                                }
                                ?>
                            </div>


    <?php

    $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

    $req=$bdd -> query("SELECT * FROM Voyages, DestinationVoyage WHERE Voyages.destination=DestinationVoyage.lieu");
    $req2=$bdd -> query("SELECT * FROM DestinationVoyage");
    $i=$req -> rowCount();
    while ($res2=$req2 -> fetch()){
    echo "<h2>".$res2['lieu']."</h2>";
    }
    while($res=$req -> fetch()){
        echo "  <figure tabindex=".$i." contenteditable='true'>
                <img width='100%' src='".$res['lien']."' alt='jump, matey' contenteditable='false' />
                <figcaption contenteditable='false'>".$res['description']."</figcaption>
                </figure>";
    }



    ?>

<!--<br/><br/><br/><p>Tableau</p>
<table>
    <tr>
        <td style="width: 29%; border: 8px solid white;"><img width="100%" src="images/Voyages/Londres/1.jpg"></td>
        <td style="width: 30%; border: 8px solid white;"><img width="100%" src="images/Voyages/Londres/2.jpg"></td>
        <td style="width: 30%; border: 8px solid white;"><img width="100%" src="images/Voyages/Londres/3.jpg"></td>
    </tr>
</table>-->

                            <!--<ul>
                                <li>
                                    <img width="35%" src="images/Voyages/Londres/1.jpg">
                                </li>
                                <li>
                                    <img width="35%" src="images/Voyages/Londres/2.jpg">
                                </li>
                                <li>
                                    <img width="35%" src="images/Voyages/Londres/3.jpg">
                                </li>
                            </ul>
                            <p>Pas BDD</p>

                            <div style="display: block; margin: 0; padding: 0; border: 0; font: inherit; vertical-align: baseline;">
                                <img width="30%" src="images/Voyages/Londres/1.jpg">
                                <img width="30%" src="images/Voyages/Londres/2.jpg">
                                <img width="30%" src="images/Voyages/Londres/3.jpg">
                                <img width="30%" src="images/Voyages/Londres/4.jpg">
                                <img width="30%" src="images/Voyages/Londres/5.jpg">
                            </div>-->


<br/><br/><br/>
                            <!--<div id="cache"></div>
                            <a href="#cache">
                                <img width="30%" src="images/Voyages/Londres/1.jpg">
                                <img width="30%" src="images/Voyages/Londres/2.jpg">
                                <img width="30%" src="images/Voyages/Londres/3.jpg">
                                <img width="30%" src="images/Voyages/Londres/4.jpg">
                                <img width="30%" src="images/Voyages/Londres/5.jpg">
                            </a>
                            <div class="popup">
                                <img width="80%" src="images/Voyages/Londres/1.jpg"><a href="#">X</a>
                                <img width="80%" src="images/Voyages/Londres/2.jpg">
                                <img width="80%" src="images/Voyages/Londres/3.jpg">
                                <img width="80%" src="images/Voyages/Londres/4.jpg">
                                <img width="80%" src="images/Voyages/Londres/5.jpg">
                            </div>-->



                    <!--<section class="image-gallery">
                        <figure tabindex="1" contenteditable="true">
                            <img width="100%" src="images/Voyages/Londres/1.jpg" alt="jump, matey" contenteditable="false" />
                            <figcaption contenteditable="false">Big Ben</figcaption>
                        </figure>
                        <figure tabindex="2" contenteditable="true">
                            <img width="100%" src="images/Voyages/Londres/2.jpg" alt="jump, matey" contenteditable="false" />
                            <figcaption contenteditable="false">Underground</figcaption>
                        </figure>
                        <figure tabindex="3" contenteditable="true">
                            <img width="100%" src="images/Voyages/Londres/3.jpg" alt="jump, matey" contenteditable="false" />
                            <figcaption contenteditable="false">Wall</figcaption>
                        </figure>
                        <figure tabindex="4" contenteditable="true">
                            <img width="95%" src="images/Voyages/Londres/1.jpg" alt="jump, matey" contenteditable="false" />
                            <figcaption contenteditable="false">Big Ben</figcaption>
                        </figure>
                        <figure tabindex="5" contenteditable="true">
                            <img width="100%" src="images/Voyages/Londres/2.jpg" alt="jump, matey" contenteditable="false" />
                            <figcaption contenteditable="false">City</figcaption>
                        </figure>
                        <figure tabindex="6" contenteditable="true">
                            <img width="100%" src="images/Voyages/Londres/3.jpg" alt="jump, matey" contenteditable="false" />
                            <figcaption contenteditable="false">City</figcaption>
                        </figure>
                        <figure tabindex="7" contenteditable="true">
                            <img width="100%" src="images/Voyages/Londres/4.jpg" alt="jump, matey" contenteditable="false" />
                            <figcaption contenteditable="false">City</figcaption>
                        </figure>
                        <figure tabindex="8" contenteditable="true">
                            <img width="100%" src="images/Voyages/Londres/5.jpg" alt="jump, matey" contenteditable="false" />
                            <figcaption contenteditable="false">City</figcaption>
                        </figure>
                    </section>-->


                            <!--<div style="display: relative">
                                <img width="35%" src="images/Voyages/Londres/2.jpg">
                            </div>
                            <div style="display: relative">
                                <img width="35%" src="images/Voyages/Londres/3.jpg">
                            </div>-->

                            <!--<img width="35%" src="images/Voyages/Londres/1.jpg">-->

                            <br/><br/>
                            <!--<span class="image featured"><img src="images/banner.jpg" alt="" /></span>

                            <p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus.
                                Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat.
                                Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi
                                consequat etiam lorem ipsum dolor sit amet nullam.</p>

                            <h3>And Yet Another Subheading</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac quam risus, at tempus
                                justo. Sed dictum rutrum massa eu volutpat. Quisque vitae hendrerit sem. Pellentesque lorem felis,
                                ultricies a bibendum id, bibendum sit amet nisl. Mauris et lorem quam. Maecenas rutrum imperdiet
                                vulputate. Nulla quis nibh ipsum, sed egestas justo. Morbi ut ante mattis orci convallis tempor.
                                Etiam a lacus a lacus pharetra porttitor quis accumsan odio. Sed vel euismod nisi. Etiam convallis
                                rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien.
                                Donec sagittis massa et leo semper a scelerisque metus faucibus. Morbi congue mattis mi.
                                Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum commodo luctus.</p>

                            <p>Phasellus odio risus, faucibus et viverra vitae, eleifend ac purus. Praesent mattis, enim
                                quis hendrerit porttitor, sapien tortor viverra magna, sit amet rhoncus nisl lacus nec arcu.
                                Suspendisse laoreet metus ut metus imperdiet interdum aliquam justo tincidunt. Mauris dolor urna,
                                fringilla vel malesuada ac, dignissim eu mi. Praesent mollis massa ac nulla pretium pretium.
                                Maecenas tortor mauris, consectetur pellentesque dapibus eget, tincidunt vitae arcu.
                                Vestibulum purus augue, tincidunt sit amet iaculis id, porta eu purus.</p>-->
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
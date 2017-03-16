<?php session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
            <li><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul><?php
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

    <style>
        #sidebar.inner.nav.current{
            background-color:white;
        }
    </style>

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
                                    <li id="first"><a href="#intro" onclick="CurrentClass()">Welcome</a></li>
                                    <li><a href="#one">Who we are</a></li>
                                    <li><a href="#two">What we do</a></li>
                                    <li><a href="#three">Get in touch</a></li>
                                </ul>
                            </nav>
                        </div>
                    </section>

                    <script>
                        function CurrentClass(){
                            $("#first").addClass("current");
                        }
                    </script>
                </div>
                <div class="8u  12u(narrower) important(narrower)">
                    <div id="content">

                        <!-- Content -->

                        <article>
                            <header>
                                <h2>Left Sidebar</h2>
                                <p>Sidebar on the left, content on the right.</p>
                            </header>

                            <div id="intro" onblur="CurrentClass()"><p>intro</p></div>

                            <span class="image featured"><img src="images/banner.jpg" alt="" /></span>

                            <p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus.
                                Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat.
                                Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi
                                consequat etiam lorem ipsum dolor sit amet nullam.</p>

                            <div id="one"><p>one</p></div>

                            <h3>And Yet Another Subheading</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac quam risus, at tempus
                                justo. Sed dictum rutrum massa eu volutpat. Quisque vitae hendrerit sem. Pellentesque lorem felis,
                                ultricies a bibendum id, bibendum sit amet nisl. Mauris et lorem quam. Maecenas rutrum imperdiet
                                vulputate. Nulla quis nibh ipsum, sed egestas justo. Morbi ut ante mattis orci convallis tempor.
                                Etiam a lacus a lacus pharetra porttitor quis accumsan odio. Sed vel euismod nisi. Etiam convallis
                                rhoncus dui quis euismod. Maecenas lorem tellus, congue et condimentum ac, ullamcorper non sapien.
                                Donec sagittis massa et leo semper a scelerisque metus faucibus. Morbi congue mattis mi.
                                Phasellus sed nisl vitae risus tristique volutpat. Cras rutrum commodo luctus.</p>

                            <div id="two"><p>two</p></div>

                            <p>Phasellus odio risus, faucibus et viverra vitae, eleifend ac purus. Praesent mattis, enim
                                quis hendrerit porttitor, sapien tortor viverra magna, sit amet rhoncus nisl lacus nec arcu.
                                Suspendisse laoreet metus ut metus imperdiet interdum aliquam justo tincidunt. Mauris dolor urna,
                                fringilla vel malesuada ac, dignissim eu mi. Praesent mollis massa ac nulla pretium pretium.
                                Maecenas tortor mauris, consectetur pellentesque dapibus eget, tincidunt vitae arcu.
                                Vestibulum purus augue, tincidunt sit amet iaculis id, porta eu purus.</p>
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
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
            <li><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul><?php
        } else { // compte client
            ?><ul style="padding-left: 300px;">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="prestations.php">Prestations</a></li>
            <li><a href="projets.php">Projets</a></li>
            <li><a href="voyages.php">Voyages</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="a-propos.php">À propos</a></li>
            <li class="current"><a href="compte.php">Mon compte</a></li>
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

    <div id="form1">
        <form action="compte-name.php" method="POST" id="formCompte" >
            <div id="compte"><label id="labelCompte">Nom : </label></div>
            <div id="compte3"><?php echo $_SESSION['nom']; ?><i id="pencil" class="fa fa-pencil" aria-hidden="true" onclick="UpdateName()"></i></div>
            <div id="compte2" style="display: none;"><input type="text" name="nom" id="inputCompte" value="<?php echo $_SESSION['nom'];  ?>"><input id="submitCompte" type="submit" class="button alt" value="Ok" /></div>
        </form>
        <br/><br/>
        <form action="compte-surname.php" method="POST" id="formCompte" >
            <div id="compte"><label id="labelCompte">Prénom : </label></div>
            <div id="compte3"><?php echo $_SESSION['prenom']; ?><i id="pencil" class="fa fa-pencil" aria-hidden="true" onclick="UpdateName()"></i></div>
            <div id="compte2" style="display: none;"><input type="text" name="nom" id="inputCompte" value="<?php echo $_SESSION['prenom'];  ?>"><input id="submitCompte" type="submit" class="button alt" value="Ok" /></div>
        </form>
        <br/><br/>

        <div id="compte"><label id="labelCompte">Prénom : </label></div><div id="compte3"><?php echo $_SESSION['prenom'] ?></div><br/><br/>
        <div id="compte"><label id="labelCompte">Pseudo : </label></div><div id="compte3"><?php echo $_SESSION['user'] ?></div><br/><br/>
        <div id="compte"><label id="labelCompte">Adresse mail : </label></div><div id="compte3"><?php echo $_SESSION['mail']; ?></div><br/><br/>
        <div id="compte"><label id="labelCompte">Numéro de téléphone : </label></div><div id="compte3"><?php echo $_SESSION['tel'] ?></div><br/><br/>
        <div id="compte"><label id="labelCompte">Date de naissance : </label></div><div id="compte3"><?php echo $_SESSION['birthday'] ?></div><br/><br/>

        <p style="margin-left: 0px;"><input style="line-height: 2em; width: 1em;" id="submit" class="button alt" value="Tout modifier" onclick="UpdateAll()" /></p>
    </div>

    <script>

     function UpdateName(){
         document.getElementById('compte3').style.display = "none";
         document.getElementById('compte2').style.display = "flex";
     }

     function UpdateAll(){
         document.getElementById('form1').style.display = "none";
         document.getElementById('form2').style.display = "block";
     }

     /*$('#submitCompte').click(function() {
         var name = $('#inputCompte').val();
         console.log('...'+name);
         /*if (name == '') { // si les champs sont vides
             alert('Veuillez remplir ce champ !');
         }
         console.log(name);
         else {*/
             /*$.ajax({
                 url: 'compte-name.php',
                 type: 'POST',
                 data : {
                     name: name
                 },
                 success: function (data) {
                     console.log(data);
                     if (data == 'success') {
                         document.getElementById('compte2').style.display = "none";
                         document.getElementById('compte3').style.display = "flex";
                         //$("#compte3").html('name:'.name);

                     }
                     else {
                         document.getElementById('compte2').style.display = "none";
                         document.getElementById('compte3').style.display = "flex";
                         //$("#compte3").html("<p> Erreur lors de la modification du champ</p>");
                     }
                 }
             });
         //}
     });*/



    </script>

    <div id="form2" style="display: none;">
    <div id="compte"><label id="labelCompte">Nom </label></div><div id="compte2"><input type="text" id="inputCompte"></div><br/><br/>
    <div id="compte"><label id="labelCompte">Prénom  </label></div><div id="compte2"><input type="text" id="inputCompte"></div><br/><br/>
    <div id="compte"><label id="labelCompte">Pseudo  </label></div><div id="compte2"><input type="text" id="inputCompte"></div><br/><br/>
    <div id="compte"><label id="labelCompte">Adresse mail  </label></div><div id="compte2"><input type="text" id="inputCompte"></div><br/><br/>
    <div id="compte"><label id="labelCompte">Numéro de téléphone  </label></div><div id="compte2"><input type="text" id="inputCompte"></div><br/><br/>
    <div id="compte"><label id="labelCompte">Date de naissance  </label></div><div id="compte2"><input type="text" id="inputCompte"></div><br/><br/>
    <p style="margin-left: 130px;"><input style="line-height: 2em; min-width: 7em;" id="submit" type="submit" class="button alt" value="Ok" /></p>
    </div>

</div>
</div>
</section>










<!-- Footer -->
<div id="footer">

<?php require("footer.html");  ?>

</div>


</div>
</body>
</html>
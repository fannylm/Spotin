<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_GET['id_presta'];

$bdd->exec("DELETE FROM Prestation WHERE id = '$id'");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>





<?php require 'connect.php'; session_start(); ?>
<!DOCTYPE HTML>
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
                    <li class="current"><a href="prestations.php">Prestations</a></li>
                    <li><a href="projets.php">Projets</a></li>
                    <li><a href="voyages.php">Voyages</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="connexion.php" class="button">Connexion</a></li></ul><?php
            } else if (empty($_SESSION['mail'])) { // compte entreprise
                ?><ul style="padding-left: 270px;">
                <li><a href="index.php">Accueil</a></li>
                <li class="current"><a href="prestations.php">Prestations</a></li>
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
                <li class="current"><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="a-propos.php">À propos</a></li>
                <li><a href="compte.php">Mon compte</a></li>
                <li><a href="connexion.php?deco=true" class="button">Deconnexion</a></li>

                <li class="cercle"><a style="color: #ffffff; font-size: 15px; padding: 0; margin-left: 30px">Connecté en tant que <?php echo $_SESSION['prenom']; echo " "; echo $_SESSION['nom'] ?></a></li></ul>

            <?php
            }
            ?>
        </nav>

    </div>
    <?php if(empty($_SESSION['user'])){

    } else if (empty($_SESSION['mail'])){ ?>
        <!-- Main -->
        <section class="wrapper style1">
            <div class="container">

                <fieldset id="cadre" class="fieldsetform"><legend><h2 id="title" type="title">Supprimer une prestation</h2></legend>
                    <br/><br/>
                    <form method="POST" id="prestation" action="delete-prestation.php">
                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label for="id">Quelle prestation souhaitez-vous supprimer ?</label>
                                <select name="id" id="id">
                                    <optgroup label="Photographique">
                                        <?php
                                        $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
                                        $req=$bdd -> query("SELECT * FROM Prestation WHERE type='photo'");
                                        while($res=$req -> fetch()){
                                            echo "<option value=".$res['id'].">".$res['prestation']."</option><br/>";
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="Audiovisuelle">
                                        <?php
                                        $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
                                        $req=$bdd -> query("SELECT * FROM Prestation WHERE type='video'");
                                        while($res=$req -> fetch()){
                                            echo "<option value=".$res['id'].">".$res['prestation']."</option><br/>";
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <br/><br/><br/>
                    </form>
                    <input id="submit" type="submit" class="button alt" value="Ok"  />
                    <br/><br/><br/>
                </fieldset>
                <div id="resultat"></div>

                <script>

                    $('#submit').click(function() {
                        var select = document.getElementById("id" );
                        var id = select.options[select.selectedIndex].value;
                        var alert = confirm("Êtes-vous sûr de vouloir supprimer cette prestation ?");
                        if(alert) {
                            $.ajax({
                                url: 'delete-presta.php',
                                type: 'POST',
                                data : {
                                    id: id
                                },
                                success: function (data) {
                                    if (data == 'success') {
                                        // cacher le formulaire
                                        document.getElementById('prestation').style.display = "none";
                                        document.getElementById('submit').style.display = "none";
                                        document.getElementById('title').style.display = "none";
                                        document.getElementById('cadre').style.display = "none";
                                        $("#resultat").html("<p style='text-align: center'> Prestation correctement supprimée !<br/>Vous allez être automatiquement redirigé vers la page des prestations. Si cela ne fonctionne pas veuillez cliquer <a href='prestations.php'>ici</a></p>");
                                        function redirection(){
                                            self.location.href="prestations.php"
                                        }
                                        setTimeout(redirection,3000);
                                    }
                                    else {
                                        document.getElementById('prestation').style.display = "none";
                                        document.getElementById('submit').style.display = "none";
                                        document.getElementById('title').style.display = "none";
                                        document.getElementById('cadre').style.display = "none";
                                        $("#resultat").html("<p style='text-align: center'> Erreur lors de la suppression de la prestation... Veuillez essayer à nouveau à partir d'<a href='prestations.php'>ici</a>.</p>");
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
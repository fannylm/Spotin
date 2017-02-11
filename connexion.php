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

</head>
<body>
<?php
if($_GET['deco']==true) {
    // On détruit les variables de notre session
    session_unset ();
    // On détruit notre session
    session_destroy ();?>
<script>
    function redirection(){
        self.location.href="index.php"
    }
    setTimeout(redirection,5000);
</script>
<?php } ?>
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
                <li><a href="a-propos.php">À propos</a></li>
                <li>
                    <a href="prestations.php">Prestations</a>
                    <ul>
                        <li><a href="#">Lorem dolor</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam sed tempus</a></li>
                        <li>
                            <a href="#">Submenu</a>
                            <ul>
                                <li><a href="#">Lorem dolor</a></li>
                                <li><a href="#">Phasellus magna</a></li>
                                <li><a href="#">Magna phasellus</a></li>
                                <li><a href="#">Etiam nisl</a></li>
                                <li><a href="#">Veroeros feugiat</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Veroeros feugiat</a></li>
                    </ul>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>

    </div>

    <!-- Main -->
    <section class="wrapper style1">
        <div class="container">
            <div id="content">

                <!-- Content -->
                <article>
                    <?php
                    if(!isset($_POST['username'])) {
                        ?>
                        <header>
                            <h2 style="text-align: center">Connexion</h2>
                        </header>
                        <p style="text-align: center">Pas encore inscrit ? Inscrivez-vous vite <a href="inscription.php">ici</a></p>
                        <form name="mail" action="connexion.php" method="POST">
                            <table class="connexion">
                                <tr>
                                    <td style="text-align: right; padding-right: 20px;">
                                        <div class="row 50%">
                                            <div class="6u 12u(mobilep)">
                                                <label>Identifiant</label>
                                            </div>
                                        </div>
                                        <div class="row 50%">
                                            <div class="6u 12u(mobilep)">
                                                <label>Mot de passe</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: left">
                                        <div class="row 50%">
                                            <div class="6u 12u(mobilep)">
                                                <input style="width: 60%" type="text" name="username" id="username"/>
                                            </div>
                                        </div>
                                        <div class="row 50%">
                                            <div class="6u 12u(mobilep)">
                                                <input style="width: 60%" type="password" name="password" id="password"/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <br/>

                            <p style="text-align: center"><input type="submit" class="button alt" value="Envoyer"/></p>
                        </form>
                    <?php
                    } else {
                        if (empty($_POST['username']) || empty($_POST['password'])) { ?>
                            <script>
                                alert('Vous devez remplir tous les champs pour vous connecter !');
                            </script>
                            <header>
                                <h2 style="text-align: center">Connexion</h2>
                            </header>
                            <p style="text-align: center">Pas encore inscrit ? Inscrivez-vous vite <a href="inscription.php">ici</a></p>
                            <form action="connexion.php" method="POST">
                                <table class="connexion">
                                    <tr>
                                        <td style="text-align: right; padding-right: 20px;">
                                            <div class="row 50%">
                                                <div class="6u 12u(mobilep)">
                                                    <label>Identifiant</label>
                                                </div>
                                            </div>
                                            <div class="row 50%">
                                                <div class="6u 12u(mobilep)">
                                                    <label>Mot de passe</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: left">
                                            <div class="row 50%">
                                                <div class="6u 12u(mobilep)">
                                                    <input style="width: 60%" type="text" name="username" id="username"/>
                                                </div>
                                            </div>
                                            <div class="row 50%">
                                                <div class="6u 12u(mobilep)">
                                                    <input style="width: 60%" type="password" name="password" id="password"/>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <br/>

                                <p style="text-align: center"><input type="submit" class="button alt" value="Envoyer"/></p>
                            </form>

                            <?php
                            } else {
                            $bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

                            $req=$bdd -> query("SELECT * FROM Client");
                            $res=$req -> fetch();
                            $username = $res['identifiant'];
                            $password = $res['mdp'];


                            if( isset($_POST['username']) && isset($_POST['password']) ) {

                                if ($_POST['username'] == $username && $_POST['password'] == $password) { // Si les valeurs correspondent
                                    $_SESSION['user'] = $username;
                                    $_SESSION['prenom'] = $res['Prenom'];
                                    $_SESSION['nom'] = $res['Nom'];
                                    $_SESSION['mail'] = $res['Mail'];
                                    $_SESSION['id'] = $res['Id'];
                                    session_start(); // démarrage de la session?>
                                    <script>
                                        function redirection(){
                                            self.location.href="index.php"
                                        }
                                        setTimeout(redirection,5000);
                                    </script><?php
                                    echo "<p style='text-align: center'>Vous êtes maintenant connecté " . $_SESSION['prenom'] . " ! Vous allez être automatiquement redirigé vers la page d'accueil. Si ça ne fonctionne pas, veuillez cliquer <a href='index.php'>ici</a></p>";
                                    } else {
                                    echo "<p style='text-align: center'>Une erreur s'est produite pendant votre identification.</br>Cliquez <a href='./connexion.php'>ici</a> pour revenir à la page précédente<br />Cliquez <a href='./index.php'>ici</a> pour revenir à la page d'accueil</p>";
                                }
                            }
                        }
                    ?>

                    <script>
                        /*
                        $(document).ready(function(){
                            $("#submit").click(function{
                                $.post('traitconnexion.php', {
                                        login : $("#username").val(),  // Récupération des valeurs de l'identifiant et du mdp
                                        password : $("#password").val()
                                    },
                                    function(data){
                                        if(data == 'Success'){
                                            $("#resultat").html("<p>Connexion réussie !</p>");
                                        } else{
                                            $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                                        }
                                    },
                                    'text' // affiche la réussite ou non de la connexion
                                );

                            });

                        });*/
                    </script>

                    <br/>
                    <br/>


                </article>
            </div>
        </div>
    </section>
<?php } ?>
    <?php require("footer.html"); ?>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>
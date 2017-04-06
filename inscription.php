<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>

    <title>Spotin' - Inscription</title>
    <link rel="icon" type="image/png" href="images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <script src="assets/js/jquery-2.1.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.4/processing.js"></script>-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <?php include('connect.php');?>
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

    <!-- Scripts -->

    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>

    <script src="assets/js/jquery-2.1.1.js"></script>
    <script src="assets/js/jquery.min.js"></script>

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
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="projets.php">Projets</a></li>
                <li><a href="voyages.php">Voyages</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="a-propos.php">À propos</a></li>
            </ul>
        </nav>

    </div>

    <!-- Main -->
    <section class="wrapper style1">
        <div class="container">
            <div id="content">

                <!-- Content -->

                <article>
                    <header>
                        <h2 id="title" style="text-align: center">Inscription</h2>
                    </header>

                    <form action="inscription.php" method="POST" id="inscription" onsubmit="return checkform(this)">

                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label class="required" for="nom">Prénom</label>
                                <input type="text" name="prenom" id="prenom" placeholder="Plus de 2 caractères" onblur="checkprenom(this)">
                                <span id="prenom-correct"></span><span id="prenom-incorrect"></span>
                            </div>
                        </div>
                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label class="required" for="prenom">Nom</label>
                                <input type="text" name="nom" id="nom" placeholder="Plus de 2 caractères" onblur="checknom(this)">
                                <span id="nom-correct"></span><span id="nom-incorrect"></span>
                            </div>
                        </div>
                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label class="required" for="email">Adresse mail</label>
                                <input type="text" name="email" id="email" placeholder="mr.dupont@gmail.com" onblur="checkmail(this)">
                                <span id="mail-correct"></span><span id="mail-incorrect"></span>
                            </div>
                        </div>
                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label class="required" for="pseudo">Pseudo</label>
                                <input type="text" name="pseudo" id="pseudo" placeholder="Compris entre 4 et 14 caractères" onblur="checkpseudo(this)">
                                <span id="pseudo-correct"></span><span id="pseudo-incorrect"></span>
                                <span id="identifiant-correct"></span><span id="identifiant-incorrect"></span>
                            </div>
                        </div>
                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label class="required" for="mdp1">Mot de passe</label>
                                <input type="password" name="mdp1" id="mdp1" placeholder="Compris entre 4 et 12 caractères" onblur="checkmdp(this)">
                                <span id="mdp1-correct"></span><span id="mdp1-incorrect"></span>
                            </div>
                        </div>
                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label class="required" for="mdp2">Confirmation de mot de passe</label>
                                <input type="password" name="mdp2" id="mdp2" placeholder="" onblur="">
                                <span id="mdp2-correct"></span><span id="mdp2-incorrect"></span>
                            </div>
                        </div>
                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label class="required" for="tel">Numéro de téléphone</label>
                                <input type="text" name="tel" id="tel" placeholder="0692XXXXXX" onblur="checkphone(this)">
                                <span id="tel-correct"></span><span id="tel-incorrect"></span>
                            </div>
                        </div>
                        <div class="row 50%" style="width: 60%; margin-right: auto; margin-left: auto;">
                            <div class="12u">
                                <label for="birthday">Date de naissance</label>
                                <input type="date" name="date" id="date">
                                <span id="birthday-correct"></span><span id="birthday-incorrect"></span>
                            </div>
                        </div>
                        <br/><br/>
                        <p style="text-align: center"><input id="inscrit" class="button alt" value="Inscription" /></p>
                    </form><div id="resultat"></div><br/><br/>

                    <br/><br/>

                    <script>
                        // Fonction qui permet de changer la couleur de l'arrière plan pour faire ressortir les erreurs
                        /*function underline(champ, erreur) {
                         if(erreur)
                         champ.style.backgroundColor = "#FDE3E3";
                         else
                         champ.style.backgroundColor = "";
                         }*/


                        // Fonction qui vérifie le format du nom
                        function checknom(nom){
                            var name = nom.value || nom;
                            if (isNaN(name) && name.length>=2){
                                $('#nom').next('#nom-correct').fadeIn().text('');
                                $('#nom-correct').next('#nom-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
                                //underline(name,false);
                                return true;
                            }
                            else{
                                $('#nom-correct').next('#nom-incorrect').fadeIn().text('Format du nom incorrect. Il doit comporter plus de 2 caractères');
                                $('#nom').next('#nom-correct').fadeOut();
                                //underline(name,true);
                                return false;
                            }
                        }

                        // Fonction qui vérifie le format du prénom
                        function checkprenom(prenom){
                            var firstname = prenom.value || prenom;
                            if (isNaN(firstname) && firstname.length>=2){
                                $('#prenom').next('#prenom-correct').fadeIn().text('');
                                $('#prenom-correct').next('#prenom-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
                                //underline(name,false);
                                return true;
                            }
                            else{
                                $('#prenom-correct').next('#prenom-incorrect').fadeIn().text('Format du nom incorrect. Il doit comporter plus de 2 caractères');
                                $('#prenom').next('#prenom-correct').fadeOut();
                                //underline(name,true);
                                return false;
                            }
                        }

                        // Fonction qui vérifie que le format du mail est bien valide
                        function checkmail(mail) {
                            var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
                            var email = mail.value || mail;
                            if (!regex.test(email)) {
                                $('#mail-correct').next('#mail-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
                                $('#mail').next('#mail-correct').fadeOut();
                                //underline(mail, true);
                                return false;
                            }
                            else {
                                $('#mail').next('#mail-correct').fadeIn().text('');
                                $('#mail-correct').next('#mail-incorrect').fadeOut();
                                //underline(mail, false);
                                return true;
                            }
                        }

                        // Fonction qui vérifie que le pseudo est au bon format
                        function checkpseudo(pseudo){
                            var identifiant = pseudo.value || pseudo;
                            if (identifiant.length>=4 && identifiant.length<=14){
                                $('#pseudo').next('#identifiant-correct').fadeIn().text('');
                                $('#identifiant-correct').next('#identifiant-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
                                //underline(name,false);
                                return true;

                            }
                            else{
                                $('#identifiant-correct').next('#identifiant-incorrect').fadeIn().text('Format du pseudo incorrect. Il doit être compris entre 4 et 8 caractères.');
                                $('#pseudo').next('#identifiant-correct').fadeOut();
                                //underline(name,true);
                                return false;
                            }
                         }

                        // Fonction qui vérifie que le pseudo n'est pas pris

                            $(function(){

                                $('#pseudo').keyup(function(){ // à chaque fois qu'on "lache" le clavier

                                    var pseudo = $('#pseudo').val(); // on récupère la valeur du pseudo
                                    $.ajax({
                                        url : 'inscrit.php', // La ressource ciblée
                                        type : 'POST', // Le type de la requête HTTP.
                                        data : {
                                            pseudo: pseudo
                                        },
                                        success:function(data){ // dès qu'on est bien rentré dans le fichier php
                                            if(data==1){ // si le php retourne 1 le pseudo existe déjà
                                                $('#pseudo-correct').next('#pseudo-incorrect').fadeIn().text('Ce pseudo est déjà pris');
                                                $('#pseudo').next('#pseudo-correct').fadeOut(); // pour eviter d'écrire deux textes à la suite
                                                //underline(pseudo,true);
                                                return false;
                                            } else if(data==0){
                                                $('#pseudo').next('#pseudo-correct').fadeIn().text('Pseudo disponible');
                                                $('#pseudo-correct').next('#pseudo-incorrect').fadeOut();
                                                //underline(pseudo,false);
                                                return true;
                                            }
                                        }
                                    });

                                });

                            });


                        // Fonction qui vérifie que le mdp est au bon format
                        function checkmdp(mdp){
                            var regex = /^[A-Za-z]\w{12,20}$/;
                            var password = mdp.value || mdp;
                            if(password.match(regex)){
                                $('#mdp1-correct').next('#mdp1-incorrect').fadeIn().text('Format du mot de passe invalide');
                                $('#mdp1').next('#mdp1-correct').fadeOut();
                                //underline(phonenumber, true);
                                return false;
                            }
                            else {
                                $('#mdp1').next('#mdp1-correct').fadeIn().text('');
                                $('#mdp1-correct').next('#mdp1-incorrect').fadeOut();
                                //underline(phonenumber, false);
                                return true;
                            }
                        }

                        // Fonction qui vérifie que le format du numéro de téléphone
                        function checkphone(phonenumber){
                            var regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                            var phone = phonenumber.value || phonenumber;
                            if (!regex.test(phone)) {
                                $('#tel-correct').next('#tel-incorrect').fadeIn().text('Format du numéro invalide');
                                $('#tel').next('#tel-correct').fadeOut();
                                //underline(phonenumber, true);
                                return false;
                            }
                            else {
                                $('#tel').next('#tel-correct').fadeIn().text('');
                                $('#tel-correct').next('#tel-incorrect').fadeOut();
                                //underline(phonenumber, false);
                                return true;
                            }
                        }


                        $('#inscrit').click(function() {
                            var nom = $('#nom').val();
                            var prenom = $('#prenom').val();
                            var email = $('#email').val();
                            var pseudo = $('#pseudo').val();
                            var mdp1 = $('#mdp1').val();
                            var mdp2 = $('#mdp2').val();
                            var tel = $('#tel').val();
                            var date = $('#date').val();
                            if (nom == '' || prenom == '' || email == '' || pseudo == '' || mdp1 == '' || mdp2 == '' || tel == '' || date == '' || !checknom(nom) || !checkprenom(prenom) || !checkmail(email) || !checkpseudo(pseudo) || !checkphone(tel)) { // si les champs sont vides
                                alert('Vous devez remplir tous les champs correctement!');
                            }
                            else {
                                $.ajax({
                                    url: 'add-inscrit.php',
                                    type: 'POST',
                                    data : {
                                        nom: nom,
                                        prenom: prenom,
                                        email: email,
                                        pseudo: pseudo,
                                        mdp1: mdp1,
                                        tel: tel,
                                        date: date
                                    },
                                    success: function (data) {
                                        if (data == 'success') {
                                            // cacher le formulaire
                                            document.getElementById('inscription').style.display = "none";
                                            $("#resultat").html("<p style='text-align: center'> Inscription réussie ! Vous pouvez désormais vous connecter avec vos identifiants <a href='connexion.php'>ici</a></p>");
                                        }
                                        else {
                                            document.getElementById('inscription').style.display = "none";
                                            $("#resultat").html("<p style='text-align: center'> Erreur lors de l'inscription... Veuillez réessayer <a href='inscription.php'>ici</a></p>");
                                        }
                                    }
                                });
                            }
                        });
                    </script>

                 <br/>
                 <br/>

             </article>
         </div>
     </div>
 </section>

    <?php require("footer.html"); ?>

</div>

<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>




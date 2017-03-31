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

                    <script>

                        // Fonction qui permet de changer la couleur de l'arrière plan pour faire ressortir les erreurs
                        function underline(champ, erreur) {
                            if(erreur)
                            //champ.style.backgroundColor = "#FDE3E3";
                                champ.css( 'background-color', '#FDE3E3' );
                            else
                            //champ.style.backgroundColor = "none";
                                champ.css( 'background-color', 'transparent' );
                        }

                        // Fonction ajax qui permet d'afficher instantanément si le pseudo est déjà utilisé ou non
                        $(function(){

                         $('#pseudo').keyup(function(){ // à chaque fois qu'on "lache" le clavier
                             var pseudo=$('#pseudo').val(); // on récupère la valeur du pseudo
                             $.ajax({
                                 url : 'inscrit.php', // La ressource ciblée
                                 type : 'POST', // Le type de la requête HTTP.
                                 data : 'pseudo=' + pseudo,
                                 success:function(data){ // dès qu'on est bien rentré dans le fichier php
                                    if(data==1){ // si le php retourne 1 le pseudo existe déjà
                                        $('#pseudo').next('#error').fadeIn().text('Ce pseudo est déjà pris');
                                        $('#error').next('#ok').fadeOut(); // pour eviter d'écrire deux textes à la suite
                                        console.log(data);
                                        underline(pseudo,true);
                                        return false;
                                    } else if(data==0){
                                        $('#error').next('#ok').fadeIn().text('Pseudo disponible');
                                        $('#pseudo').next('#error').fadeOut();
                                        underline(pseudo,false);
                                        return true;
                                    }
                                 }
                             });

                         });

                        });

                    </script>



                    <div id="contenu">

                        <p id="sentence"><em>Merci de remplir ces champs pour continuer.</em></p>
                        <form action="inscription.php" method="POST" name="Inscription" id="form">
                             <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe">
                                <option value="F">Féminin</option>
                                <option value="M">Masculin</option>
                            </select>
                             <label class="small" id="sexerror"></label>
                             <br/><br/>
                             <label class="required" for="nom">Nom</label> <input class="input" type="text" name="nom" id="nom"/>
                             <span id="nom-correct"></span><span id="nom-incorrect"></span>
                             <label class="required" for="prenom">Prénom</label> <input type="text" name="prenom" id="prenom"/>
                             <span id="prenom-correct"></span><span id="prenom-incorrect"></span>
                             <label class="required" for="pseudo">Pseudo</label> <input type="text" name="pseudo" id="pseudo" size="30" placeholder="compris entre 4 et 8 caractères" />
                             <span id="error"></span><span id="ok"></span><br/>
                             <label class="required" for="mdp1">Mot de passe</label> <input type="password" name="mdp1" id="mdp1" size="30" placeholder="compris entre 4 et 12 caractères"/>
                             <span id="mdp1-correct"></span><span id="mdp1-incorrect"></span>
                             <label class="required" for="mdp2">Confirmation de mot de passe</label> <input type="password" name="mdp2" id="mdp2" size="30" />
                             <span id="mdp2-correct"></span><span id="mdp2-incorrect"></span>
                             <label class="required" for="mail">Mail</label> <input type="email" name="mail" id="mail" size="30" placeholder="mr.dupont@gmail.com" />
                             <span id="mail-correct"></span><span id="mail-incorrect"></span>
                             <label class="required" for="birthday">Date de naissance</label><input type="date" name="birthday" id="birthday" size="30" placeholder="JJ/MM/AAAA" />
                             <span id="date-correct"></span><span id="date-incorrect"></span>
                             <label for="phone" class="float">Numéro de téléphone</label> <input type="tel" name="phone" id="phone" size="30" placeholder="+33 7 56 92 XX XX" />
                             <span id="phone-correct"></span><span id="phone-incorrect"></span>
                             <br/>
                             <div class="center"><input id="inscript" type="submit" class="button alt" value="Inscription"><br/><br/>
                     </form>
                 </div>
                    <div id="result"></div>


                    <script>

                    $('#inscript').click(function() {
                        var select = document.getElementById("sexe" );
                        var sexe = select.options[select.selectedIndex].value;
                        var nom = $('#nom').val();
                        var prenom = $('#prenom').val();
                        var pseudo = $('#pseudo').val();
                        var mdp1 = $('#mdp1').val();
                        var mdp2 = $('#mdp2').val();
                        var mail = $('#mail').val();
                        var birthday = $('#birthday').val();
                        var phone = $('#phone').val();
                        console.log(sexe);

                        if (sexe == '' || nom == '' || prenom == '' || pseudo == '' || mdp1 == '' || mdp2 == '' || mail == '' || birthday == '' || phone == '') { // si les champs sont vides
                            alert('Vous devez remplir tous les champs s!');
                        }
                        else {
                            $.ajax({
                                url: 'add-inscrit.php',
                                type: 'POST',
                                data : {
                                    sexe: sexe,
                                    nom: nom,
                                    prenom: prenom,
                                    pseudo: pseudo,
                                    mdp1: mdp1,
                                    mail: mail,
                                    birthday: birthday,
                                    phone: phone
                                },
                                success: function (data) {
                                    console.log(data);
                                    if (data == 'success') {
                                        // cacher le formulaire
                                        document.getElementById('form').style.display = "none";
                                        document.getElementById('sentence').style.display = "none";
                                        document.getElementById('title').style.display = "none";
                                        //afficher un message à la place
                                        $("#result").html("<p style='text-align: center'> Inscription réussie ! Vous pouvez désormais vous connecter avec vos identifiants <a href='connexion.php'>ici</a></p>");
                                    }
                                    else {
                                        document.getElementById('form').style.display = "none";
                                        document.getElementById('sentence').style.display = "none";
                                        document.getElementById('title').style.display = "none";
                                        $("#result").html("<p style='text-align: center'> Erreur lors de l'inscription... Veuillez remplir le formulaire à nouveau en cliquant <a href='inscription.php'>ici</a></p>");
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




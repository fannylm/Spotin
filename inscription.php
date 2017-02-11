<?php session_start(); ?>
<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>

    <title>Spotin' - Inscription</title>
    <link rel="icon" type="image/png" href="images/icon.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <script src="assets/js/jquery-2.1.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
    <?php //include('connect.php');?>
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

</head>
<body>
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
                    <header>
                        <h2 style="text-align: center">Inscription</h2>
                    </header>

                    <div id="contenu">
                        <script>
                            // Fonction qui permet de changer la couleur de l'arrière plan pour faire ressortir les erreurs
                            function underline(champ, erreur)
                            {
                                if(erreur)
                                    champ.style.backgroundColor = "#FDE3E3";
                                else
                                    champ.style.backgroundColor = "";
                            }

                            // Fonction qui vérifie que un genre a été sélectionné
                            function checksex(sex){
                                var sexe = document.getElementsByName('sex'),
                                        tooltipStyle = getTooltip(sexe[1].parentNode).style;

                                if (sexe[0].checked || sexe[1].checked) {
                                    return true;
                                } else {
                                    var msg = document.createTextNode("Ce champ est obligatoire");
                                    document.getElementById("sexerror").appendChild(msg);
                                    return false;
                                }
                            }

                            // Fonction qui vérifie que le nom n'est pas un nombre est que sa taille est supérieure ou égale à 2
                            function checkname(name){
                                if (isNaN(name) && name.value.length>=2){
                                    var msg = document.createTextNode("Correct");
                                    document.getElementById("nameerror").replaceWith(msg);
                                    underline(name,false);
                                    return true;
                                }
                                else{
                                    var msg = document.createTextNode("Format du nom incorrect. Il doit comporter plus de 2 caractères");
                                    document.getElementById("nameerror").replaceWith(msg);
                                    underline(name,true);
                                    return false;
                                }
                            }

                            // Fonction qui vérifie que le prénom n'est pas un nombre est que sa taille est supérieure ou égale à 2
                            function checkfirstname(firstname){
                                if (isNaN(firstname) && firstname.value.length>=2){
                                    underline(firstname,false);
                                    return true;
                                }
                                else{
                                    var msg = document.createTextNode("Format du prénom incorrect. Il doit comporter plus de 2 caractères");
                                    document.getElementById("firstnameerror").appendChild(msg);
                                    underline(firstname,true);
                                    return false;
                                }
                            }

                            // Fonction qui vérifie que la taille du pseudo est supérieure ou égale à 4 et inférieure à 8
                            function checkpseudo(pseudo){
                                if (pseudo.value.length>=4 && pseudo.value.length<=8){
                                    underline(pseudo,false);
                                    return true;
                                }
                                else{
                                    var msg = document.createTextNode("Format du pseudo incorrect. Il doit être compris entre 4 et 8 caractères");
                                    // récupérer l'élément ID et changer la valeur du texte à l'intérieur
                                    document.getElementById("pseudoerror").appendChild(msg);
                                    underline(pseudo,true);
                                    return false;
                                }
                            }

                            // Fonction qui vérifie que la taille du mot de passe est supérieure ou égale à 4 et inférieure à 12
                            function checkpw(password){
                                if (password.value.length>=4 && password.value.length<=12){
                                    underline(password,false);
                                    return true;
                                }
                                else{
                                    var msg = document.createTextNode("Format du mot de passe incorrect. Il doit être compris entre 4 et 12 caractères");
                                    document.getElementById("pwerror").appendChild(msg);
                                    underline(password,true);
                                    return false;
                                }
                            }

                            // Fonction qui vérifie que les deux mots de passe entrés sont les mêmes
                            function checkMdp(pw2) {
                                var mdp = document.getElementById("mdp1").value;
                                var mdp2 = document.getElementById("mdp2").value;
                                if (mdp!=mdp2) {
                                    var msg = document.createTextNode("Confirmation du mot de passe invalide");
                                    document.getElementById("mdperror").appendChild(msg);
                                    underline(pw2, true);
                                    return false;
                                }
                                return true;
                            }

                            // Fonction qui vérifie que le format du mail est bien valide
                            function checkmail(mail) {
                                var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
                                if (!regex.test(mail.value)){
                                    var msg = document.createTextNode("Format de l'adresse mail invalide");
                                    document.getElementById("mailerror").appendChild(msg);
                                    underline(mail,true);
                                    return false;
                                }
                                else{
                                    underline(mail,false);
                                    return true;
                                }
                            }

                            // Fonction qui vérifie que la date entrée est correcte
                            function checkDate(d) {
                                var amin=1900; // année mini
                                var amax=2002; // année maxi
                                var separateur="/"; // separateur entre jour/mois/annee
                                var j=(d.substring(0,2));
                                var m=(d.substring(3,5));
                                var a=(d.substring(6));
                                var ok=1;
                                if ( ((isNaN(j))||(j<1)||(j>31)) && (ok==1) ) {
                                    underline(d, true);
                                    return false; ok=0;
                                }
                                if ( ((isNaN(m))||(m<1)||(m>12)) && (ok==1) ) {
                                    underline(d, true);
                                    return false; ok=0;
                                }
                                if ( ((isNaN(a))||(a<amin)||(a>amax)) && (ok==1) ) {
                                    underline(d, true);
                                    return false; ok=0;
                                }
                                if ( ((d.substring(2,3)!=separateur)||(d.substring(5,6)!=separateur)) && (ok==1) ) {
                                    underline(d, true);
                                    return false; ok=0;
                                }
                                if (ok==1) {
                                    var d2=new Date(a,m-1,j);
                                    j2=d2.getDate();
                                    m2=d2.getMonth()+1;
                                    a2=d2.getFullYear();
                                    if (a2<=100) {a2=1900+a2}
                                    if ( (j!=j2)||(m!=m2)||(a!=a2) ) {
                                        underline(d, true);
                                        return false;
                                        ok=0;
                                    }
                                }
                                underline(d, false);
                                return true;


                                /*var now = new Date(), // date du jour
                                        amax = now.getFullYear(), // récupération de l'année actuelle qui correspond à la date max qui peut être rentrée
                                        amin = amax - 15, // année min qui peut être rentrée (année actuelle moins 15 ans)
                                        mois = now.getMonth(),
                                        jour = now.getDate(),
                                        separateur = "/", // separateur entre jour/mois/annee
                                        j = (d.substring(0, 2)), // récupère le jour de la date entrée
                                        m = (d.substring(3, 5)), // récupère le mois de la date entrée
                                        a = (d.substring(6)), // récupère l'année de la date entrée
                                        date = new Date(j,m,a);

                                if (date>now+15){
                                    underline(d, true);
                                    return false;
                                }

                                /*
                                if (a==amax){
                                    if (m>mois){
                                        underline(d, true);
                                        return false;
                                    }
                                    else if (j>jour){
                                        underline(d, true);
                                        return false;
                                    }
                                }

                                // si le jour n'est pas un nombre, est inférieur à 1 ou supérieur à 31
                                else if ( (isNaN(j) || (j < 1) || (j > 31)) ||
                                        ((isNaN(m)) || (m < 1) || (m > 12)) ||
                                        ((isNaN(a)) || (a > amin)) ||
                                        ((d.substring(2, 3) != separateur) || (d.substring(5, 6) != separateur))

                                ) {
                                    underline(d, true);
                                    return false;
                                }
                                else {
                                    underline(d, false);
                                    return true;
                                }*/
                            }

                            // Fonction qui vérifie que le numéro de téléphone est bien un nombre
                            function checkphonenumber(phonenumber){
                                if (isNaN(phonenumber)){
                                    underline(phonenumber,false);
                                    return true;
                                }
                                else{
                                    var msg = document.createTextNode("Format du numéro de téléphone invalide");
                                    document.getElementById("phoneerror").appendChild(msg);
                                    underline(phonenumber,true);
                                    return false;
                                }
                            }

                            function checkform(f)
                            {
                                var pseudoOk = checkpseudo(f.pseudo),
                                        mailOk = checkmail(f.mail),
                                        ageOk = checkDate(f.date_naissance),
                                        nomOk = checkname(f.nom),
                                        prenomOk = checkfirstname(f.prenom),
                                        mdp1Ok = checkpw(f.mdp1),
                                        mdp2Ok = checkMdp(f.mdp2),
                                        numeroOk = checkphonenumber(f.phone);


                                if(pseudoOk && mailOk && ageOk && nomOk && prenomOk && mdp1Ok && mdp2Ok && numeroOk){
                                    alert("Veuillez remplir correctement tous les champs");
                                    return true;
                                } else {
                                    alert("Veuillez remplir correctement tous les champs");
                                    return false;
                                }
                            }

                            // Fonction ajax qui permet d'afficher instantanément si le pseudo est déjà utilisé ou non
                            $(function(){

                                $('#pseudo').keyup(function(){ // à chaque fois qu'on "lache" le clavier

                                    pseudo=$('#pseudo').val(); // on récupère la valeur du pseudo
                                    $.ajax({
                                        url : 'inscrit.php', // La ressource ciblée
                                        type : 'POST', // Le type de la requête HTTP.
                                        data : 'pseudo=' + pseudo,
                                            success:function(data){ // dès qu'on est bien rentré dans le fichier php
                                                if(data==1){ // si le php retourne 1 le pseudo existe déjà
                                                    $('#pseudo').next('#error').fadeIn().text('Ce pseudo est déjà pris');
                                                    $('#error').next('#ok').fadeOut(); // pour eviter d'écrire deux textes à la suite
                                                } else if(data==0){
                                                    $('#error').next('#ok').fadeIn().text('Ok');
                                                    $('#pseudo').next('#error').fadeOut();
                                                }
                                            }
                                    });

                                })
                            })


                        </script>

                        <p><em>Merci de remplir ces champs pour continuer.</em></p>
                        <!-- <form action="inscrit.php" method="post" onsubmit="return checkform(this)" name="Inscription" id="form"> -->
                        <form action=".php" method="post" name="Inscription" id="form">
                             <label>Sexe</label>
                             <input name="sex" type="radio" value="H" />Homme
                             <input name="sex" type="radio" value="F" />Femme
                             <label class="small" id="sexerror"></label>
                             <br/><br/>
                             <label class="required" for="nom">Nom</label> <input class="input" type="text" name="nom" id="nom" onblur="checkname(this)"/><label class="small" id="nameerror"></label><br/>
                             <label class="required" for="prenom">Prénom</label> <input type="text" name="prenom" id="prenom" onblur="checkfirstname(this)"/><label class="small" id="firstnameerror"></label><br/>
                             <label class="required" for="pseudo">Pseudo</label> <input type="text" name="pseudo" id="pseudo" size="30" placeholder="compris entre 4 et 8 caractères""/>
                             <span id="error"></span><span id="ok"></span><br/>
                             <?php //<label class="small" id="pseudoerror"></label> <br/> ?>
                             <label class="required" for="mdp1">Mot de passe</label> <input type="password" name="mdp1" id="mdp1" size="30" placeholder="compris entre 4 et 12 caractères" onblur="checkpw(this)" /><label class="small" id="pwerror"></label> <br/>
                             <label class="required" for="mdp2">Confirmation de mot de passe</label> <input type="password" name="mdp2" id="mdp2" size="30" onblur="checkMdp(this)"/><label class="small" id="mdperror"></label><br/>
                             <label class="required" for="mail">Mail</label> <input type="text" name="mail" id="mail" size="30" placeholder="mr.dupont@gmail.com" onblur="checkmail(this)"/> <label class="small" id="mailerror"></label><br />
                             <label class="required" for="date_naissance">Date de nasissance</label><input type="date" name="date_naissance" id="date_naissance" size="30" onblur="checkDate(this)"/><br/><br/>
                             <label for="phone" class="float">Numéro de téléphone</label> <input type="text" name="phone" id="phone" size="30" placeholder="+33 7 56 92 XX XX" onblur="checkphonenumber(this)"/> <label class="small" id="phoneerror"></label><br />
                         <br/>
                             <div class="center"><input type="submit" value="Inscription"><br/><br/><input type="reset" value="Réinitialisation"></div>
                     </form>
                 </div>
                 <br/>
                 <br/>


                 <span class="image featured"><img src="images/banner.jpg" alt="" /></span>

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
                     Vestibulum purus augue, tincidunt sit amet iaculis id, porta eu purus.</p>

             </article>
         </div>
     </div>
 </section>

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




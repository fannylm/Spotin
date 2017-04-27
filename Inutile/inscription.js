// Dernière version js avec formulaire html

/*echo <form action="inscription.php" method="POST" name="Inscription" id="form">
    <label>Sexe</label>
    <input name="sex" type="radio" value="H" />Homme
    <input name="sex" type="radio" value="F" />Femme
    <label class="small" id="sexerror"></label>
    <br/><br/>
    <label class="required" for="nom">Nom</label> <input class="input" type="text" name="nom" id="nom" onblur="checkname(this)"/>
    <span id="nom-correct"></span><span id="nom-incorrect"></span>
    <label class="required" for="prenom">Prénom</label> <input type="text" name="prenom" id="prenom" onblur="checkfirstname(this)"/>
    <span id="prenom-correct"></span><span id="prenom-incorrect"></span>
    <label class="required" for="pseudo">Pseudo</label> <input type="text" name="pseudo" id="pseudo" size="30" placeholder="compris entre 4 et 8 caractères""/>
                             <span id="error"></span><span id="ok"></span><br/>
                             <label class="required" for="mdp1">Mot de passe</label> <input type="password" name="mdp1" id="mdp1" size="30" placeholder="compris entre 4 et 12 caractères" onblur="checkpw(this)" />
    <span id="mdp1-correct"></span><span id="mdp1-incorrect"></span>
    <label class="required" for="mdp2">Confirmation de mot de passe</label> <input type="password" name="mdp2" id="mdp2" size="30" onblur="checkMdp(this)"/>
    <span id="mdp2-correct"></span><span id="mdp2-incorrect"></span>
    <label class="required" for="mail">Mail</label> <input type="mail" name="mail" id="mail" size="30" placeholder="mr.dupont@gmail.com" onblur="checkmail(this)"/>
    <span id="mail-correct"></span><span id="mail-incorrect"></span>
    <label class="required" for="birthday">Date de naissance</label><input type="date" name="birthday" id="birthday" size="30" placeholder="JJ/MM/AAAA" />
    <span id="date-correct"></span><span id="date-incorrect"></span>
    <label for="phone" class="float">Numéro de téléphone</label> <input type="tel" name="phone" id="phone" size="30" placeholder="+33 7 56 92 XX XX" />
    <span id="phone-correct"></span><span id="phone-incorrect"></span>
    <br/>
    <div class="center"><input id="inscript" type="submit" class="button alt" value="Inscription"><br/><br/>
    </form>

*/


// Fonction qui permet de changer la couleur de l'arrière plan pour faire ressortir les erreurs
function underline(champ, erreur)
{
    if(erreur)
    //champ.style.backgroundColor = "#FDE3E3";
        champ.css( 'background-color', '#FDE3E3' );
    else
    //champ.style.backgroundColor = "none";
        champ.css( 'background-color', 'transparent' );
}

/*// Fonction qui vérifie que un genre a été sélectionné
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
 }*/

// Fonction qui vérifie que le nom n'est pas un nombre est que sa taille est supérieure ou égale à 2
function checkname(name){
    if (isNaN(name) && name.value.length>=2){
        $('#nom').next('#nom-correct').fadeIn().text('');
        $('#nom-correct').next('#nom-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
        underline(name,false);
        return true;
    }
    else{
        $('#nom-correct').next('#nom-incorrect').fadeIn().text('Format du nom incorrect. Il doit comporter plus de 2 caractères');
        $('#nom').next('#nom-correct').fadeOut();
        underline(name,true);
        return false;
    }
}

// Fonction qui vérifie que le prénom n'est pas un nombre est que sa taille est supérieure ou égale à 2
function checkfirstname(firstname){
    if (isNaN(firstname) && firstname.value.length>=2){
        $('#prenom').next('#prenom-correct').fadeIn().text('');
        $('#prenom-correct').next('#prenom-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
        underline(firstname,false);
        return true;
    }
    else{
        $('#prenom-correct').next('#prenom-incorrect').fadeIn().text('Format du prenom incorrect. Il doit comporter plus de 2 caractères');
        $('#prenom').next('#prenom-correct').fadeOut();
        underline(firstname,true);
        return false;
    }
}

// Fonction qui vérifie que la taille du pseudo est supérieure ou égale à 4 et inférieure à 8
/*function checkpseudo(pseudo){
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
 }*/

// Fonction ajax qui permet d'afficher instantanément si le pseudo est déjà utilisé ou non
/*$(function(){

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

 });*/

// Fonction qui vérifie que la taille du mot de passe est supérieure ou égale à 4 et inférieure à 12
// Au moins 8 caractères, une majuscule, une minuscule et 1 chiffre
function checkpw(password){
    /*var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

     if (!regex.test(password.value)){
     $('#mdp1-correct').next('#mdp1-incorrect').fadeIn().text('Format du mot de passe incorrect. Il doit contenir au moins 8 caractères, une majuscule, une minuscule et 1 chiffre ');
     $('#mdp1').next('#mdp1-correct').fadeOut();
     underline(password,true);
     return false;
     } else {
     $('#mdp1').next('#mdp1-correct').fadeIn().text('');
     $('#mdp1-correct').next('#mdp1-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
     underline(password,false);
     return true;
     }*/

    if (password.value.length>=4 && password.value.length<=12){
        $('#mdp1').next('#mdp1-correct').fadeIn().text('');
        $('#mdp1-correct').next('#mdp1-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
        underline(password,false);
        return true;
    }
    else{
        $('#mdp1-correct').next('#mdp1-incorrect').fadeIn().text('Format du mot de passe incorrect. Il doit être compris entre 4 et 12 caractères');
        $('#mdp1').next('#mdp1-correct').fadeOut();
        underline(password,true);
        return false;
    }
}

// Fonction qui vérifie que les deux mots de passe entrés sont les mêmes
function checkMdp(pw2) {
    var mdp = document.getElementById("mdp1").value;
    var mdp2 = document.getElementById("mdp2").value;
    if(mdp.equals(mdp2)){
        $('#mdp2-correct').next('#mdp2-incorrect').fadeIn().text('Confirmation du mot de passe invalide');
        $('#mdp2').next('#mdp2-correct').fadeOut();
        underline(pw2, true);
        return false;
    }
    else{
        $('#mdp2').next('#mdp2-correct').fadeIn().text('');
        $('#mdp2-correct').next('#mdp2-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
        underline(pw2,false);
        return true;
    }
}

// Fonction qui vérifie que le format du mail est bien valide
function checkmail(mail) {
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (!regex.test(mail.value)) {
        $('#mail-correct').next('#mail-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
        $('#mail').next('#mail-correct').fadeOut();
        underline(mail, true);
        return false;
    }
    else {
        $('#mail').next('#mail-correct').fadeIn().text('');
        $('#mail-correct').next('#mail-incorrect').fadeOut();
        underline(mail, false);
        return true;
    }
}


/*function CheckDate(d) {
 // Cette fonction vérifie le format JJ/MM/AAAA saisi et la validité de la date.
 // Le séparateur est défini dans la variable separateur
 var amin=1999; // année mini
 var amax=2005; // année maxi
 var separateur="/"; // separateur entre jour/mois/annee
 var j=(d.substring(0,2));
 var m=(d.substring(3,5));
 var a=(d.substring(6));
 var ok=1;
 if ( ((isNaN(j))||(j<1)||(j>31)) && (ok==1) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 if ( ((isNaN(m))||(m<1)||(m>12)) && (ok==1) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 if ( ((isNaN(a))||(a<amin)||(a>amax)) && (ok==1) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 if ( ((d.substring(2,3)!=separateur)||(d.substring(5,6)!=separateur)) && (ok==1) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 if (ok==1) {
 var d2=new Date(a,m-1,j);
 j2=d2.getDate();
 m2=d2.getMonth()+1;
 a2=d2.getFullYear();
 if (a2<=100) {a2=1900+a2}
 if ( (j!=j2)||(m!=m2)||(a!=a2) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 }
 return ok;
 }

 // Fonction qui vérifie que la date entrée est correcte
 /*function checkDate(d) {
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
//}

// Fonction qui vérifie que le numéro de téléphone est bien un nombre
/*function checkphonenumber(phonenumber){
 var reg = /^(\d\d\.){4}\d\d$/;
 if(reg.test(phonenumber)) {
 $('#phone').next('#phone-correct').fadeIn().text('');
 $('#phone-correct').next('#phone-incorrect').fadeOut();
 underline(phonenumber,false);
 return true;
 } else {
 $('#phone-correct').next('#phone-incorrect').fadeIn().text('Format du numéro de téléphone incorrect');
 $('#phone').next('#phone-correct').fadeOut();
 underline(phonenumber,true);
 return false;
 }

 }

 function isTelephonePortable(numero){
 console.log('numéro : '+numero);
 var reg_telephone_portable = '(0|\\+33|0033)[1-9][0-9]{8}';

 if( reg_telephone_portable.test(numero) ){
 $('#phone').next('#phone-correct').fadeIn().text('');
 $('#phone-correct').next('#phone-incorrect').fadeOut();
 underline(numero,false);
 return true;
 } else {
 $('#phone-correct').next('#phone-incorrect').fadeIn().text('Format du numéro de téléphone incorrect');
 $('#phone').next('#phone-correct').fadeOut();
 underline(numero,true);
 return false;
 }
 }

 if( isTelephonePortable($('#phone').val()) ){
 console.log('Portable');
 } else {
 console.log('PAS Portable');
 }*/

/*function checkform(f) {
 var pseudoOk = checkpseudo(f.pseudo),
 mailOk = checkmail(f.mail),
 //ageOk = checkDate(f.date-naissance),
 nomOk = checkname(f.nom),
 prenomOk = checkfirstname(f.prenom),
 mdp1Ok = checkpw(f.mdp1),
 mdp2Ok = checkMdp(f.mdp2);
 //numeroOk = checkphonenumber(f.phone);


 //if(pseudoOk && mailOk && ageOk && nomOk && prenomOk && mdp1Ok && mdp2Ok&& numeroOk){
 if(pseudoOk && mailOk && nomOk && prenomOk && mdp1Ok && mdp2Ok){

 return true;
 } else {
 alert("Veuillez remplir correctement tous les champs");
 return false;
 }
 }*/



// ----------------------





alert('Hello world');

// Fonction qui permet de changer la couleur de l'arrière plan pour faire ressortir les erreurs
function underline(champ, erreur)
{
    if(erreur)
        champ.style.backgroundColor = "#FDE3E3";
    else
        champ.style.backgroundColor = "";
}

/*// Fonction qui vérifie que un genre a été sélectionné
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
 }*/

// Fonction qui vérifie que le nom n'est pas un nombre est que sa taille est supérieure ou égale à 2
function checkname(name){
    if (isNaN(name) && name.value.length>=2){
        $('#nom').next('#nom-correct').fadeIn().text('');
        $('#nom-correct').next('#nom-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
        underline(name,false);
        return true;
    }
    else{
        $('#nom-correct').next('#nom-incorrect').fadeIn().text('Format du nom incorrect. Il doit comporter plus de 2 caractères');
        $('#nom').next('#nom-correct').fadeOut();
        underline(name,true);
        return false;
    }
}

// Fonction qui vérifie que le prénom n'est pas un nombre est que sa taille est supérieure ou égale à 2
function checkfirstname(firstname){
    if (isNaN(firstname) && firstname.value.length>=2){
        $('#prenom').next('#prenom-correct').fadeIn().text('');
        $('#prenom-correct').next('#prenom-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
        underline(firstname,false);
        return true;
    }
    else{
        $('#prenom-correct').next('#prenom-incorrect').fadeIn().text('Format du prenom incorrect. Il doit comporter plus de 2 caractères');
        $('#prenom').next('#prenom-correct').fadeOut();
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
        $('#mdp1').next('#mdp1-correct').fadeIn().text('');
        $('#mdp1-correct').next('#mdp1-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
        underline(password,false);
        return true;
    }
    else{
        $('#mdp1-correct').next('#mdp1-incorrect').fadeIn().text('Format du mot de passe incorrect. Il doit être compris entre 4 et 12 caractères');
        $('#mdp1').next('#mdp1-correct').fadeOut();
        underline(password,true);
        return false;
    }
}

// Fonction qui vérifie que les deux mots de passe entrés sont les mêmes
function checkMdp(pw2) {
    var mdp = document.getElementById("mdp1").value;
    var mdp2 = document.getElementById("mdp2").value;
    if (mdp!=mdp2) {
        $('#mdp2-correct').next('#mdp2-incorrect').fadeIn().text('Confirmation du mot de passe invalide');
        $('#mdp2').next('#mdp2-correct').fadeOut();
        underline(pw2, true);
        return false;
    }
    else{
        $('#mdp2').next('#mdp2-correct').fadeIn().text('');
        $('#mdp2-correct').next('#mdp2-incorrect').fadeOut(); // pour eviter d'écrire deux textes à la suite
        underline(pw2,false);
        return true;
    }
}

// Fonction qui vérifie que le format du mail est bien valide
function checkmail(mail) {
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (!regex.test(mail.value)) {
        $('#mail-correct').next('#mail-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
        $('#mail').next('#mail-correct').fadeOut();
        underline(mail, true);
        return false;
    }
    else {
        $('#mail').next('#mail-correct').fadeIn().text('');
        $('#mail-correct').next('#mail-incorrect').fadeOut();
        underline(mail, false);
        return true;
    }


/*function CheckDate(d) {
 // Cette fonction vérifie le format JJ/MM/AAAA saisi et la validité de la date.
 // Le séparateur est défini dans la variable separateur
 var amin=1999; // année mini
 var amax=2005; // année maxi
 var separateur="/"; // separateur entre jour/mois/annee
 var j=(d.substring(0,2));
 var m=(d.substring(3,5));
 var a=(d.substring(6));
 var ok=1;
 if ( ((isNaN(j))||(j<1)||(j>31)) && (ok==1) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 if ( ((isNaN(m))||(m<1)||(m>12)) && (ok==1) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 if ( ((isNaN(a))||(a<amin)||(a>amax)) && (ok==1) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 if ( ((d.substring(2,3)!=separateur)||(d.substring(5,6)!=separateur)) && (ok==1) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 if (ok==1) {
 var d2=new Date(a,m-1,j);
 j2=d2.getDate();
 m2=d2.getMonth()+1;
 a2=d2.getFullYear();
 if (a2<=100) {a2=1900+a2}
 if ( (j!=j2)||(m!=m2)||(a!=a2) ) {
 $('#date-correct').next('#date-incorrect').fadeIn().text('Format de l\'adresse mail invalide');
 $('#date-naissance').next('#date-correct').fadeOut();
 underline(d,true);
 ok=0;
 return false;
 }
 }
 return ok;
 }*/

// Fonction qui vérifie que la date entrée est correcte
/*function checkDate(d) {
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
//}

// Fonction qui vérifie que le numéro de téléphone est bien un nombre
/*function checkphonenumber(phonenumber){
 var regex = new RegExp(/^(01|02|03|04|05|06|08)[0-9]{8}/gi);
 if(regex.test(phonenumber)){
 $('#phone').next('#phone-correct').fadeIn().text('');
 $('#phone-correct').next('#phone-incorrect').fadeOut();
 underline(phonenumber,false);
 return true;
 }
 else{
 $('#phone-correct').next('#phone-incorrect').fadeIn().text('Format du numéro de téléphone incorrect');
 $('#phone').next('#phone-correct').fadeOut();
 underline(phonenumber,true);
 return false;
 }
 /*if (isNaN(phonenumber)){
 $('#phone-correct').next('#phone-incorrect').fadeIn().text('Format du numéro de téléphone incorrect');
 $('#phone').next('#phone-correct').fadeOut();
 underline(phonenumber,true);
 return false;
 } else {
 $('#phone').next('#phone-correct').fadeIn().text('');
 $('#phone-correct').next('#phone-incorrect').fadeOut();
 underline(phonenumber,false);
 return true;
 }*/
}

/*function checkform(f)
 {
 var pseudoOk = checkpseudo(f.pseudo),
 mailOk = checkmail(f.mail),
 //ageOk = checkDate(f.date-naissance),
 nomOk = checkname(f.nom),
 prenomOk = checkfirstname(f.prenom),
 mdp1Ok = checkpw(f.mdp1),
 mdp2Ok = checkMdp(f.mdp2),
 //numeroOk = checkphonenumber(f.phone);


 //if(pseudoOk && mailOk && ageOk && nomOk && prenomOk && mdp1Ok && mdp2Ok&& numeroOk){
 if(pseudoOk && mailOk && nomOk && prenomOk && mdp1Ok && mdp2Ok){
 alert("Veuillez remplir correctement tous les champs");
 return true;
 } else {
 alert("Veuillez remplir correctement tous les champs");
 return false;
 }
 }*/

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
                } else if(data==0){
                    $('#error').next('#ok').fadeIn().text('Ok');
                    $('#pseudo').next('#error').fadeOut();
                }
            }
        });

    });

})







// -----------------------------------------


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
    underline(name,false);
    return true;
    }
    else{
    var msg = document.createTextNode("Format du nom incorrect. Il doit comporter plus de 2 caractères");
    document.getElementById("nameerror").appendChild(msg);
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
            url : 'inscription.php', // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP.
            data : 'pseudo=' + pseudo,
            success:function(data){ // dès qu'on est bien rentré dans le fichier php
                if(data==1){ // si le php retourne 1 le pseudo existe déjà
                    $('#pseudo').next('#error').fadeIn().text('Ce pseudo est déjà pris');
                    $('#error').next('#ok').fadeOut(); // pour eviter d'écrire deux textes à la suite
                } else {
                    $('#error').next('#ok').fadeIn.text('Ok');
                    $('#pseudo').next('#error').fadeOut();
                }
            }
        });

    })
    })

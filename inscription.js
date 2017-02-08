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

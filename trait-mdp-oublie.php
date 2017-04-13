<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');
/*
$mail = $_POST['mail'];
$message = 'Bonjour, Voici le lien pour réinitialiser votre mot de passe : ';

mail($mail, 'Spotin - Mot de passe oublié', $message);

$sujet = 'Spotin - Mot de passe oublié';
$message = 'Bonjour, Voici le lien pour réinitialiser votre mot de passe : ';
$destinataire = $_POST['mail'];
$headers = "From: \"expediteur moi\"<reponse@domaine.net>\n";
$headers .= "Reply-To: reponse@gmail.com\n";
$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
if(mail($destinataire,$sujet,$message,$headers)){
    echo 'success';
}
else
    echo 'failed';*/


$to      = 'fanny.le-morvan@hotmail.fr';
$subject = 'le sujet';
$message = 'Bonjour !';

mail($to, $subject, $message);
?>
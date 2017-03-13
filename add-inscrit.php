<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$sexe = $_POST['sexe'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$mdp1 = $_POST['mdp1'];
$password = hash('sha256', $mdp1);
$mail = $_POST['mail'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];

$cleSecrete = "MaCleEstIncassable";

$mdpCrypt = encrypt($mdp1, $cleSecrete);


function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}


$bdd->exec("INSERT INTO Client (sexe,nom,prenom,pseudo,mdp,mail,birthday,telephone) VALUES ('$sexe','$nom','$prenom','$pseudo','$mdpCrypt','$mail','$birthday','$phone')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
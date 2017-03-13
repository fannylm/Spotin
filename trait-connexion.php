<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$req=$bdd -> query("SELECT * FROM Client");
$res=$req -> fetch();
$username = $res['pseudo'];
$password = $res['mdp'];
$cleSecrete = "MaCleEstIncassable";

function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}

$mdpDecrypte = decrypt($password,$cleSecrete);




if( isset($_POST['pseudo']) && isset($_POST['password']) ) {

    if ($_POST['pseudo'] == $username && $_POST['password'] == $password) { // Si les valeurs correspondent
        $_SESSION['user'] = $username;
        $_SESSION['prenom'] = $res['prenom'];
        $_SESSION['nom'] = $res['nom'];
        $_SESSION['mail'] = $res['mail'];
        $_SESSION['id'] = $res['id'];
        $_SESSION['tel'] = $res['telephone'];
        $_SESSION['birthday'] = $res['birthday'];
        session_start(); // démarrage de la session
        echo 'success';
    } else {
        echo 'failed';
    }
}

?>
<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

if(empty($_SESSION['user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
} else {
    $name = $_SESSION['nom'];
    $email = $_SESSION['mail'];
}
$message = $_POST['message'];

$bdd->exec("INSERT INTO Contact (nom,mail,message) VALUES ('$name','$email','$message')");

if($bdd) {
    echo 'success';
}
else{
    echo 'failed';
}

?>
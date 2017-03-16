<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_SESSION['id'];
$pseudo = $_POST['pseudo'];

$bdd->exec("UPDATE Client SET pseudo = '$pseudo' WHERE id = '$id'");

if($bdd) {
    $_SESSION['user']=$pseudo;
    echo 'Chargement...';
    //echo 'success';
}
else{
    echo 'Erreur lors de la modification du champ...';
    //echo 'failed';
}

?>


<script>
    function redirection(){
        self.location.href="compte.php"
    }
    setTimeout(redirection,100);
</script>


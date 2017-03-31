<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$bdd->exec("UPDATE Contact SET statut = 'Traité' WHERE statut = 'A traiter'");

if($bdd) {
    echo 'Chargement...';
}
else{
    echo 'Erreur lors du traitement de la demande..';
}

?>

<script>
    function redirection(){
        self.location.href="notifications.php"
    }
    setTimeout(redirection,100);
</script>
<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_GET['id_notif'];

$bdd->exec("UPDATE ContactBis SET statut = 'Traité' WHERE idContact='$id' ");

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
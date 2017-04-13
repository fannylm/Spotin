<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');


$description = $_POST['description'];

$new_description = str_replace("'", "''", "$description");

$bdd->exec("UPDATE Propos SET description = '$new_description' WHERE id = '1'");

if($bdd) {
    echo 'Chargement...';
}
else{
    echo 'Erreur lors de la modification du champ...';
}

?>


<script>
    function redirection(){
        self.location.href="a-propos.php"
    }
    setTimeout(redirection,100);
</script>


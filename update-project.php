<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_POST['idProjet'];
$titre = $_POST['titre'];
$description = $_POST['description'];
$date = $_POST['date'];

$bdd->exec("UPDATE Projet SET titre = '$titre', description = '$description', anneeRealisation = '$date' WHERE id = '$id'");

if($bdd) { ?>
    <script>
    function redirection(){
        self.location.href="projet.php?id_projet=<?php echo $id ?>"
    }
    setTimeout(redirection,1);
    </script>
<?php } else { echo 'failed'; }?>
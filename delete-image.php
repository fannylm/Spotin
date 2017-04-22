<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id_image = $_GET['id_image'];

$req1 = $bdd -> query("SELECT * FROM PhotosVoyage, Voyage WHERE PhotosVoyage.id = '$id_image' AND PhotosVoyage.destination=Voyage.id ");
$res = $req1 -> fetch();

$req = $bdd->exec("DELETE FROM PhotosVoyage WHERE id = '$id_image'");

if($req) {
    ?>
    <script>
        function redirection(){
            self.location.href="voyage.php?destination=<?php echo $res['lieu'] ?>"
        }
        setTimeout(redirection,1);
    </script>
    <?php
}
else{
    echo "Erreur lors de la suppression de l'image...";
    ?>
    <script>
        function redirection(){
            self.location.href="voyage.php?destination=<?php echo $res['lieu'] ?>"
        }
        setTimeout(redirection,1);
    </script>
<?php
}
?>

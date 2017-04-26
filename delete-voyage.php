<?php session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$destination = $_GET['destination'];
$req = $bdd->query("SELECT * FROM Voyage WHERE Voyage.lieu='$destination'");
$res = $req -> fetch();
$id_destination = $res['id'];
$image = $res['image'];

$req = $bdd->query("SELECT * FROM PhotosVoyage WHERE PhotosVoyage.destination = '$id_destination'");


    while ($res=$req->fetch()){
        unlink($res['lien']);
    }


$req3 = $bdd->query("SELECT * FROM Voyage WHERE Voyage.lieu = '$destination'");
$res3 = $req3->fetch();
unlink($res3['image']);

$req1 = $bdd->exec("DELETE FROM PhotosVoyage WHERE PhotosVoyage.destination = '$id_destination'");
$req2 = $bdd->exec("DELETE FROM Voyage WHERE Voyage.lieu = '$destination'");

$dossier='images/Voyages/'.$destination.'/';
rmdir($dossier);

if($req2) {
    ?>
    <script>
        function redirection(){
            self.location.href="voyages.php"
        }
        setTimeout(redirection,1);
    </script>
<?php
}
else{
    echo 'Erreur lors de la suppression de ce voyage..';
    ?>
    <script>
        function redirection(){
            self.location.href="voyages.php"
        }
        setTimeout(redirection,1);
    </script>
    <?php
}

?>
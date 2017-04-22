<?php session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$destination = $_GET['destination'];
echo $destination;
$req = $bdd->query("SELECT * FROM Voyage WHERE Voyage.lieu='$destination'");
$res = $req -> fetch();
$id_destination = $res['id'];

echo $id_destination;

$req2 = $bdd->exec("DELETE FROM Voyage WHERE Voyage.lieu = '$destination'");
$req1 = $bdd->exec("DELETE FROM PhotosVoyage WHERE PhotosVoyage.destination = '$id_destination'");

if($req2) {
    if($req1){
    ?>
    <script>
        function redirection(){
            self.location.href="voyages.php"
        }
        setTimeout(redirection,1);
    </script>
<?php
    }
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
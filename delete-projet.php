<?php session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id_projet = $_GET['id_projet'];

$req1 = $bdd -> query("SELECT * FROM Projet WHERE id = '$id_projet'");
$res1 = $req1 -> fetch();

$image = $res1['image'];

$req2 = $bdd->exec("DELETE FROM Projet WHERE id = '$id_projet'");
$req3 = $bdd->exec("DELETE FROM Commentaires WHERE id = '$id_projet'");

if($req2) {
    unlink($image);
    ?>
    <script>
        function redirection(){
            self.location.href="projets.php"
        }
        setTimeout(redirection,1);
    </script>
<?php
}
else{
    echo 'failed';
}

?>
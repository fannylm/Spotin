<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$id = $_GET['id_presta'];

$bdd->exec("DELETE FROM Prestation WHERE id = '$id'");

if($bdd) {
    //echo 'success';?>
<script>
    function redirection(){
        self.location.href="prestations.php"
    }
    setTimeout(redirection,1000);
</script>
<?php
}
else{
    //echo 'failed';
    ?>
    <script>
        function redirection(){
            self.location.href="prestations.php"
        }
        setTimeout(redirection,1000);
    </script>
<?php
}

?>

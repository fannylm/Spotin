<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$titre = $_POST['titre'];
$description = $_POST['description'];
$date = $_POST['date'];

$_FILES['mon_fichier']['error'];

//$bdd->exec("INSERT INTO Projet (titre, description, image, anneeRealisation) VALUES ('$titre','$description','images/Projets/$titre.png','$date')");

// Test pour savoir si le fichier a bien été envoyé sans erreur
if(isset($_FILES['mon_fichier']) && $_FILES['mon_fichier']['error'] == 0) {
    // Test pour savoir si le fichier n'est pas trop gros
    if($_FILES['mon_fichier']['size'] <= 102400000000) {
        // Test pour savoir si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['mon_fichier']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('pdf', 'png', 'jpg');
        if(in_array($extension_upload, $extensions_autorisees))
        {
            $destination = 'images/Projets/'.basename($_FILES['mon_fichier']['name']);
            $resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $destination);
            if($resultat)
            {
                //echo "L'envoi a bien été effectué !";
                $bdd->exec("INSERT INTO Projet (titre, description, image, anneeRealisation) VALUES ('$titre','$description','$destination','$date')");
                if ($bdd){ ?>
                    <script>
                        function redirection(){
                            self.location.href="projets.php"
                        }
                        setTimeout(redirection,1);
                    </script>
                <?php } else {
                    echo 'failed';
                    ?>
                    <script>
                        function redirection(){
                            self.location.href="projets.php"
                        }
                        setTimeout(redirection,1);
                    </script>
                <?php }
            }
            //else echo "Une erreur est survenue lors du transfert du fichier !";
        }
        //else echo "L'extension n'est pas autorisee !";
    }
    //else echo "Le fichier est trop gros !";
}
//else echo "Une erreur est survenue lors de l'envoi !";


?>



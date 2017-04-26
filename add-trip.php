<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$destination = $_POST['destination'];

// Test pour savoir si le fichier a bien été envoyé sans erreur
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // Test pour savoir si le fichier n'est pas trop gros
    if($_FILES['image']['size'] <= 102400000000) {
        // Test pour savoir si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['image']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('pdf', 'png', 'jpg');
        if(in_array($extension_upload, $extensions_autorisees))
        {
            $dossier='images/Voyages/'.$destination;
            mkdir($dossier, 0700);
            $chemin = $dossier.'/'.basename($_FILES['image']['name']);
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
            if($resultat)
            {
                //echo "L'envoi a bien été effectué !";
                $req1 = $bdd->exec("INSERT INTO Voyage (lieu,image) VALUES ('$destination','$chemin')");
                if ($bdd){ ?>
                    <script>
                        function redirection(){
                            self.location.href="voyage.php?destination=<?php echo $destination ?>"
                        }
                        setTimeout(redirection,1);
                    </script>
                <?php } else {
                    echo 'failed';
                    ?>
                    <script>
                        function redirection(){
                            self.location.href="voyage.php?destination=<?php echo $destination ?>"
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

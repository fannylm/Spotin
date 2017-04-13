<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=Spotin;charset=utf8', 'root', 'root');

$titre = $_POST['titre'];
$description = $_POST['description'];
$date = $_POST['date'];

echo $titre; echo $description; echo $date;

echo $_FILES['mon_fichier']['error'];



// Test pour savoir si le fichier a bien été envoyé sans erreur
//if(isset($_FILES['mon_fichier']) && $_FILES['mon_fichier']['error'] == 0)
if(isset($_FILES['mon_fichier']))
{
    // Test pour savoir si le fichier n'est pas trop gros
    if($_FILES['mon_fichier']['size'] <= 1024000000)
    {
        // Test pour savoir si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['mon_fichier']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('pdf', 'png', 'jpg');
        if(in_array($extension_upload, $extensions_autorisees))
        {
            // On valide le transfert du fichier
            //$dossier = $_SERVER['DOCUMENT_ROOT'].'Applications/MAMP/htdocs/Spotin/images/Projets/';
            //chmod($dossier,0777);
            //$fichier = basename($_FILES['mon_fichier']['name']);
            //$destination = $dossier/$fichier;
            //$destination = 'Applications/MAMP/htdocs/Spotin/images/Projets/'.basename($_FILES['mon_fichier']['name']);
            $destination = 'images/Projets/'.basename($_FILES['mon_fichier']['name']);
            $resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $destination);
            if($resultat)
            {
                $requete= "INSERT INTO Projet (titre, description, image, anneeRealisation) VALUES ('$titre','$description','images/Projets/$titre.png','$date')";
                echo "L'envoi a bien été effectué !";
                /*if($bdd)
                {*/
                    //$requete->exec("INSERT INTO Projet (titre, description, image, anneeRealisation) VALUES ('$titre','$description','images/Projets/$titre.png','$date')");
                    //$requete= "INSERT INTO Projet (titre, description, image, anneeRealisation) VALUES ('$titre','$description','images/Projets/$titre.png','$date')";
                    if ($requete)
                    {
                        echo 'success';
                    } else {
                        echo 'failed';
                    }
                /*}*/
            }
            else echo "Une erreur est survenue lors du transfert du fichier !";
        }
        else echo "L'extension n'est pas autorisee !";
    }
    else echo "Le fichier est trop gros !";
}
else echo "Une erreur est survenue lors de l'envoi !";


?>

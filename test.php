<?php
/**
 * Created by PhpStorm.
 * User: fannylemorvan
 * Date: 06/02/17
 * Time: 22:59
 */

?>

<head><script src="assets/js/jquery-2.1.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script></head>

<script>

    // Fonction ajax qui permet d'afficher instantanément si le pseudo est déjà utilisé ou non
    $(function(){

        $('#pseudo').keyup(function(){ // à chaque fois qu'on "lache" le clavier

            pseudo=$('#pseudo').val(); // on récupère la valeur du pseudo
            $.ajax({
                url : 'inscription.php', // La ressource ciblée
                type : 'POST' // Le type de la requête HTTP.
                data : 'pseudo=' + pseudo,
                success:function(data){ // dès qu'on est bien rentré dans le fichier php
                    if(data==1){ // si le php retourne 1 le pseudo existe déjà
                        $('#pseudo').next('#error').fadeIn().text('Ce pseudo est déjà pris');
                        $('#error').next('#ok').fadeOut(); // pour eviter d'écrire deux textes à la suite
                    } else {
                        $('#error').next('#ok').fadeIn.text('Ok');
                        $('#pseudo').next('#error').fadeOut();
                    }
                }
            };

        })
    })

</script>

<form action="testdatabase.php" method="post" name="Inscription" id="form">
    <label class="required" for="pseudo">Pseudo</label> <input type="text" name="pseudo" id="pseudo" size="30" placeholder="compris entre 4 et 8 caractères" onblur="checkpseudo(this)"/>
    <br/><span id="error"></span><span id="ok"></span><br/>
    <div class="center"><input type="submit" value="Inscription"></div>
</form>


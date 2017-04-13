<?php ?>

<form method="POST" id="projet" action="reception.php" enctype="multipart/form-data">
                <label for="titre">Quel est le titre de ce projet ?</label>
                <input id="titre" name="titre" type="text">
                <br/>
                <label for="description">Ajoutez une description</label>
                <textarea name="description" id="description" ></textarea>
                <br/>q
    <input type="hidden" name="MAX_FILE_SIZE" value="1024000000"/>
                <label tabindex="0" for="mon_fichier">Ajoutez une image pour illustrer le projet (PDF, PNG, JPG uniquement | max. 10 Mo) :</label>
                <input type="file" style="width:75%;" name="mon_fichier" id="mon_fichier"/>
                <br/><br/>
    <label for="date">Quelle est l'année de réalisation de ce projet ?</label>
    <select id=date name="date" size="1">
        <option value="2012">2012
        <option value="2013">2013
        <option value="2014">2014
        <option value="2015">2015
        <option value="2016">2016
        <option value="2017">2017
    </select><br/><br/>
                <input id="submit" type="submit" class="button alt" value="Envoyer" />
</form>


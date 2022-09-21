<?php require_once("inc/init.inc.php"); ?>
<?php require_once("inc/haut.inc.php"); ?>

<form method="post" action="">
    
    <label for="last_name">Nom</label><br>
    <div class="input-field">
    <input type="text" id="nom" name="nom" placeholder="votre nom de famille" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>
    </div>

    <label for="prenom">Prénom</label><br>
    <div class="input-field">
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom"><br><br>
    </div>

    <label for="birth date">Date de naissance</label><br>
    <div class="input-field">
    <input type="birth date" id="birth date" name="birth date" placeholder="votre date de naissance"><br><br>
    </div>

    <label for="numCB">Numéro de CB</label><br>
    <div class="input-field">
    <input type="int" id="numCB" name="numCB" placeholder="votre numéro de carte bancaire"><br><br>
    </div>

    <label for="ville">Ville</label><br>
    <div class="input-field">
    <input type="text" id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>
    </div>

    <input class="btn" type="submit" name="adduser" value="Ajouter utilisateur">
</form>
 
<?php require_once("inc/bas.inc.php"); ?>
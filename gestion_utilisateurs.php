<?php require_once("inc/init.inc.php"); ?>
<?php require_once("inc/haut.inc.php"); ?>

<?php
$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

    $nom = valid_donnees($_POST['nom']);
    $prenom = valid_donnees($_POST['prenom']);
    $birthdate = valid_donnees($_POST['birthdate']);
    $ville = valid_donnees($_POST['ville']);
    $numCB = valid_donnees($_POST['numCB']);
    $sql = "INSERT INTO `utilisateur` ( `Nom`, `Prénom`, `Date de naissance`, `Ville`, `Numéro de CB`) 
            VALUES (?,?,?,?,?)";
    $MySQL -> prepare($sql)->execute([$nom,$prenom,$birthdate,$ville,$numCB]);
    $message = "L'utilisateur ".$prenom." ".$nom." a bien été ajouter !";
}
?>


<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
    
    <label for="nom">Nom</label><br>
    <div class="input-field">
    <input type="text" id="nom" name="nom" placeholder="votre nom de famille" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="text"><br><br>
    </div>

    <label for="prenom">Prénom</label><br>
    <div class="input-field">
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom" required="text"><br><br>
    </div>

    <label for="birthdate">Date de naissance</label><br>
    <div class="input-field">
    <input type="date" id="birthdate" name="birthdate" placeholder="votre date de naissance" required="date"><br><br>
    </div>

    <label for="numCB">Numéro de CB</label><br>
    <div class="input-field">
    <input type="number" id="numCB" name="numCB" placeholder="votre numéro de carte bancaire" required="number" minlength="16"><br><br>
    </div>

    <label for="ville">Ville</label><br>
    <div class="input-field">
    <input type="text" id="ville" name="ville" placeholder="votre ville" required="text"><br><br>
    </div>

    <input class="btn" type="submit" name="adduser" value="Ajouter utilisateur">
</form>
<b><p id="adduser"><?php echo $message; ?></p></b>
<?php require_once("inc/bas.inc.php"); ?>
<?php require_once("inc/init.inc.php"); ?>
<?php require_once("inc/haut.inc.php"); ?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $numID = valid_donnees($_POST['numID']);
    $desc_comment = valid_donnees($_POST['desc_comment']);
  
    //Pour ajouter un commentaire
    if (!empty($numID)&&!empty($desc_comment)){
        $sql = "INSERT INTO `commentaire` (`description`, `utilisateur_id`) 
        VALUES (?,?)";
        $MySQL -> prepare($sql)->execute([$desc_comment,$numID]);
        }
    }

//Affichage des données commentaires
$sql = "SELECT * FROM commentaire";
try {
    $stmt = $MySQL->query($sql);
    if ($stmt === false){
        die("Erreur");
    }
}catch (PDOException $e){
    echo $e->getMessage();
}
?>
<h1>Liste des commentaires</h1>
 <table>
   <thead>
     <tr>
       <th>ID du commentaire</th>
       <th>Description</th>
       <th>ID utilisateur</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['id']); ?></td>
       <td><?php echo htmlspecialchars($row['description']); ?></td>
       <td><?php echo htmlspecialchars($row['utilisateur_id']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>

 <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
    <label for="numID">Votre numéro identifiant</label><br>
    <div class="input-field">
    <input type="number" id="numID" name="numID" placeholder="Saisissez le numéro ID de l'utilisateur" required="number"><br>
    </div>

    <label for="desc_comment">Ajouter commentaire</label><br>
    <textarea id="desc_comment" name="desc_comment" rows="10" cols="60" placeholder="Entrez votre commentaire..." required="text"></textarea>

    <input class="btn" type="submit" name="addComment" value="Ajouter commentaire">
</form>

<?php require_once("inc/bas.inc.php"); ?>
<?php require_once("inc/init.inc.php"); ?>
<?php require_once("inc/haut.inc.php"); ?>

<?php
$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = valid_donnees($_POST['nom']);
    $prenom = valid_donnees($_POST['prenom']);
    $birthdate = valid_donnees($_POST['birthdate']);
    $ville = valid_donnees($_POST['ville']);
    $numCB = valid_donnees($_POST['numCB']);
  
    //Pour ajouter un utilisateur
    if (!empty($nom)&&!empty($prenom)&&!empty($birthdate)&&!empty($ville)&&!empty($numCB)){
        $sql = "INSERT INTO `utilisateur` ( `Nom`, `Prénom`, `Date de naissance`, `Ville`, `Numéro de CB`) 
        VALUES (?,?,?,?,?)";
        $MySQL -> prepare($sql)->execute([$nom,$prenom,$birthdate,$ville,$numCB]);
        $message = "L'utilisateur ".$prenom." ".$nom." a bien été ajouter !";
        }
    
    }

if($username == "nyu"){
  //Affichage des données utilisateurs
  $sql = "SELECT * FROM utilisateur";
  try {
    $stmt = $MySQL->query($sql);
    if ($stmt === false){
        die("Erreur");
    }
  }catch (PDOException $e){
    echo $e->getMessage();
  }
}
else {
  $sql = "SELECT * FROM view_utilisateur";
  try {
    $stmt = $MySQL->query($sql);
    if ($stmt === false){
        die("Erreur");
    }
  }catch (PDOException $e){
    echo $e->getMessage();
  }
}
?>
<?php if ($username == "nyu") : ?>
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

<h1>Liste des utilisateurs</h1>
<table>
 <thead>
   <tr>
     <th>ID</th>
     <th>Nom</th>
     <th>Prénom</th>
     <th>Date de naissance</th>
     <th>Numéro de CB</th>
     <th>Ville</th>
   </tr>
 </thead>
 <tbody>
   <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
   <tr>
     <td><?php echo htmlspecialchars($row['id']); ?></td>
     <td><?php echo htmlspecialchars($row['Nom']); ?></td>
     <td><?php echo htmlspecialchars($row['Prénom']); ?></td>
     <td><?php echo htmlspecialchars($row['Date de naissance']); ?></td>
     <td><?php echo htmlspecialchars($row['Numéro de CB']); ?></td>
     <td><?php echo htmlspecialchars($row['Ville']); ?></td>
   </tr>
   <?php endwhile; ?>
 </tbody>
</table>

<form method="post" action="submit_delete_user.php">
  <label for="numID">Numéro ID à supprimer</label><br>
  <div class="input-field">
  <input type="number" id="numID" name="numID" placeholder="Saisissez le numéro ID de l'utilisateur" required="number"><br>
  </div>
  <input class="btn" type="submit" name="deleteuser" value="Supprimer utilisateur">
</form>
<?php else : ?>
  <h1>Liste des utilisateurs</h1>
<table>
 <thead>
   <tr>
     <th>ID</th>
     <th>Nom</th>
     <th>Prénom</th>
     <th>Ville</th>
   </tr>
 </thead>
 <tbody>
   <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
   <tr>
     <td><?php echo htmlspecialchars($row['id']); ?></td>
     <td><?php echo htmlspecialchars($row['Nom']); ?></td>
     <td><?php echo htmlspecialchars($row['Prénom']); ?></td>
     <td><?php echo htmlspecialchars($row['Ville']); ?></td>
   </tr>
   <?php endwhile; ?>
 </tbody>
</table>
<?php endif; ?>
<?php require_once("inc/bas.inc.php"); ?>
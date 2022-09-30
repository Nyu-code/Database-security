<?php require_once("inc/init.inc.php"); ?>
<?php
    $id = valid_donnees($_POST['numID']);
    $sql = "DELETE FROM utilisateur WHERE id=?";
    $stmt= $MySQL->prepare($sql);
    $stmt->execute([$id]);
    header('Location: gestion_utilisateurs.php');
?>
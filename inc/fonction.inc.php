<?php
function executeRequete($req)
{
    global $MySQL;
    $resultat = $MySQL->query($req);
    if(!$resultat) // 
    {
        die("Erreur sur la requete sql.<br>Message : " . $MySQL->error . "<br>Code: " . $req);
    }
    return $resultat; // 
}
 
function debug($var, $mode = 1)
{
    echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
    $trace = debug_backtrace();
    $trace = array_shift($trace);
    echo 'Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].';
    if($mode === 1)
    {
        echo '<pre>'; print_r($var); echo '</pre>';
    }
    else
    {
        echo '<pre>'; var_dump($var); echo '</pre>';
    }
    echo '</div>';
}
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
?>

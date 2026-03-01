<?php
include 'connexion.php';

// Récupération sécurisée de l'ID passé en paramètre GET

$idMarche = (int) $_GET['id'];

if ($idMarche > 0) {
    $requete = "DELETE FROM Marche WHERE idMarche = $idMarche";
    $execution = mysqli_query($connexion, $requete);

    if ($execution) {
        header("location: index.php?delete=1");
    } else {
        header("location: index.php?error=1");
    }
} else {
    header("location: index.php");
}
?>
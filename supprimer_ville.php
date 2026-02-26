<?php
include 'connexion.php';

// Récupération sécurisée de l'ID passé en paramètre GET
$idMarche = (int) $_GET['id'];

if ($idMarche > 0) {
    $requete = "DELETE FROM ville WHERE idVille = $idMarche";
    $execution = mysqli_query($connexion, $requete);

    if ($execution) {
        header("location: villes.php?delete=1");
    } else {
        header("location: villes.php?error=1");
    }
} else {
    header("location: villes.php");
}
?>
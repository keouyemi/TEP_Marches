<?php
include 'connexion.php';

// Vérifier ce que l'user veut faire
if (isset($_POST['modifier'])) {
    $id = $_POST['idVille'];
    $nom = mysqli_real_escape_string($connexion, $_POST['nomVille']);
    

    echo "ID de la ville : " . $id . "<br>";
    echo "Nom de la ville : " . $nom . "<br>";
    
    
    
     $sql = "UPDATE ville SET nomVille='$nom' WHERE idVille=$id";

    if (mysqli_query($connexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($connexion);
    }
}
?>
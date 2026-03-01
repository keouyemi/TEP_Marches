<?php
include 'connexion.php';

  


if (isset($_POST['submit'])) {

    // Récupération et sécurisation des données du formulaire
    $nomVille = mysqli_real_escape_string($connexion, trim($_POST['nomVille']));
    
    // Vérification que les champs ne sont pas vides

    if (!empty($nomVille)) {

        // Insertion avec statut "en_attente" par défaut
        
        $requete = "INSERT INTO ville (nomVille)
                    VALUES ('$nomVille')";
        $execution = mysqli_query($connexion, $requete);

        if (!$execution) {
          die(mysqli_error($connexion));
        }

        if ($execution) {
            // Redirection avec message de succes
            header("location: create_ville.php?success=1");
        } else {
            header("location: create_ville.php?error=1");
        }

    } else {
        header("location: create_ville.php?error=1");
    }

} else {
    header("location: create_ville.php");
}
?>
<?php
include 'connexion.php';

  


if (isset($_POST['submit'])) {

    // Récupération et sécurisation des données du formulaire
    $nomMarche = mysqli_real_escape_string($connexion, trim($_POST['nomMarche']));
    $description = mysqli_real_escape_string($connexion, trim($_POST['description']));
    $capacite = mysqli_real_escape_string($connexion, $_POST['capacite']);
    $adresse = mysqli_real_escape_string($connexion, $_POST['adresse']);
    $telephone = mysqli_real_escape_string($connexion, $_POST['telephone']);
    $image = $_FILES['image']['name'];
    $extention = explode(".", $image);
    $vraiExtension = strtolower(end($extention));
    $tablrExt = ['jpg','jpeg','png','gif'];

    $chemin = ""; // initialisation

    if(in_array($vraiExtension,$tablrExt)) {
        $nomFichier = date("Y-m-d")."_".date("H-i-s");
        $vraiNomFichier = $nomFichier.".".$vraiExtension;
        $chemin = "image/".$vraiNomFichier;
        $fichierTemp = $_FILES['image']['tmp_name'];
        move_uploaded_file($fichierTemp,$chemin);
    } else {
        header("location: create.php?error=1");
        exit;
    }

    // Vérification que les champs ne sont pas vides
    if (!empty($nomMarche) && !empty($description) && !empty($capacite) && !empty($adresse) && !empty($telephone)) {

        // Insertion avec statut "en_attente" par défaut
        $requete = "INSERT INTO Marche (nomMarche, description, capacite, adresse, telephone, image)
                    VALUES ('$nomMarche', '$description', '$capacite', '$adresse', '$telephone', '$chemin')";
        $execution = mysqli_query($connexion, $requete);

        if (!$execution) {
          die(mysqli_error($connexion));
        }

        if ($execution) {
            // Redirection avec message de succes
            header("location: create.php?success=1");
        } else {
            header("location: create.php?error=1");
        }

    } else {
        header("location: create.php?error=1");
    }

} else {
    header("location: create.php");
}
?>
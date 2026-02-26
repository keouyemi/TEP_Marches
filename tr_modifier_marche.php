<?php
include 'connexion.php';

if (isset($_POST['modifier'])) {
    $id = $_POST['idMarche'];
    $nom = mysqli_real_escape_string($connexion, $_POST['nomMarche']);
    $capacite = $_POST['capacite'];
    $adresse = mysqli_real_escape_string($connexion, $_POST['adresse']);
    $telephone = mysqli_real_escape_string($connexion, $_POST['telephone']);

    echo "ID du marché : " . $id . "<br>";
    echo "Nom du marché : " . $nom . "<br>";
    echo "Capacité : " . $capacite . "<br>";
    echo "Adresse : " . $adresse . "<br>";
    echo "Téléphone : " . $telephone . "<br>";
    
    
    // Gestion de l'image (si une nouvelle image est téléchargée)
    if (!empty($_FILES['image']['name'])) {
        // Gestion de l'image
    $chemin = "";
    $image = $_FILES['image']['name'];
    $extention = explode(".", $image);
    $vraiExtension = strtolower(end($extention));
    $tablrExt = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($vraiExtension, $tablrExt)) {
        $nomFichier     = date("Y-m-d") . "" . date("H-i-s");
        $vrainomFichier = $nomFichier . "." . $vraiExtension;
        $chemin         = "image/" . $vrainomFichier;
        $fichierTemp    = $_FILES['image']['tmp_name'];
        move_uploaded_file($fichierTemp, $chemin);
    }
    
        $sql = "UPDATE marche SET nomMarche='$nom', capacite='$capacite', adresse='$adresse', telephone='$telephone', `image`='$chemin' WHERE idMarche=$id";
    } else {
        // Mise à jour sans changer l'image existante
        $sql = "UPDATE marche SET nomMarche='$nom', capacite='$capacite', adresse='$adresse', telephone='$telephone' WHERE idMarche=$id";
    }

    if (mysqli_query($connexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur : " . mysqli_error($connexion);
    }
}
?>